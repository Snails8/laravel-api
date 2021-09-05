@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')

  @include('registers._form')
@endsection