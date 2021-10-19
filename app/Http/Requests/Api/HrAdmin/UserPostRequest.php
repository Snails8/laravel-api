<?php

namespace App\Http\Requests\Api\HrAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $paths = [
            'hr_admin.user.store'
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
            'name' => '',
            'kana' => '',
            'email' => 'required|email',
            'password' => '',
        ];

        return $rules;
    }
}
