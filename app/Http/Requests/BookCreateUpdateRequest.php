<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateUpdateRequest extends FormRequest
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
            'name' => 'required',
            'author' => 'required',
            'synopsis' => 'required',
            'genre' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required|mimes:pdf',
            'price' => 'required|numeric',
        ];
    }
}
