<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\ProjectPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request, ProjectPackage $project_package)
    {
        if ($request->validated()) {
            $media = $request->file('media')->store(
                'project_package/gallery', 'public'
            );
            Gallery::create($request->except('media') + [
                'media_path' => $media,
                'project_package_id' => $project_package->id
            ]);
        }

        return redirect()->route('admin.project_packages.edit', [$project_package])->with([
            'message' => 'Success Created!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectPackage $project_package,Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('project_package','gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request,ProjectPackage $project_package, Gallery $gallery)
    {
        if ($request->validated()) {
            if ($request->hasFile('media')) {
                File::delete('storage/' . $gallery->media_path);
                $media = $request->file('media')->store(
                    'project_package/gallery', 'public'
                );
                $gallery->update($request->except('media') + [
                    'media_path' => $media,
                    'project_package_id' => $project_package->id
                ]);
            } else {
                $gallery->update($request->validated());
            }
        }

        return redirect()->route('admin.project_packages.edit', [$project_package])->with([
            'message' => 'Success Updated!',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectPackage $project_package,Gallery $gallery)
    {
        File::delete('storage/'. $gallery->images);
        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
