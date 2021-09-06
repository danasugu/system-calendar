@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="project_name">{{ trans('cruds.project.fields.project_name') }}</label>
                <input class="form-control {{ $errors->has('project_name') ? 'is-invalid' : '' }}" type="text" name="project_name" id="project_name" value="{{ old('project_name', '') }}" required>
                @if($errors->has('project_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_description">{{ trans('cruds.project.fields.project_description') }}</label>
                <textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : '' }}" name="project_description" id="project_description" required>{{ old('project_description') }}</textarea>
                @if($errors->has('project_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="starting_date">{{ trans('cruds.project.fields.starting_date') }}</label>
                <input class="form-control date {{ $errors->has('starting_date') ? 'is-invalid' : '' }}" type="text" name="starting_date" id="starting_date" value="{{ old('starting_date') }}" required>
                @if($errors->has('starting_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('starting_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.starting_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.project.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_manager_id">{{ trans('cruds.project.fields.project_manager') }}</label>
                <select class="form-control select2 {{ $errors->has('project_manager') ? 'is-invalid' : '' }}" name="project_manager_id" id="project_manager_id">
                    @foreach($project_managers as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_manager_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection