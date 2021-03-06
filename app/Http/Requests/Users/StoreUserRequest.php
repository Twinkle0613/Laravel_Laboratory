<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'picture' => '',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|exists:roles,id',
            'password' => 'required',  
            'c_password' => 'required|same:password', 
        ];
    }

    public function all($keys = null) 
    {
        $data = parent::all($keys);
        return $data;
    }
}
