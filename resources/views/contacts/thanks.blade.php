@extends('_layouts.no_index_app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')

  <div>
    <p>Sample Thanks Page</p>
  </div>

  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('top') }}">トップに戻る</a>
  </div>
@endsection

