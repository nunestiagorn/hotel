<?php

namespace App\Http\Requests;

use App\Models\Room;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_edit');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'min:3',
                'max:100',
                'nullable',
            ],
            'price'        => [
                'required',
            ],
            'description'  => [
                'required',
            ],
            'hotel_id'     => [
                'required',
                'integer',
            ],
            'room_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
