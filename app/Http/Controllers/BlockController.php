<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index()
    {
        return response()->json(Block::with(['blocker','blocked'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blocker_id' => 'required|exists:users,id',
            'blocked_id' => 'required|exists:users,id'
        ]);

        $block = Block::create($request->all());
        return response()->json($block, 201);
    }

    public function show($id)
    {
        return response()->json(Block::with(['blocker','blocked'])->findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $block = Block::findOrFail($id);
        $block->update($request->all());
        return response()->json($block, 200);
    }

    public function destroy($id)
    {
        Block::destroy($id);
        return response()->json(null, 204);
    }
}
