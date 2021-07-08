@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Dashboard</h1>
@stop

{{-- なぜか通常の呼び出しをするとcontentが２回renderされるのでコメントアウト--}}
{{--@yield('content')--}}

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script> console.log('Hi!'); </script>
@stop