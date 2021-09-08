@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
{{--  <a href="{{ route('admin.company.images.edit', ['company' => $company->id]) }}" class="btn btn-outline-success mb-2">施工事例画像登録</a>--}}
  {{ Form::open(['route' => ['admin.company.update', 'company' => $company->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.companies._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <form name="delete" method="POST" action="{{ route('admin.company.destroy', ['company' => $company]) }}" class="d-inline">
      @csrf
      @method('DELETE')
      <input type="button" class="btn btn-outline-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" value="削除">
      @include('admin._partials.confirm_delete_modal')
    </form>
  </div>
@endsection
