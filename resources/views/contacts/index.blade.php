@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
{{--  Layout 拡張に対応できるように細分化してある--}}
  @include('contacts._form')
@endsection