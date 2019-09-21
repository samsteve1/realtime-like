<?php

namespace App\Http\Controllers;

use App\Post;
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

        return $post->load(['user']);
    }


}
