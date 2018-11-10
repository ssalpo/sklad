<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'price' => 'required|regex:/^\d{1,15}(\.\d{1,4})?$/',
            'purchase_price' => 'required|regex:/^\d{1,15}(\.\d{1,4})?$/'
        ];

        if($this->request->get('quantity')) {
            $rules['quantity'] = 'numeric';
        }

        return $rules;
    }
}
