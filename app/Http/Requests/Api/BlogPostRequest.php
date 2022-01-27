<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\_Abstract\ApiRequest;

class BlogPostRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'api.blog.post',
            'api.blog.update'
        ];

        return (in_array($this->route()->action['as'], $paths));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [

            // sample
            'title'            => 'required|string|max:255',
            'detail'           => '',
        ];

        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {

        $messages = [
            'title.required'              => '名前は必ず入力してください。',
            'title.string'                => '数字や記号は除外してください。',
            'title.max'                   => '255文字以内で入力してください。',
            'detail.required'              => '名前は必ず入力してください。',
            'detail.string'                => '数字や記号は除外してください。',
            'detail.max'                   => '255文字以内で入力してください。',
        ];

        return $messages;
    }
}
