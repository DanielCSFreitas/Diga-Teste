<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
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
                'email' => ['required'],
                'password'=> ['required','confirmed','min:6'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required'],
                'password' => ['sometimes', 'required','confirmed','min:6']
            ];
        }

    }

    protected function prepareForValidation(){
        $this->password = Hash::make($this->password);
    }
}
