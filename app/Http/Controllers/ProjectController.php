<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $hinh_anh = Project::get();

        return view('admin.page.project.index', compact('hinh_anh'));
    }

    public function data()
    {
        $data = Project::get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Project::create($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $cauhinh = Project::where('id', $request->id)->first();
        $cauhinh->update($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function destroy(Request $request)
    {
        Project::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}
