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
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>公開日</th>
    <td colspan="3">
      @includeWhen($errors->get('public_date'), 'admin._partials.validation_error', ['errors' => $errors->get('public_date')])
{{--      <date-picker-form-component :target="'public_date'" :value="{{ json_encode(old('public_date', $company->public_date ? $company->public_date->format('Y.m.d') : '')) }}"></date-picker-form-component>--}}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>タイトル</th>
    <td colspan="3">
      @includeWhen($errors->get('title'), 'admin._partials.validation_error', ['errors' => $errors->get('title')])
      {{ Form::text('title', old('title', $company->title ?? ''), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>施工タグ</th>
    <td colspan="3">
{{--      @includeWhen($errors->get('tags'), 'admin._partials.validation_error', ['errors' => $errors->get('tags')])--}}
{{--      <div class="row">--}}
{{--        @foreach($companyTags as $key => $val)--}}
{{--          <div class="col-md-2 py-1 ml-4 my-auto">--}}
{{--            {{ Form::checkbox('tags[]', $key, in_array($key, old('tags', $company->workTags->pluck('id')->toArray())), ['id' => 'tag'.$key, 'class' => 'form-check-input']) }}--}}
{{--            {{ Form::label('tag'.$key, $val, ['class' => 'form-check-label']) }}--}}
{{--          </div>--}}
{{--        @endforeach--}}
{{--      </div>--}}
    </td>
  </tr>
  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
