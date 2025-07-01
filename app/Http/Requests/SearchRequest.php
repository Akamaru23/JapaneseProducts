<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'SearchPrefecture' => 'nullable|string',
            'SearchProducts_names' => 'nullable|string',
            'Search_id' => 'nullable|integer'
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (empty($this->input('SearchPrefecture')) && empty($this->input('SearchProducts_names'))) {
                $validator->errors()->add('SearchPrefecture', '何か一つは入力してください。');
                $validator->errors()->add('SearchProducts_names', '何か一つは入力してください。');
            }
        });
    }
}
