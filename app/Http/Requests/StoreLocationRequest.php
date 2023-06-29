<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('location_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'rating' => [
                'numeric',
                'min:1',
                'max:5',
                'nullable',
            ],
            'price' => [
                'numeric',
                'nullable',
            ],
            'cetagory_id' => [
                'integer',
                'exists:categories,id',
                'required',
            ],
            'lat' => [
                'numeric',
                'nullable',
            ],
            'lng' => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
