<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        return response()->json(Like::with(['user','post'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id'
        ]);

        $like = Like::create($request->all());
        return response()->json($like, 201);
    }

    public function show($id)
    {
        return response()->json(Like::with(['user','post'])->findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $like = Like::findOrFail($id);
        $like->update($request->all());
        return response()->json($like, 200);
    }

    public function destroy($id)
    {
        Like::destroy($id);
        return response()->json(null, 204);
    }
}
