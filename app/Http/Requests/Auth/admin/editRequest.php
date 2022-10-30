<?php

namespace App\Http\Requests\Auth\admin;

use App\Rules\admin\passwordRule;
use App\Rules\customer\numberPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/

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
            'fullName'      => 'required|max:30',
            'name'          => 'required|max:15|unique:users,name,'.$this->id.',uuid',
            'email'         => 'required|email:rfc,dns|max:25|unique:users,email,'.$this->id.',uuid',         
            'telegramid'    => 'nullable|numeric|digits_between:10,12',
            'Numberphone'   => ['required',
                                'numeric',
                                'digits_between:10,13',
                                new numberPhoneRule()],
            'roles'         => 'required',
            'password'      => ['nullable','string','min:6', new passwordRule()]
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
           'roles.required'     => 'Choose a roles.',
           'telegramid.numeric' => 'The TelegramID must be a number max 12 digits.'
        ];
    }
}
