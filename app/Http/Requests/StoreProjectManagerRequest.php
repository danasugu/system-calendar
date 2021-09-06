<?php

namespace App\Http\Requests;

use App\Models\ProjectManager;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectManagerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_manager_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'surnane' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
        ];
    }
}
