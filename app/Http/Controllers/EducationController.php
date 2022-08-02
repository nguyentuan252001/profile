<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('admin.page.education.index');
    }

    public function data()
    {
        $data = Education::orderBy('year', 'DESC')->get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Education::create($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $cauhinh = Education::where('id', $request->id)->first();
        $cauhinh->update($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function destroy(Request $request)
    {
        Education::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}
