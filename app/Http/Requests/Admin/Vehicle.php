<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Vehicle extends FormRequest
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
            'user' => 'required|exists:users,id',
            'renavam' => 'required|string|min:11|max:11',
            'category' => 'required|exists:categories,id',
            'model' => 'required|exists:model_cars,id',
            'brand' => 'required|exists:brands,id',
            'license_plate'=>'required|min:7|max:8',
            'color'=> 'required|string',
            // 'sale_price' => '',
            // 'rental_price' => '',
            // 'fuel'=> 'required|string',
            'year' => 'date_format:Y',
            'status' => 'required|in:available,unavailable,rented,sold'
        ];
    }
}
