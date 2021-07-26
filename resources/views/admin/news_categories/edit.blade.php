@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.news_category.update', 'news_category' => $newsCategory->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.news_categories._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.news_category.index') }}" >一覧に戻る</a>
  </div>
@endsection
