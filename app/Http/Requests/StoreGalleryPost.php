<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryPost extends FormRequest
{
    protected $redirectRoute = "gallery.create";
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
            'uploader_name' => 'required|string|min:3|max:60',
            'show_from' => 'required|date_format:Y-m-d|after:yesterday',
            'show_until' => 'required|date_format:Y-m-d|after:show_from',
            'file_path' => 'required_without:url|max:10000|mimes:jpeg,jpg,png,gif',
            'url' => 'nullable|url|required_if:file_path,false',
        ];
    }
}
