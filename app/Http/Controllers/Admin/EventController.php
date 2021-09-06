<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\ProjectManager;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::with(['event'])->get();

        $project_managers = ProjectManager::get();

        return view('admin.events.index', compact('events', 'project_managers'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = ProjectManager::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.events.create', compact('events'));
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());

        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = ProjectManager::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event->load('event');

        return view('admin.events.edit', compact('events', 'event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('admin.events.index');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('event');

        return view('admin.events.show', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
