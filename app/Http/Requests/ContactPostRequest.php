<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $paths = [
            'contact.post'
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
            'company' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'tel' => 'required|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'employee_count' => 'required|integer',
            'contact_type' => 'required|integer',
            'detail' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {

    }
}
