<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $searchCnumber = $request->input('search_cnumber');

        $query = User::where('password',null);
                 // always
        //dd($query);

        if ($searchCnumber) {// when search by date
            $query = $query->where('control_number','LIKE', '%'.$searchCnumber.'%')->orderBy('id', 'desc');
        }else{
            $query = $query->whereDate('created_at', date('Y-m-d'));
        }
        $users = $query->paginate(6); // always paginate
        return view('admin.users.index')->with(compact('users','searchCnumber'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'control_number' => 'max:9'
        ];
        $messages = [
            'control_number.max' => 'El número control es máximo 9 dígitos.'
        ];

        $this->validate($request, $rules, $messages);


        $user = new User();
        $user->control_number = $request->input('control_number');
        $user->name = $request->input('name');
        $user->matter = $request->input('matter');
        $user->classroom = $request->input('classroom');
        $user->start_time = $request->input('start_time');
        $user->end_time = $request->input('end_time');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $user->id . '.' . $extension;

            $path = public_path('images/users/' . $fileName);

            Image::make($request->file('image'))
                ->fit(128, 128)
                ->save($path);

            $user->image = $fileName;
        }

        $user->save();

        return redirect('/usuarios')->with('notification', 'El usuario se ha registrado exitosamente.');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit')->with(compact('user'));
    }

    public function update($id,Request $request)
    {
        $rules = [
            'control_number' => 'max:9'
        ];
        $messages = [
            'control_number.max' => 'El número de control es máximo 9 dígitos.'
        ];

        $this->validate($request, $rules, $messages);


        $user = User::find($id);
        $user->control_number = $request->input('control_number');
        $user->name = $request->input('name');
        $user->matter = $request->input('matter');
        $user->classroom = $request->input('classroom');
        $user->start_time = $request->input('start_time');
        $user->end_time = $request->input('end_time');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $user->id . '.' . $extension;

            $path = public_path('images/users/' . $fileName);

            Image::make($request->file('image'))
                ->fit(128, 128)
                ->save($path);

            $user->image = $fileName;
        }
        $user->save();

        return redirect('/usuarios')->with('notification', 'Usuario modificado exitosamente.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('notification', 'El usuario se ha eliminado correctamente.');
    }

    public function report(Request $request)
    {
        $searchDate = $request->input('search_date');

        $query = User::where('password',null); // always

        if ($searchDate) // when search by date
            $query = $query->whereDate('created_at', $searchDate)->orderBy('id', 'desc');

        $users = $query->paginate(6); // always paginate


        return view('admin.users.reports')->with(compact('users', 'searchDate'));
    }

    public function excel(Request $request)
    {
        $searchDate = $request->input('search_date');

        Excel::create('Reporte usuarios', function($excel) use ($searchDate) {

            $excel->sheet('Usuarios', function($sheet) use ($searchDate) {

                // Data
                $query = User::where('password', null); // always
                $title = 'Lista de todos los usuarios';
                if ($searchDate) { // apply when needed
                    $query = $query->whereDate('created_at', $searchDate);
                    $title = "Lista de usuarios registrados la fecha $searchDate";
                }

                $users = $query->get();

                // Header
                $sheet->mergeCells('A1:G1');
                $sheet->row(1, [$title]);
                $sheet->row(2, ['ID', 'Nombre', 'Número de control', 'Materia o Asunto', 'Aula', 'Horario', 'Fecha']);

                foreach ($users as $user) {
                    $row = [];
                    $row[0] = $user->id;
                    $row[1] = $user->name;
                    $row[2] = $user->control_number;
                    $row[3] = $user->matter;
                    $row[4] = $user->classroom;
                    $row[5] = $user->start_time_format. '-' .$user->end_time_format;
                    $row[6] = $user->created_at;
                    $sheet->appendRow($row);
                }

            });

        })->export('xls');
    }
}
