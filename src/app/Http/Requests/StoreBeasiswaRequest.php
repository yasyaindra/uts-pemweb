<?php

namespace App\Http\Requests;

use App\Models\Beasiswa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beasiswa_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'contact' => [
                'string',
                'required',
            ],
            'nominal' => [
                'integer',
                'required',
            ],
        ];
    }
}
