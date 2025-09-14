<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // GET all posts
    public function index()
    {
        return response()->json(Post::with(['user','comments','likes'])->latest()->get(), 200);
    }

    // CREATE new post
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'nullable|string',
            'media_url' => 'nullable|string'
        ]);

        $post = Post::create($request->all());

        return response()->json($post, 201);
    }

    // SHOW single post
    public function show($id)
    {
        $post = Post::with(['user','comments','likes'])->findOrFail($id);
        return response()->json($post, 200);
    }

    // UPDATE post
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json($post, 200);
    }

    // DELETE post
    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json(null, 204);
    }
}
