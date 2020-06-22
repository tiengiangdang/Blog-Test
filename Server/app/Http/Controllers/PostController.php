<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;

class PostController extends Controller
{
    public function addPost(Request $request)
    {   

        // return response()->json($request->user());
        $this->validate($request, 
        [
            'title'     =>  'required|unique:post|string',
            'trailer'   =>  'required|string',
            'content'   =>  'required|string',

        ],
        [
            'title.required'    =>  'You have not entered a title',
            'trailer.required'  =>  'You have not entered a trailer',
            'content.required'  =>  'You have not entered a content',
        ]);
        $post = new Post;
        $post->title    =   $request->title;
        $post->trailer  =   $request->trailer;
        $post->content  =   $request->content;
        $post->time     =   Carbon::now();
        $post->save();
        return response()->json($post, 201);

    }
    public function listPost()
    {
        $post = Post::all();
        return $post;
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json([
            'message' => 'Successfully delete post!'
        ], 201);
    }
    public function editPost($id, Request $request)
    {
        $post = Post::find($id);
        $this->validate($request, 
        [
            'title'     =>  'required|unique:post|string',
            'trailer'   =>  'required|string',
            'content'   =>  'required|string',

        ],
        [
            'title.required'    =>  'You have not entered a title',
            'trailer.required'  =>  'You have not entered a trailer',
            'content.required'  =>  'You have not entered a content',
        ]);
        $post->title    =   $request->title;
        $post->trailer  =   $request->trailer;
        $post->content  =   $request->content;
        $post->time     =   Carbon::now();
        $post->save();
        return response()->json([
            'message' => 'Successfully edit post!'
        ], 201);

    }
    public function detailPost($id)
    {
        $post = Post::find($id);
        return $post;
    }
}
