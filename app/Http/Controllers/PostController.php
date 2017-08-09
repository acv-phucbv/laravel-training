<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
//use App\User;
use Illuminate\Support\Facades\Auth;
use App\Services\PostService;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(PostService $postService)
    {
        $this->middleware('auth', ['except' => ['index','show']]);
        $this->postService = $postService;

//        $this->middleware('guest')->except('create', 'delete', 'store', 'destroy', 'update', 'edit');
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = $this->postService->createPost($request->all());
        if (!$post){
            throw new \Exception('server error', 500);
        }

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Post::find($id);
        return view('posts.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Post::find($id);
        return view('posts.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePost  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
//        $post = Post::find($id);
//
//        $post->title = $request->title;
//        $post->content = $request->body;
//
//        if ($request->hasFile('feature_image')) {
//            $image = $request->file('feature_image');
//            $fileName = time().'.'.$image->getClientOriginalExtension();
//            $location = public_path('images/' . $fileName);
//            Image::make($image)->resize(800,400)->save($location);
//            $oldFileName = $post->image;
//            $post->image = $fileName;
//            Storage::delete($oldFileName);
//        }
//
//        $post->save();

        $post = $this->postService->updatePost($request->all(), $id);
        if (!$post){
            throw new \Exception('server error', 500);
        }

        session()->flash('message', 'Update Successful');

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request )
    {
        $post = Post::findorFail($id);

        if ( $request->ajax() ) {
            $post->delete( $request->all() );

            return response(['msg' => 'Product deleted', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);

//        $item->delete();
//        session()->flash('message', 'Delete Successful');
//
//        return redirect('posts');
    }
}
