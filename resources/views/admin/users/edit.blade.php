@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar usuario
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
                    <form role="form"  action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Número de control</label>
                                    <input type="number" name="control_number" class="form-control" id="name" value="{{ old('control_number', $user->control_number) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Materia o asunto</label>
                                    <input type="text" name="matter" class="form-control" id="name" value="{{ old('matter', $user->matter) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Aula</label>
                                    <input type="text" name="classroom" class="form-control" id="name" value="{{ old('classroom', $user->classroom) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Horario inicio</label>
                                    <input type="time" name="start_time" class="form-control" id="name" value="{{ old('start_time', $user->start_time) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Horario Fin</label>
                                    <input type="time" name="end_time" class="form-control" id="name" value="{{ old('end_time', $user->end_time) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Imagen <em>(Ingresar solo si se desea modificar)</em></label>
                            <input type="file" name="image" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Cargue archivos formato imagen.</small>
                        </div>
                        <a href="/usuarios" class="btn btn-default">
                            Cancelar
                        </a>
                        <button class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
