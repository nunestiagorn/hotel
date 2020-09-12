<?php

namespace App\Http\Requests;

use App\Models\RoomType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_type_edit');
    }

    public function rules()
    {
        return [
            'name'     => [
                'string',
                'min:3',
                'max:100',
                'required',
            ],
            'hotels.*' => [
                'integer',
            ],
            'hotels'   => [
                'array',
            ],
        ];
    }
}
