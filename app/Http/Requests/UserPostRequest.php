<?php

namespace App\Http\Requests;

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
            'admin.user.store',
            'admin.user.update',
        ];

        return (in_array($this->route()->action['as'], $paths));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shop_id'               => 'required|integer',
            'name'                  => 'required',
            'kana'                  => '',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|confirmed|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',
            'password_confirmation' => 'required',
            'role'                  => 'required',
            'post'                  => '',
        ];
    }

    public function messages()
    {
        $messages = [
            'shop_id.required'   => '店舗は必ず選択してください。',
            'shop_id.integer'    => '店舗に有効ではない値が入力されています。',
            'name.required'      => 'ユーザー名は必須項目です。',
            'email.required'     => 'メールアドレスは必須項目です。',
            'email.email'        => 'このメールアドレスは有効な形式ではありません。',
            'email.unique'       => 'このメールアドレスは既に登録されています。',
            'password.required'  => 'パスワードは必須項目です。',
            'password.regex'     => '半角英数字それぞれを1種類以上含む8-100文字で入力してください。',
            'password.confirmed' => '確認用パスワードと一致していません。',
            'password_confirmation.required' => 'パスワードは必須項目です。',
            'role.required'      => '権限は必ず選択してください。',
        ];

        return $messages;
    }
}
