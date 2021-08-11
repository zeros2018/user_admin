@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="offset-2"><h1 style="display: inline-block; vertical-align: bottom">Crear Rol</h1></div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor\bootstrap-duallistbox-3.0.9\css\bootstrap-duallistbox.min.css')}}">
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="card col-md-8 offset-2">
                <div class="card-body">
                    {!! Form::open(['route'=>'admin.roles.store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name',
                            null,
                            ['class'=>'form-control','placeholder' => 'Ingrese el nombre de usuario']) !!}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Permisos</label>

                                {!! Form::select('permissions[]', $permissions, null, ['multiple' => 'multiple', 'size' => 10]) !!}


                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@stop

@section('js')
    <script src="{{asset('vendor\bootstrap-duallistbox-3.0.9\js\jquery.bootstrap-duallistbox.min.js')}}"></script>

    <script>
        var demo1 = $('select[name="permissions[]"]').bootstrapDualListbox(
            {
                infoText: 'Permisos {0} ',
                infoTextFiltered: '<span class="label label-warning">Filtrados</span> {0} de {1}',
                infoTextEmpty: 'Sin Permisos',
                filterPlaceHolder: 'Filtrar',
                moveAllLabel: 'Mover todo',
                removeAllLabel: 'Quitar todo'
            }
        );
    </script>
@stop

