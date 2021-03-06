<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeSliderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'short_title' => ['required', 'string', 'max:255'],
            'video_url' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimes:jpg,png,jpeg,gif,svg', 'max:2000'],
        ];
    }
}
