<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'company_name' => ['required', 'string','min:3', 'max:191'],
            'fuel_type' => ['required','in:petrol,diesel,hybrid,electric'],
            'vehicle_number' => ['required', 'string', 'max:191', 'min:4'],
            'brand' => ['required', 'string', 'max:191', 'min:2'],
            'seat_count' => ['required', 'numeric', 'max:191'],
            'rate' => ['required', 'numeric',],
            'description' => ['required', 'string','min:10', 'max:191'],
            'location' => ['required', 'string', 'max:20'],
            'vehicle_type'  => ['required','exists:categories,id'],
            'model' => ['required', 'string', 'max:191'],
            'status' => ['nullable'],
            'owner_id' => ['nullable'],
            'featured_image'   => ['required_without:featured_image_hidden_value', 'nullable', 'image','mimes:jpg,jpeg,png,gif','max:2048'],

        ];
    }
}
