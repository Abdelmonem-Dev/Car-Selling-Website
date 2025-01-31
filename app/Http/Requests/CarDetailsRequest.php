<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarDetailsRequest extends FormRequest
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
    public function rules()
    {
        return [
            'maker' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'car_type' => 'required|in:1,8,2',
            'price' => 'required|numeric|min:1',
            'vin_code' => 'required|string',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|in:1,2,3,4',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'boolean',
            'description' => 'nullable|string|max:1000',
            'published' => 'nullable|boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'maker.required' => 'The car manufacturer is required.',
            'model.required' => 'The car model is required.',
            'year.required' => 'Please select a valid year.',
            'year.min' => 'The year must be at least 1900.',
            'year.max' => 'The year cannot be in the future.',
            'car_type.required' => 'Please select a car type.',
            'price.required' => 'Please enter the price of the car.',
            'vin_code.required' => 'The VIN code is required.',
            'vin_code.size' => 'The VIN code must be exactly 17 characters long.',
            'vin_code.regex' => 'The VIN code must be valid (no I, O, or Q characters).',
            'mileage.required' => 'Please enter the mileage of the car.',
            'fuel_type.required' => 'Please select a fuel type.',
            'state.required' => 'Please select a state.',
            'city.required' => 'Please enter a city.',
            'phone.regex' => 'Please enter a valid phone number.',
            'features.array' => 'Invalid features selection.',
            'description.max' => 'Description cannot exceed 1000 characters.',
            'car_images.array' => 'Invalid images format.',
            'car_images.*.image' => 'Each uploaded file must be an image.',
            'car_images.*.mimes' => 'Only JPEG, PNG, JPG, and GIF formats are allowed.',
            'car_images.*.max' => 'Each image must not exceed 2MB.',
        ];
    }

}
