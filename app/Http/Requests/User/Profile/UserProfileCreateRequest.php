<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'country' => 'required',
            'province' => 'present',
            'city' => 'present',
            'district' => 'present',
            'county' => 'present',
            'address' => 'present',
            'profile_intro' => 'present'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'gender.required' => 'Gender is required',
            'birthday.required' => 'Birthday is required',
            'country.required' => 'Country is required',
            'province.present' => 'Province is required',
            'city.present' => 'City is required',
            'district.present' => 'District is required',
            'county.present' => 'County is required',
            'address.present' => 'Address is required',
            'profile_intro.present' => 'Profile Intro is required',
        ];
    }
}
