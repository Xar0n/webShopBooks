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
     * @return array
     */
    public function rules()
    {
        return [
            'query' => 'required|min:1|max:1000',
            'filters' => 'nullable|boolean',
            'availability' => 'nullable|boolean',
            'priceFrom' => 'nullable|numeric',
            'priceBy' => 'nullable|numeric',
            'publisher' => 'nullable|min:0|max:255',
        ];
    }
}