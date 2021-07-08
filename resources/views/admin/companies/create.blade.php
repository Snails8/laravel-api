@extends('admin._layouts.adminlte_layout')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  {{ Form::open(['route' => ['admin.companies.store'], 'method' => 'post']) }}
  @csrf
  @method('post')
  @include('admin.companies._form')
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.companies.index') }}">一覧に戻る</a>
  </div>
  {{ Form::close() }}
@endsection
