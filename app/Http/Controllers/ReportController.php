<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return response()->json(Report::with(['reporter','reportedUser','post'])->latest()->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'reporter_id'    => 'required|exists:users,id',
            'reported_id'    => 'required|exists:users,id',
            'reason'         => 'required|string',
            'post_id'        => 'nullable|exists:posts,id'
        ]);

        $report = Report::create($request->all());
        return response()->json($report, 201);
    }

    public function show($id)
    {
        return response()->json(Report::with(['reporter','reportedUser','post'])->findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->update($request->all());
        return response()->json($report, 200);
    }

    public function destroy($id)
    {
        Report::destroy($id);
        return response()->json(null, 204);
    }
}
