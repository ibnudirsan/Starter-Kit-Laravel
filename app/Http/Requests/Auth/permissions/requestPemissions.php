<?php

namespace App\Http\Requests\Auth\permissions;

use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/

class requestPemissions extends FormRequest
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
            'permissionName' => 'required|max:50',
            'moduleName'     => 'required',
            'guardType'      => 'required'
        ];
    }
}
