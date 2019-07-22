<?php

namespace App\Http\Requests\ProductRequests\TypeRequests;

use App\Http\Services\Product\TypeService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $product = (new TypeService)->find($this->id);

        return [
            'name' => 'required|max:100|string|unique:product_types,name,' . $product->name . ',name',
            'code' => 'required|max:100|string|unique:product_types,code,' . $product->code . ',code',
            'description' => 'nullable',
        ];
    }
}
