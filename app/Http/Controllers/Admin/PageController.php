<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug)
    {

        $page =  Page::where('slug', $slug)->firstOrFail();
        return view('admin.pages.pages.index', [
            'page' => $page,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([

            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);
        $page = Page::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($page->image && file_exists(public_path($page->image))) {
                unlink(public_path($page->image));
            }
            $page->image = uploadFile($request->file('image'));
        }
        $page->description = $request->input('description');
        $page->meta_title = $request->input('meta_title');
        $page->meta_keywords = $request->input('meta_keywords');
        $page->meta_description = $request->input('meta_description');
        $page->save();
        flash()->success('Page updated successfully!');
        return redirect()->back();
    }
}
