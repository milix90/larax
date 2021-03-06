<?php

namespace App\Http\Requests\tasks;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the employee is authorized to make this request.
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
        if (auth()->user()->role === 'admin') {
            $rules = [
                'id' => 'required',
                'title' => 'required',
                'description' => 'required',
                'user_id' => 'required',
            ];
        } else {
            $rules = [
                'id' => 'required',
                'title' => 'required',
                'description' => 'required',
            ];
        }

        return $rules;
    }
}
