<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
    public function rules(request $request)
    {
        return [
            'value' => 'required|number|max:'.$request->quantity,
        ];
    }

    public function messages()
    {
        return 'success';
        // return [
        //     'nameproduct.required' => 'Name Product is required!',
        //     'namesupplier.required' => 'Name Supplier is required!',
        //     'quantity.required' => 'Quantity is required!',
        //     'value.required' => 'Value is required!',
        // ];
    }
}
