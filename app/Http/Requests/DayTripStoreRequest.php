<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DayTripStoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'destination' => 'required',
            'price_per_day' => 'required',
            'max_capacity_per_day' => 'required',
            'time_start' => 'required|array|min:1',
            'time_end' => 'required|array|min:1',
            'agenda' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:png,jpeg|max:5120',
        ];
    }
}
