@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.roomType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.room-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.roomType.fields.id') }}
                        </th>
                        <td>
                            {{ $roomType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomType.fields.name') }}
                        </th>
                        <td>
                            {{ $roomType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomType.fields.description') }}
                        </th>
                        <td>
                            {!! $roomType->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.roomType.fields.hotel') }}
                        </th>
                        <td>
                            @foreach($roomType->hotels as $key => $hotel)
                                <span class="label label-info">{{ $hotel->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.room-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection