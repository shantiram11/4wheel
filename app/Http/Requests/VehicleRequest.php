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
            'company_name' => ['required', 'string', 'max:191'],
            'fuel_type' => ['required', 'string', 'max:191'],
            'vehicle_number' => ['required', 'string', 'max:191'],
            'brand' => ['required', 'string', 'max:191'],
            'seat_count' => ['required', 'string', 'max:191'],
            'description' => ['required', 'string', 'max:191'],
            'location' => ['required', 'string', 'max:191'],
            'vehicle_type' => ['required', 'string', 'max:191'],
            'model' => ['required', 'string', 'max:191'],
            'status' => ['nullable'],
            'owner_id' => ['nullable'],
        ];
    }
}
