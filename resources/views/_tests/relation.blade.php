@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
  <div class="top">
    {{-- ヘッドライン   --}}
    <div class="headline position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 fw-normal">ようこそ!</h1>
        <p class="lead fw-normal">
          relation の挙動 test環境になります。<br>
          プルリクを送る際はコミットメッセージに最低限の情報を載せてくださいね!
        </p>
        {{--        <a class="btn btn-outline-secondary" href="{{ route('reserve.form') }}">Worker・queue検証環境へ</a>--}}
      </div>
    </div>
  </div>
@endsection