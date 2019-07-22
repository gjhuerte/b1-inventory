<?php

namespace App\Http\Requests\ProductRequests\TypeRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:100|string|unique:product_types,name',
            'code' => 'required|max:100|string|unique:product_types,code',
            'description' => 'nullable',
        ];
    }
}
