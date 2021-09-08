<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProjectManagerRequest;
use App\Http\Requests\StoreProjectManagerRequest;
use App\Http\Requests\UpdateProjectManagerRequest;
use App\Models\ProjectManager;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectManagerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectManagers = ProjectManager::all();

        return view('admin.projectManagers.index', compact('projectManagers'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectManagers.create');
    }

    public function store(StoreProjectManagerRequest $request)
    {
        $projectManager = ProjectManager::create($request->all());

        return redirect()->route('admin.project-managers.index');
    }

    public function edit(ProjectManager $projectManager)
    {
        abort_if(Gate::denies('project_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectManagers.edit', compact('projectManager'));
    }

    public function update(UpdateProjectManagerRequest $request, ProjectManager $projectManager)
    {
        $projectManager->update($request->all());

        return redirect()->route('admin.project-managers.index');
    }

    public function show(ProjectManager $projectManager)
    {
        abort_if(Gate::denies('project_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectManager->load('projectManagerProjects', 'eventEvents');

        return view('admin.projectManagers.show', compact('projectManager'));
    }

    public function destroy(ProjectManager $projectManager)
    {
        abort_if(Gate::denies('project_manager_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectManager->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectManagerRequest $request)
    {
        ProjectManager::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
