@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
{{--  Layout 拡張に対応できるように細分化してある--}}
  {{ Form::open(['route' => ['contact.post'], 'method' => 'post']) }}
  @csrf
  @method('post')

  @include('contacts._form')
  {{ Form::close() }}
@endsection

