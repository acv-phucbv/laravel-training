<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Models\Post;

class UpdatePost extends FormRequest
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
//        $post = Post::find($id);

        return [
//            'title' => [
//                'required|min:5|max:255',
//                Rule::unique('posts')->ignore($post->$id),
//            ],
            'title' => 'required|min:5|max:255|unique:posts,id'.$this->get('id'),
            'body' => 'required',
            'feature_image' => 'mimes:jpeg,gif,png',
        ];
    }
}
