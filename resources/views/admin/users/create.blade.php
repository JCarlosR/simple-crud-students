@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo usuario
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
                                    <input type="number" name="control_number" class="form-control" id="name" placeholder="Ingrese número de control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese nombre completo">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Materia o asunto</label>
                                    <input type="text" name="matter" class="form-control" id="name" placeholder="Ingrese materia o asunto">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Aula</label>
                                    <input type="text" name="classroom" class="form-control" id="name" placeholder="Ingrese aula">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Horario inicio</label>
                                    <input type="time" name="start_time" class="form-control" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Horario Fin</label>
                                    <input type="time" name="end_time" class="form-control" id="name" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Imagen</label>
                            <input type="file" name="image" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Cargue archivos formato imagen.</small>
                        </div>
                        <a href="/usuarios" class="btn btn-default">
                            Cancelar
                        </a>
                        <button class="btn btn-info">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
