<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);
        $rules = [
            'title' => ['required', "unique:posts,title,{$id},id"],
            'image' => ['nullable|image|max:1024'],
            'published' => ['required'],
            'abstract' => ['required'],
            'description' => ['required'],
        ];

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
