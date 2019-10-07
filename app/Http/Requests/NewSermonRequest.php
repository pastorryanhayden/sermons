<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSermonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3',
            'date' => 'required|date',
            'service' => 'required|string',
            'featured' => 'nullable| boolean',
            'series_id' => 'required | integer',
            'speaker_id' => 'required | integer',
            'description' => 'nullable | string'
        ];
    }
}