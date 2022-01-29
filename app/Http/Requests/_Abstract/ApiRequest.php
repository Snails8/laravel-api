<?php

namespace App\Http\Requests\_Abstract;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * 抽象クラス
 */
abstract class ApiRequest extends FormRequest
{

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'title'             => __('The given data was invalid.'),
            'detail'            => $validator->errors()->toArray(),
            "documentation_url" => 'http://docs.example.com/api/v1/authentication',
            // "error_user_msg"    => ".. ユーザー向けエラーメッセージ ...",  ドメインによってはドメインによってはerror_user_msg を含ませる
        ];

        throw new HttpResponseException(response()->json($data, 422)->withHeaders([
            'Content-Type'     => 'application/problem+json',
            'Content-Language' => 'en',
        ]));
    }
}

/**
     422 Unprocessable Entity(処理ができないもの)
     コードや文法、リクエストは間違っていないが、意味が間違っているため、
     うまく処理ができないもののこと

     header で不足分お情報を追加

    ----header--------------------------------------
    HTTP 1.1          422 Unprocessable Entity(処理ができないもの)
    Content-Type:     application/problem+json
    Content-Language: en
    Location:         invaild
    ------------------------------------------------

    ----body-----------------------------------------
    {
        "title": "The given data was invalid.",
        "detail": {
        "title": [
            "名前は必ず入力してください。"
        ]
        },
        "documentation_url": "http://docs.example.com/api/v1/authentication"
    }
    ------------------------------------------------



     __(string)はローカライズ考慮
     localeの制御や、言語ファイルの準備などが必要

     config/app.php
    ：
        'locale' => 'ja',
    ：

     resources/lang/ja.json
    {
        ：
        "The given data was invalid.": "送信データのチェックで不備が見つかりました。",
        ：
    }

 * */