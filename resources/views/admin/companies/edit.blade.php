@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.company.update', 'company' => $company->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.companies._form')
  {{ Form::close() }}
@endsection
