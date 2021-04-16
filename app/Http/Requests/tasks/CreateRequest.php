<?php

namespace App\Http\Requests\tasks;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        if (auth()->user()->role === 1) {
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'user_id' => 'required',
            ];
        } else {
            $rules = [
                'title' => 'required',
                'description' => 'required',
            ];
        }

        return $rules;
    }
}
