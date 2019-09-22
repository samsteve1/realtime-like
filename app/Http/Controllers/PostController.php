<?php

namespace App\Http\Controllers;

use App\Post;
use App\Events\PostWasCreated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return Post::latestFirst()->with(['user'])->get();
    }
    public function store(Request $request)
    {
       $post =  $request->user()->posts()->create([
            'body' => $request->body
        ]);

        broadcast(new PostWasCreated($post))->toOthers();
        return $post->load(['user']);
    }


}
