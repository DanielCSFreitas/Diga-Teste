<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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

        $method = $this->method();
        if($method == 'PUT'){
            return [
                'name' => ['required'],
                'fileSize' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'fileSize' => ['sometimes', 'required'],
                'tagId' => ['sometimes']
            ];
        }

    }

    protected function prepareForValidation(){
        if($this->fileSize){
            $this->merge([
                'file_size' =>$this->fileSize
            ]);
        }
        if($this->tagId){
            $this->merge([
                'tag_id' =>$this->tagId
            ]);
        }
}
}
