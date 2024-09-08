<?php

namespace App\Http\Requests\Auth\profile;

use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © Raungdev 2022
|--------------------------------------------------------------------------
*/

class updateProfile extends FormRequest
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
            'fullname'      => ['required','max:30'],
            'numberphone'   => ['required','numeric','digits_between:10,13'],
            'TeleID'        => 'telegram'
        ];
    }
}
