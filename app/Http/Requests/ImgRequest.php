<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgRequest extends FormRequest
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
            'products_names' => 'required|string|max:100',
            'Prefecture' => 'required|string|not_in:"選択してください"',
            'description' => 'required|string|max:255',
            'SalesArea' => 'required|string|max:100',
            'image' => 'required|image|max:2048',
            'url' => 'required|string|max:255'
        ];
    }
}
