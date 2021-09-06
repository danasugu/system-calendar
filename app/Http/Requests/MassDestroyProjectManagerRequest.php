<?php

namespace App\Http\Requests;

use App\Models\ProjectManager;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProjectManagerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_managers,id',
        ];
    }
}
