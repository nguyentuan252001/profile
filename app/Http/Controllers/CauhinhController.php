<?php

namespace App\Http\Controllers;

use App\Http\Requests\CauhinhRequest;
use App\Models\Cauhinh;
use Illuminate\Http\Request;

class CauhinhController extends Controller
{

    public function index()
    {
        return view('admin.page.homepage.index');
    }

    public function data()
    {
        $data = Cauhinh::all();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function store(CauhinhRequest $request)
    {
        $data = $request->all();
        Cauhinh::create($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function update(Request $request)
    {
        $data = $request->all();
        $cauhinh = Cauhinh::where('id', $request->id)->first();
        $cauhinh->update($data);

        return response()->json([
            'status' => true,
        ]);
    }
    public function destroy(Request $request)
    {
        Cauhinh::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}
