<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRoomRequest;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rooms = Room::all();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        abort_if(Gate::denies('room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotels = Hotel::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room_types = RoomType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rooms.create', compact('hotels', 'room_types'));
    }

    public function store(StoreRoomRequest $request)
    {
        $room = Room::create($request->all());

        foreach ($request->input('image', []) as $file) {
            $room->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $room->id]);
        }

        return redirect()->route('admin.rooms.index');
    }

    public function edit(Room $room)
    {
        abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotels = Hotel::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room_types = RoomType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $room->load('hotel', 'room_type');

        return view('admin.rooms.edit', compact('hotels', 'room_types', 'room'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->all());

        if (count($room->image) > 0) {
            foreach ($room->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }

        $media = $room->image->pluck('file_name')->toArray();

        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $room->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.rooms.index');
    }

    public function show(Room $room)
    {
        abort_if(Gate::denies('room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $room->load('hotel', 'room_type');

        return view('admin.rooms.show', compact('room'));
    }

    public function destroy(Room $room)
    {
        abort_if(Gate::denies('room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $room->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomRequest $request)
    {
        Room::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('room_create') && Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Room();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
