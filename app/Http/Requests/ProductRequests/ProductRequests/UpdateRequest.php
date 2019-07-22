<?php

namespace App\Http\Requests\ProductRequests\ProductRequests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Services\Product\ProductService;

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
        $product = (new ProductService($this->type))->findFirst($this->product);

        return [
            'code' => 'required|max:100|string|unique:product_types,code,' . $product->code . ',code',
        ];
    }
}
