<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.pages.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type'  => 'required',
            'photo' => 'nullable|mimes:jpg,jpeg,png,gif',
            'video' => 'nullable|url',
        ]);
 
        $data = $request->only('title', 'type');

        if ($request->type === 'photo' && $request->hasFile('photo')) {
            $data['photo'] = uploadFile($request->file('photo')); 
        }
        if ($request->type === 'video') {
            $data['video'] = $request->video;
            $data['photo'] = null; 
        }
        Gallery::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery added successfully.');
    }



    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
