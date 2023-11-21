<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'employee_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8',
            'email' => 'required',
            'nrc_number' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'department_id' => 'required',
            'date_of_join' => 'required',
            'is_present' => 'required',
        ];
    }
}
