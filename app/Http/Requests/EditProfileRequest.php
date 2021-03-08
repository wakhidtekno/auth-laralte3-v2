<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'nama' => 'required|unique:users,nama,'.auth()->user()->id,
            'username' => 'required|alpha_dash|unique:users,username,'.auth()->user()->id,
            'foto' => 'file|image|max:1000',

        ];
    }
}
