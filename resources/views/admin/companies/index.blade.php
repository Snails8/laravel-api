@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  {{ Form::open(['route' => ['admin.companies.index'], 'class' => 'pb-3 border-bottom', 'method' => 'GET']) }}
  <table class="table table-striped table-bordered table-search">
    <colgroup>
      <col style="width: 12%;">
      <col style="width: 33%;">
      <col style="width: 12%;">
      <col style="width: 33%;">
    </colgroup>
    <tr>
      <th scope="row" class="bg-dark text-white">タイトル</th>
      <td colspan="3">
        {{ Form::text('keyword', isset($params['keyword']) ? $params['keyword'] : '', ['class' => 'form-control']) }}
      </td>
    </tr>
  </table>
  <div class="text-center">
    {{ Form::submit('検索', ['class' => 'btn btn-primary pl-5 pr-5']) }}
  </div>
  {{ Form::close() }}


  <div id='search_result' class="operation mt-3 py-3">
    <a class="btn btn-outline-primary" href="{{ route('admin.companies.create') }}">新規作成</a>
  </div>
  <table class="table table-striped table-bordered item-va-middle table-list">
    <thead class="thead-dark">
    <tr>
      <th scope="col" class="id">ID</th>
{{--      <th scope="col" class="date">公開日</th>--}}
      <th scope="col" class="work-name">タイトル</th>
      <th scope="col" class="display">HP公開</th>
      <th scope="col" class="operation">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
      <tr>
        <td >{{ $company->id }}</td>
{{--        <td >{{ $company->public_date->format('Y-m-d') }}</td>--}}
        <td >{{ $company->name}}</td>
        <td class="display">
          <is-contract-component
              :update-id="{{ $company->id }}"
              :is-contract="{{ (int)$company->is_public }}"
              :target="{{ json_encode('companies') }}" >
          </is-contract-component>
        </td>
        <td class="operation">
          <a class="btn btn-outline-success" href="{{ route('admin.companies.edit', ['company' => $company->id]) }}">編集</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center py-4">
    {{ $companies->appends($params)->fragment('search_result')->links() }}
  </div>
@endsection
