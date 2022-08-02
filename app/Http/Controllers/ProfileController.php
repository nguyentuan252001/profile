<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cauhinh;
use App\Models\Education;
use App\Models\Project;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function view()
    {
        $homepage = Cauhinh::orderByDESC('id')->take(1)->get();
        $about = About::orderByDESC('id')->take(1)->get();
        $education = Education::orderByDESC('id')->take(6)->get();
        $project = Project::orderByDESC('id')->take(6)->get();
        return view('master', compact('homepage', 'about', 'education', 'project'));
    }
}
