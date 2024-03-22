<?php

namespace App\Http\Requests;

use Backpack\CRUD\app\Library\Validation\Rules\ValidUpload;
use Backpack\CRUD\app\Library\Validation\Rules\ValidUploadMultiple;
use Backpack\Pro\Uploads\Validation\ValidDropzone;
use Backpack\Pro\Uploads\Validation\ValidEasyMDE;
use Illuminate\Foundation\Http\FormRequest;

class UploaderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'upload' => ValidUpload::field('nullable')->file(['max:1024', 'mimes:pdf']),
            'upload_required' => ValidUpload::field('required')->file(['max:1024', 'mimes:pdf']),
            'upload_multiple' => ValidUploadMultiple::field('nullable')->file(['max:1024', 'mimes:pdf']),
            'upload_multiple_required' => ValidUploadMultiple::field('required')->file(['max:1024', 'mimes:pdf']),
            'dropzone_required' => ValidDropzone::field('required')->file(['max:1024', 'mimes:pdf,jpg,png,gif']),
            'easymde' => ValidEasyMDE::field('required|max:500')->file(['max:1024', 'mimes:jpg']),
            'gallery.*.upload' => ValidUpload::field('required')->file(['max:1024', 'mimes:pdf']),
            'gallery.*.upload_multiple' => ValidUploadMultiple::field('required')->file(['max:1024', 'mimes:pdf']),
            'gallery.*.dropzone' => ValidDropzone::field('required|min:2')->file(['max:1024', 'mimes:pdf,jpg,png,gif']),
            'gallery.*.easymde' => ValidEasyMDE::field('required|max:500')->file(['max:1024', 'mimes:jpg']),
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'gallery.*.upload' => 'gallery upload',
            'gallery.*.upload_multiple' => 'gallery upload multiple',
            'gallery.*.dropzone' => 'gallery dropzone',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'gallery.*.upload.required' => 'A custom message for the required upload',
        ];
    }
}
