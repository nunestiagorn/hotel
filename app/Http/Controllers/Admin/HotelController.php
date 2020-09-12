<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHotelRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HotelController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hotel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotels = Hotel::all();

        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        abort_if(Gate::denies('hotel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hotels.create');
    }

    public function store(StoreHotelRequest $request)
    {
        $hotel = Hotel::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hotel->id]);
        }

        return redirect()->route('admin.hotels.index');
    }

    public function edit(Hotel $hotel)
    {
        abort_if(Gate::denies('hotel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->all());

        return redirect()->route('admin.hotels.index');
    }

    public function show(Hotel $hotel)
    {
        abort_if(Gate::denies('hotel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hotels.show', compact('hotel'));
    }

    public function destroy(Hotel $hotel)
    {
        abort_if(Gate::denies('hotel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hotel->delete();

        return back();
    }

    public function massDestroy(MassDestroyHotelRequest $request)
    {
        Hotel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hotel_create') && Gate::denies('hotel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hotel();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
