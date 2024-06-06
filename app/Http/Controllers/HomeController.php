<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\ProjectPackage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $project_packages = ProjectPackage::with('galleries')->get();
        $blogs = Blog::get()->take(3);

        return view('homepage', compact('project_packages','blogs'));
    }

    public function redirects()
    {

        $is_admin= Auth::user()->is_admin;

        if($is_admin=='1')
        {
            return view('admin.dashboard');
        }

        else
        {
            return view('homepage');
        }
    }
}
