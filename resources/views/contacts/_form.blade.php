<div>
  <div class="container">
    {{ Form::open(['route' => ['contact.post'], 'method' => 'post']) }}
    @csrf
    @method('post')

    <h2>会員登録</h2>

    <div>
      <table>
        <tr>
          <th>会社名</th>
          <td>
            @includeWhen($errors->get('company'), '_partials.validation_error', ['errors' => $errors->get('company')])
            {{ Form::text('company', old('company'), ['class' => 'form-control', 'placeholder' => '例）鈴木 太郎','maxlength' => '32', 'required' => 'required']) }}
          </td>
        </tr>
        <tr>
          <th>お名前</th>
          <td>
            @includeWhen($errors->get('name'), '_partials.validation_error', ['errors' => $errors->get('name')])
            {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '例）鈴木 太郎','maxlength' => '32', 'required' => 'required']) }}
          </td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td>
            @includeWhen($errors->get('tel'), '_partials.validation_error', ['errors' => $errors->get('tel')])
            {{ Form::text('tel', old('tel'), ['class' => 'form-control', 'placeholder' => '例）00012345678 ※ハイフン不要','maxlength' => '32', 'required' => 'required']) }}
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            @includeWhen($errors->get('email'), '_partials.validation_error', ['errors' => $errors->get('email')])
            {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '例）xxxxxxx@sample.com', 'required' => 'required']) }}
          </td>
        </tr>
        <tr>
          <th>従業員数</th>
          <td>
            @includeWhen($errors->get('employee_count'), '_partials.validation_error', ['errors' => $errors->get('employee_count')])
            {{ Form::select('employee_count', EnumContact::EMPLOYEE_COUNT, old('employee_count'), ['class' => 'form-control', 'placeholder' => '例）xxxxxxx@sample.com', 'required' => 'required']) }}
          </td>
        </tr>
        <tr>
          <th>お問い合わせカテゴリ</th>
          <td>
            @includeWhen($errors->get('contact_type'), '_partials.validation_error', ['errors' => $errors->get('contact_type')])
            {{ Form::select('contact_type', EnumContact::CONTACT_TYPE, old('contact_type'), ['class' => 'form-control', 'placeholder' => '例）xxxxxxx@sample.com', 'required' => 'required']) }}
          </td>
        </tr>
        <tr>
          <th>内容詳細</th>
          <td>
            @includeWhen($errors->get('remarks'), '_partials.validation_error', ['errors' => $errors->get('remarks')])
            {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control', 'rows' => '10', 'cols' => '40']) !!}
          </td>
        </tr>
      </table>
    </div>

  </div>
</div>
