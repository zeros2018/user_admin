@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <div><h1 style="display: inline-block; vertical-align: bottom">PERMISOS</h1></div>

@stop

@section('content')
    @livewire('admin.permission-index')
@stop

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
