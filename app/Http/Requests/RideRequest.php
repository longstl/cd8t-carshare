<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RideRequest extends FormRequest
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
            'user_car_id' => ['required','integer'],
            'travel_start_time' => ['required','datetime'],
            'origin_address' => ['required','string'],
            'origin_coordinate' => ['required','string'],
            'destination_address' => ['required','string'],
            'destination_coordinate' => ['required','string'],
            'distance' => ['required','integer'],
            'seats_offered' => ['required','integer'],
            'seats_available' => ['required','integer'],
            'contribution_per_head' => ['required','integer']
            //
        ];
    }
}
