@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
  <div>
    <div class="container">
      {{ Form::open(['route' => ['reserve.post'], 'method' => 'post']) }}
      @csrf
      @method('post')

      <h2>会員登録</h2>

      <div>
        <table>
          <tr>
            <th>お名前</th>
            <td>
              @includeWhen($errors->get('name'), '_components.validation_error', ['errors' => $errors->get('name')])
              {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '例）鈴木 太郎','maxlength' => '32', 'required' => 'required']) }}
            </td>
          </tr>
          <tr>
            <th>フリガナ</th>
            <td>
              @includeWhen($errors->get('kana'), '_components.validation_error', ['errors' => $errors->get('kana')])
              {{ Form::text('kana', old('kana'), ['class' => 'form-control', 'placeholder' => '例）スズキ タロウ', 'maxlength' => '32', 'required' => 'required']) }}
            </td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td>
              @includeWhen($errors->get('tel'), '_components.validation_error', ['errors' => $errors->get('tel')])
              {{ Form::text('tel', old('tel'), ['placeholder' => '例）00012345678 ※ハイフン不要','maxlength' => '32', 'required' => 'required']) }}
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
              @includeWhen($errors->get('email'), '_components.validation_error', ['errors' => $errors->get('email')])
              {{ Form::text('email', old('email'), ['placeholder' => '例）xxxxxxx@sample.com', 'required' => 'required']) }}
            </td>
          </tr>
          <tr>
            <th>備考(任意)</th>
            <td>
              @includeWhen($errors->get('remarks'), '_components.validation_error', ['errors' => $errors->get('remarks')])
              {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control', 'rows' => '10', 'cols' => '40']) !!}
            </td>
          </tr>
        </table>
      </div>

    </div>
  </div>
@endsection