<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
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
            'complaint_date' => 'required',
            'user_id' => 'required',
            'subject' => 'required',
            'description' => 'required',
            'category' => 'required',
            'district' => 'required',
            'source' => 'required',
            'name' => 'required',
            'father_husband' => 'required',
            'gender' => 'required',
            'cnic' => 'required',
            'office' => 'required',
            'cell_number' => 'required',
            'address' => 'required',
        ];
    }
}
