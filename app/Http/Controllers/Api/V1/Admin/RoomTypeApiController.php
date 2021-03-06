<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Http\Resources\Admin\RoomTypeResource;
use App\Models\RoomType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomTypeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('room_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomTypeResource(RoomType::with(['hotels'])->get());
    }

    public function store(StoreRoomTypeRequest $request)
    {
        $roomType = RoomType::create($request->all());
        $roomType->hotels()->sync($request->input('hotels', []));

        return (new RoomTypeResource($roomType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RoomType $roomType)
    {
        abort_if(Gate::denies('room_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomTypeResource($roomType->load(['hotels']));
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        $roomType->update($request->all());
        $roomType->hotels()->sync($request->input('hotels', []));

        return (new RoomTypeResource($roomType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RoomType $roomType)
    {
        abort_if(Gate::denies('room_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
