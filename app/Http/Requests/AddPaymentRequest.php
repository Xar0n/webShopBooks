<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPaymentRequest extends FormRequest
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
            'action' => 'required',
            'FIO' => 'required|min:1|max:255',
            'address' => 'required|min:10|max:1000',
            'number' => 'required',
            'delivery' => 'required|boolean',
        ];
    }
}
