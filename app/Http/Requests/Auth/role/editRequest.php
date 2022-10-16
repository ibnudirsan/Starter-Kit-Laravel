<?php

namespace App\Http\Requests\Auth\role;

use Illuminate\Foundation\Http\FormRequest;

class editRequest extends FormRequest
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
            'roleName'      => 'required|max:30',
            'permissions'   => 'required',
        ];
    }

    /**
    * Get the validation messages that apply to the request.
    *
    * @return array
    */
    public function messages()
    {
        return [
           'permissions.required' => 'Choose a permissions.',
        ];
    }
}
