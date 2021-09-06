@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projectManager.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.project-managers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projectManager.fields.id') }}
                        </th>
                        <td>
                            {{ $projectManager->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectManager.fields.name') }}
                        </th>
                        <td>
                            {{ $projectManager->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectManager.fields.surnane') }}
                        </th>
                        <td>
                            {{ $projectManager->surnane }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectManager.fields.email') }}
                        </th>
                        <td>
                            {{ $projectManager->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectManager.fields.phone') }}
                        </th>
                        <td>
                            {{ $projectManager->phone }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.project-managers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#project_manager_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#event_events" role="tab" data-toggle="tab">
                {{ trans('cruds.event.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="project_manager_projects">
            @includeIf('admin.projectManagers.relationships.projectManagerProjects', ['projects' => $projectManager->projectManagerProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="event_events">
            @includeIf('admin.projectManagers.relationships.eventEvents', ['events' => $projectManager->eventEvents])
        </div>
    </div>
</div>

@endsection