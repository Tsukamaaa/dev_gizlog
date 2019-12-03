<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionsRequest extends FormRequest
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
            'tag_category_id' => ['required'],
            'title' => ['required', 'string', 'max:90'],
            'content' => ['required', 'string', 'max:1000']
        ];
    }

    public function messages()
    {
        return [
            'tag_category_id.required'           => '入力必須の項目です。',
            'title.required' => '入力必須の項目です。',
            'content.required'         => '入力必須の項目です。',
          ];
    }
}
