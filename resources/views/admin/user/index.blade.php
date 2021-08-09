@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div><h1 style="display: inline-block; vertical-align: bottom">USUARIOS</h1> <a type="button" class="btn btn-success" href="{{route('admin.users.create')}}">Nuevo</a></div>

@stop

@section('content')

    @livewire('admin.user-index')
@stop

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
