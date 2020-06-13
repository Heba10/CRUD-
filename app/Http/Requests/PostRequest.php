<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|:posts,title,'.$this->post,
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages() {
        return [
            
            'description.required' => 'Please Enter the description field',
            'title.required' => 'Please Enter the title field',
            
            'description.min' => 'Please the description has minimum of 10 characters',
        ];
    }
}
