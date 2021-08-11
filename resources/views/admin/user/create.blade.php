@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="offset-2"><h1 style="display: inline-block; vertical-align: bottom">Crear Usuario</h1></div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor\select2\css\select2.css')}}">
    <link rel="stylesheet" href="{{asset('vendor\select2-bootstrap4-theme\select2-bootstrap4.min.css')}}">
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="card col-md-8 offset-2">
                <div class="card-body">
                    {!! Form::open(['route'=>'admin.users.store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name',
                            null,
                            ['class'=>'form-control','placeholder' => 'Ingrese el nombre de usuario']) !!}

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Correo') !!}
                        {!! Form::text('email',
                            null,
                            ['class'=>'form-control','placeholder' => 'Ingrese el correo de usuario']) !!}

                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('roles', 'Roles') !!}
                        {!! Form::select('roles[]', $roles, null,
                            ['class'=>'form-control select2', 'multiple' => 'multiple']) !!}

                        @error('roles')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::text('password',
                            null,
                            ['class'=>'form-control','placeholder' => 'Ingrese la contraseña del usuario']) !!}

                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@stop

@section('js')

    <script src="{{asset('vendor\select2\js\select2.js')}}"></script>

    <script>
        $('.select2').select2({
            // theme: "classic",
            theme: 'bootstrap4',
            style: 'width: auto !important;',
        });
        // Arreglo de css for boostrap
        $('.select2-container').css("width", "auto");
    </script>

@stop

