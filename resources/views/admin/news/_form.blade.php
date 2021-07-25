@includeWhen(session('critical_error_message'), '_partials.flash_message_error')
<table class="table table-striped border item-va-middle table-form">
  <tbody>
  <colgroup>
    <col style="width: 12%;">
    <col style="width: 33%;">
    <col style="width: 12%;">
    <col style="width: 33%;">
  </colgroup>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>タイトル</th>
    <td colspan="3">
      @includeWhen($errors->get('title'), 'admin._partials.validation_error', ['errors' => $errors->get('title')])
      {{ Form::text('title', old('title', $agent->title), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>公開日</th>
    <td>
      @includeWhen($errors->get('public_date'), 'admin._partials.validation_error', ['errors' => $errors->get('public_date')])
      <date-picker-form-component :target="'public_date'" :value="{{ json_encode(old('public_date', $news->public_date ? $news->public_date->format('Y-m-d') : '')) }}"></date-picker-form-component>
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>カテゴリ</th>
    <td>
      @includeWhen($errors->get('news_category_id'), 'admin._partials.validation_error', ['errors' => $errors->get('news_category_id')])
      {{ Form::select('news_category_id', $newsCategories, old('news_category_id', $news->news_category_id), ['class' => 'form-control']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>内容</th>
    <td>
      @includeWhen($errors->get('body'), 'admin._partials.validation_error', ['errors' => $errors->get('body')])
      {!! Form::textarea('body', old('body', $news->body ?? ''), ['class' => 'form-control', 'rows' => '30', 'required' => 'required']) !!}
    </td>
  </tr>
  <tr>
    <th scope="row" class="bg-dark text-white border-white">画像</th>
    <td>
      @includeWhen($errors->get('image'), 'admin._partials.validation_error', ['errors' => $errors->get('image')])
      <image-form-component :id="'image'" :name="'image'" image-path="{{ $imageUrl ?? ''}}" ></image-form-component>
      @if($news->image)
        <div class="mt-2 ml-4">
          {{ Form::checkbox('is_delete', true, false, ['id' => 'is_delete', 'class' => 'form-check-input']) }}
          {{ Form::Label('is_delete', '削除', ['class' => 'form-check-label']) }}
        </div>
      @endif
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white border-white"><span class="p-5 mr-2 badge badge-danger">必須</span>Description</th>
    <td>
      @includeWhen($errors->get('description'), 'admin._partials.validation_error', ['errors' => $errors->get('description')])
      {{ Form::text('description', old('description', $news->description ?? ''), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
