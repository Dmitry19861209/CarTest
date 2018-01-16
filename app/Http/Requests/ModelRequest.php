<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ModelRequest extends Request
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
            'model_id' => 'required|exists:car_model,model_id',
            'service_name' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'model_id.required' => trans('model.required.model_id'),
            'service_name.required'  => trans('model.required.service_name'),
            'price.required'  => trans('model.required.price'),
        ];
    }
}
