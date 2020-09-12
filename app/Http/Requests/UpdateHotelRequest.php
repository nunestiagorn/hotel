<?php

namespace App\Http\Requests;

use App\Models\Hotel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHotelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hotel_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:100',
                'required',
            ],
        ];
    }
}
