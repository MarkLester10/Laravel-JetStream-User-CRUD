<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'    => [
                'string',
                'required',
                Rule::unique('permissions')->ignore($this->permission),
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('permission_access');
    }
}