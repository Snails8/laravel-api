@extends('_layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), '_partials.flash_message_success')
    {{ Form::open(['route' => ['samples.index'], 'class' => 'pb-3 border-bottom', 'method' => 'GET']) }}
    <table class="table table-striped table-bordered table-search">
      <colgroup>
        <col style="width: 12%;">
        <col style="width: 33%;">
        <col style="width: 12%;">
        <col style="width: 33%;">
      </colgroup>
      <tr>
        <th scope="row" class="bg-dark text-white">サンプル</th>
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
    <a class="btn btn-outline-primary" href="{{ route('samples.create') }}">新規作成</a>
  </div>
  <table class="table table-striped table-bordered table-search-result">
    <thead class="bg-dark text-white">
    <tr>
      <th scope="col" class="id">ID</th>
      <th scope="col">名前</th>
      <th scope="col" class="operation">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($samples as $sample)
      <tr>
        <td >{{ $sample->id }}</td>
        <td >{{ $sample->name }}</td>
        <td class="operation">
          <a class="btn btn-outline-success" href="{{ route('samples.edit', ['sample' => $sample->id]) }}">編集</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center py-4">
        {{ $sample->appends($params)->fragment('search_result')->links() }}
        {{ $sample->fragment('search_result')->links() }}
  </div>
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('samples.index') }}" >業者一覧に戻る</a>
  </div>
@endsection
