<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
            'id' => 'required|exists:permissions,id',
            'name' => 'required|unique:permissions,name,'. $this->route('permission'),
        ];
    }

    public function all($keys = null) 
    {
        $data = parent::all($keys);
        $data['id'] = $this->route('permission');
        return $data;
    }
}
