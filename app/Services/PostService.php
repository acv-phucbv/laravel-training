<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Image;
use Storage;
use App\Services\Interfaces\PostServiceInterface;

class PostService implements PostServiceInterface
{
    public function createPost(array $data)
    {
        $postData = [
            'title' => $data['title'],
            'content' => $data['body'],
        ];

        $user = Auth::user();
        $postData['user_id'] = $user->id;

        if (isset($data['feature_image'])) {
            $image = $data['feature_image'];
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(800,400)->save($location);
            $postData['image'] = $fileName;
        }

        return Post::create($postData);
    }

    public function updatePost(array $data, $id)
    {
        $post = Post::find($id);

        $postData = [
            'title' => $data['title'],
            'content' => $data['body'],
        ];

        $user = Auth::user();
        $postData['user_id'] = $user->id;

        if (isset($data['feature_image'])) {
            $image = $data['feature_image'];
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/' . $fileName);
            Image::make($image)->resize(800,400)->save($location);
            $oldFileName = $post->image;
            $postData['image'] = $fileName;
            Storage::delete($oldFileName);
        }

        return $post->update($postData);
    }
}