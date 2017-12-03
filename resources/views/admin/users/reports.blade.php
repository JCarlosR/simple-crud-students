@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="" class="form-inline my-2 my-lg-0">
                        <input type="date" name="search_date" class="form-control" value="{{ $searchDate }}">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </form>
                </div>
                <div class="panel-body">
                    @if (session('notification'))
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('notification') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-sm-12">
                            <a href="/usuarios/excel?search_date={{$searchDate}}" class="btn btn-sm btn-success">Exportar a Excel</a>
                            </div>
                            <div class="col-sm-4">&nbsp;</div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Nro Control</th>
                                <th>Materia o Asunto</th>
                                <th>Aula</th>
                                <th>Horario</th>
                                <th>Fecha</th>
                                <th>Imagen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->control_number }}</td>
                                <td>{{ $user->matter }}</td>
                                <td>{{ $user->classroom }}</td>
                                <td>{{ $user->start_time_format }} - {{ $user->end_time_format }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><img src="{{ asset('images/users/'.$user->image) }}" alt="Imagen del usuario" height="36"></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
