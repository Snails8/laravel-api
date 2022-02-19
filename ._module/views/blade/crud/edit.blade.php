@extends('_layouts.app')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  @includeWhen(session('flash_message'), '_partials.flash_message_success')

  {{ Form::open(['route' => ['samples.update', 'sample' => $sample->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('samples._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('samples.index') }}" >一覧に戻る</a>
  </div>
@endsection
