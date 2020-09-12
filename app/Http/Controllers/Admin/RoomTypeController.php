<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRoomTypeRequest;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Models\Hotel;
use App\Models\RoomType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RoomTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('room_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomTypes = RoomType::all();

        return view('admin.roomTypes.index', compact('roomTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('room_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotels = Hotel::all()->pluck('name', 'id');

        return view('admin.roomTypes.create', compact('hotels'));
    }

    public function store(StoreRoomTypeRequest $request)
    {
        $roomType = RoomType::create($request->all());
        $roomType->hotels()->sync($request->input('hotels', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $roomType->id]);
        }

        return redirect()->route('admin.room-types.index');
    }

    public function edit(RoomType $roomType)
    {
        abort_if(Gate::denies('room_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotels = Hotel::all()->pluck('name', 'id');

        $roomType->load('hotels');

        return view('admin.roomTypes.edit', compact('hotels', 'roomType'));
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        $roomType->update($request->all());
        $roomType->hotels()->sync($request->input('hotels', []));

        return redirect()->route('admin.room-types.index');
    }

    public function show(RoomType $roomType)
    {
        abort_if(Gate::denies('room_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomType->load('hotels');

        return view('admin.roomTypes.show', compact('roomType'));
    }

    public function destroy(RoomType $roomType)
    {
        abort_if(Gate::denies('room_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomType->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomTypeRequest $request)
    {
        RoomType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('room_type_create') && Gate::denies('room_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RoomType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
