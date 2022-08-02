<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cauhinh;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $data = Cauhinh::get();
        return view('admin.page.about.index', compact('data'));
    }

    public function data()
    {
        $data = About::all();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        About::create($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $cauhinh = About::where('id', $request->id)->first();
        $cauhinh->update($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function destroy(Request $request)
    {
        About::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}
