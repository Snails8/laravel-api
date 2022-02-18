<table class="table table-striped border table-form">
  <tbody>
  <colgroup>
    <col style="width: 12%;">
    <col style="width: 33%;">
    <col style="width: 12%;">
    <col style="width: 33%;">
  </colgroup>

  <tr>
    <th class="bg-dark text-white">名前</th>
    <td colspan="3">
      @includeWhen($errors->get('name'), '_partials.validation_error', ['errors' => $errors->get('name')])
      {{ Form::text('name', old('name', $sample->name), ['class' => 'form-control']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white">textarea</th>
    <td colspan="3">
      @includeWhen($errors->get('description'), '_partials.validation_error', ['errors' => $errors->get('description')])
      {!! Form::textarea('description', old('description', $hoge->description ?? ''), ['class' => 'form-control', 'rows' => '5']) !!}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white">number</th>
    <td colspan="3">
      @includeWhen($errors->get('age'), '_partials.validation_error', ['errors' => $errors->get('age')])
      {{ Form::number('age', old('age'), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white">checkboxs</th>
    <td colspan="3">
      <div class="row">
        @foreach($tags as $key => $val)
          <div class="col-md-2 py-1 ml-4 my-auto">
            {{ Form::checkbox('tags[]', $key, in_array($key, old('tags', $hoge->tags->pluck('id')->toArray())), ['id' => 'tag'.$key, 'class' => 'form-check-input']) }}
            {{ Form::label('tag'.$key, $val, ['class' => 'form-check-label']) }}
          </div>
        @endforeach
      </div>
    </td>
  </tr>






  </tbody>
</table>

<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>