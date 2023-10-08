<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'nama' => 'required',
            'level' => 'required|in:admin,user',
            'foto' => 'file|image|max:1000',

        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'username' => 'required|alpha_dash|unique:users',
                'password' => 'required|min:6|same:konfirmasi_password',
                'konfirmasi_password' => 'required|min:6|same:password',
            ];
            if (auth()->user()->level == 'admin') {
                unset($rules['level']);
            }
        }

        if ($this->getMethod() == 'PUT') {
            $rules += [
                'username' => "required|alpha_dash|unique:users,username,{$this->id}",
            ];
            if (auth()->user()->level == 'admin') {
                unset($rules['level']);
            }
        }

        return $rules;
    }
}
