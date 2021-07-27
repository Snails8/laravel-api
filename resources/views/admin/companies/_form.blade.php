@includeWhen(session('critical_error_message'), 'admin._partials.flash_message_error')
<table class="table table-striped border item-va-middle table-form">
  <tbody>
  <colgroup>
    <col style="width: 12%;">
    <col style="width: 33%;">
    <col style="width: 12%;">
    <col style="width: 33%;">
  </colgroup>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-2 mr-2 badge badge-danger">必須</span>公開日</th>
    <td colspan="3">
      @includeWhen($errors->get('public_date'), 'admin._partials.validation_error', ['errors' => $errors->get('public_date')])
      {{ Form::text('name', old('name', $hoge->name ?? ''), ['placeholder' => '例）たにし 太郎','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
{{--    zipcode--}}
    <th class="bg-dark text-white border-white"><span class="p-2 mr-2 badge badge-danger">必須</span>公開日</th>
    <td colspan="3">
      @includeWhen($errors->get('public_date'), 'admin._partials.validation_error', ['errors' => $errors->get('public_date')])
      {{ Form::text('name', old('name', $hoge->name ?? ''), ['placeholder' => '例）たにし 太郎','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-2 mr-2 badge badge-danger">必須</span>住所</th>
    <td colspan="3">
      @includeWhen($errors->get('address'), 'admin._partials.validation_error', ['errors' => $errors->get('address')])
      {{ Form::text('address', old('address', $hoge->address ?? ''), ['placeholder' => '例）名古屋市栄1丁目','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-2 mr-2 badge badge-danger">必須</span>以下番地</th>
    <td colspan="3">
      @includeWhen($errors->get('address_other'), 'admin._partials.validation_error', ['errors' => $errors->get('address_other')])
      {{ Form::text('address_other', old('address_other', $hoge->address_other ?? ''), ['placeholder' => '例）デラックスマンション301号','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white">電話番号</th>
    <td colspan="3">
      @includeWhen($errors->get('tel'), 'admin._partials.validation_error', ['errors' => $errors->get('tel')])
      {{ Form::text('tel', old('tel'), ['placeholder' => '例）00011112222 ※ハイフン不要','class' => 'form-control', 'maxlength' => '32', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white">メールアドレス</th>
    <td colspan="3">
      @includeWhen($errors->get('email'), 'admin._partials.validation_error', ['errors' => $errors->get('email')])
      {{ Form::text('email', old('email'), ['placeholder' => '例）xxxxxxx@sample.com', 'class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-2 mr-2 badge badge-danger">必須</span>代表者名</th>
    <td colspan="3">
      @includeWhen($errors->get('representative_name'), 'admin._partials.validation_error', ['errors' => $errors->get('representative_name')])
      {{ Form::text('representative_name', old('representative_name', $company->representative_name ?? ''), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
