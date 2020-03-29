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
            'title' => 'required|min:3|unique:posts,title,'.$this->post,
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages() {
        return [
            'title.unique' => 'Title should be unique',
            'description.required' => 'Please Enter the description field',
            'title.required' => 'Please Enter the title field',
            'title.min' => 'Please the title has minimum of 3 characters',
            'description.min' => 'Please the description has minimum of 10 characters',
        ];
    }
}
