<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'ProductName' => 'required|max:100',
            'Prefecture' => 'required|max:10|not_in:選択してください',
            'description' => 'required|max:255',
            'url' => 'required|max:255',
            'image_or_url' => 'required|in:image,url',
            'ProductImg' => 'required_if:image_or_url,image|file|mimes:jpeg,png,jpg,gif|max:2048',
            'ProductImgUrl' => 'required_if:image_or_url,url|nullable|url|max:255'
        ];
    }
}
