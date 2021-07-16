@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  <a href="{{ route('admin.companies.images.edit', ['company' => $company->id]) }}" class="btn btn-outline-success mb-2">施工事例画像登録</a>
  {{ Form::open(['route' => ['admin.companies.update', 'company' => $company->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.companies._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.companies.index') }}" >一覧に戻る</a>
    <form name="delete" method="POST" action="{{ route('admin.companies.destroy', ['company' => $company]) }}" class="d-inline">
      @csrf
      @method('DELETE')
      <input type="button" class="btn btn-outline-danger" role="button" data-toggle="modal" data-target="#deleteModal" value="削除">
      @include('admin.companies.resources.views.admin._partials.confirm_delete_modal')
    </form>
  </div>
@endsection
