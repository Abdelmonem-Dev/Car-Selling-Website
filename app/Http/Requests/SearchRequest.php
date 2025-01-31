<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'maker' => 'nullable|exists:makers,id', // Validates if 'maker' exists in the 'makers' table
            'model' => 'nullable|exists:models,id', // Validates if 'model' exists in the 'models' table
            'state' => 'nullable|exists:states,id', // Validates if 'state' exists in the 'states' table
            'city' => 'nullable|exists:cities,id', // Validates if 'city' exists in the 'cities' table
            'car_type_id' => 'nullable|exists:car_types,id', // Validates if 'car_type_id' exists in the 'car_types' table
            'year_from' => 'nullable|date|before_or_equal:year_to', // 'year_from' must be before or equal to 'year_to'
            'year_to' => 'nullable|date|after_or_equal:year_from', // 'year_to' must be after or equal to 'year_from'
            'price_from' => 'nullable|numeric|min:0', // 'price_from' must be a number and at least 0
            'price_to' => 'nullable|numeric|min:0|gte:price_from', // 'price_to' must be greater than or equal to 'price_from'
            'fuel_type_id' => 'nullable|exists:fuel_types,id', // Validates if 'fuel_type_id' exists in the 'fuel_types' table
        ];
    }
    public function messages(): array
    {
        return [
            'year_from.before_or_equal' => 'Year From must be less than or equal to Year To.',
            'year_to.after_or_equal' => 'Year To must be greater than or equal to Year From.',
            'price_from.numeric' => 'Price From must be a valid number.',
            'price_to.gte' => 'Price To must be greater than or equal to Price From.',
            'maker.exists' => 'The selected maker is invalid.',
            'model.exists' => 'The selected model is invalid.',
            'state.exists' => 'The selected state is invalid.',
            'city.exists' => 'The selected city is invalid.',
            'car_type_id.exists' => 'The selected car type is invalid.',
            'fuel_type_id.exists' => 'The selected fuel type is invalid.',
        ];
    }
}
