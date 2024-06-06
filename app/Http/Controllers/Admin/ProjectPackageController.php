<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectPackageRequest;

class ProjectPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_packages = ProjectPackage::paginate(10);

        return view('admin.project_packages.index', compact('project_packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectPackageRequest $request)
    {
        if($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $project_package = ProjectPackage::create($request->validated() + ['slug' => $slug ]);
        }

        return redirect()->route('admin.project_packages.edit', [$project_package])->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectPackage $project_package)
    {
        $galleries = Gallery::paginate(10);
        
        return view('admin.project_packages.edit', compact('project_package','galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectPackageRequest $request, ProjectPackage $project_package)
    {
        if($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $project_package->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.project_packages.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectPackage $project_package)
    {
        $project_package->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
