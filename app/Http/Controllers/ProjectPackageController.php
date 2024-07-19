<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectPackage;

class ProjectPackageController extends Controller
{
    public function index()
    {
        $project_packages = ProjectPackage::with('galleries')->get();

        return view('project_packages.index', compact('project_packages'));
    }

    public function show(ProjectPackage $project_package)
    {
        $project_packages = ProjectPackage::where('id', '!=', $project_package->id)->get();

        return view('project_packages.show', compact('project_package', 'project_packages'));
    }
}