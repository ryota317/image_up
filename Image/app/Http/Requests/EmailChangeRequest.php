<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
           'new_email'  => 'required|email'
        ];
    }

    public function messages() {
        return [
        "new_email.required" => "※必須項目です。",
        "new_email.email" => "※有効なメールアドレスを入力してください"
        ];
      }

}
