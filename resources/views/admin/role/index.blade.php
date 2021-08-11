@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div><h1 style="display: inline-block; vertical-align: bottom">ROLES</h1>
        @can('admin.roles.create')
        <a type="button" class="btn btn-success" href="{{route('admin.roles.create')}}">Nuevo</a>
        @endcan
    </div>

@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @livewire('admin.role-index')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
