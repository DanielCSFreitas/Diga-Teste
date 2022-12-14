<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'name' => ['required'],
            'fileSize' => ['required', 'numeric', 'lte:5'],
            'file' => ['sometimes','required', 'file', 'mimetypes:video/mp4'],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'file_size' =>$this->fileSize
        ]);
    }
}
