<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::latest()->get();
        return view('admin.pages.education.index', compact('educations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'org' => 'required|string|max:255',
            'session' => 'required|string|max:50',
            'gpa' => 'nullable|string|max:10',
            'department' => 'nullable|string|max:100',
        ]);

        Education::create($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Education added successfully.');
    }

    public function edit(Education $education)
    {
        $educations = Education::latest()->get(); // For table in same page
        return view('admin.pages.education.index', compact('education', 'educations'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'org' => 'required|string|max:255',
            'session' => 'required|string|max:50',
            'gpa' => 'nullable|string|max:10',
            'department' => 'nullable|string|max:100',
        ]);

        $education->update($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Education deleted successfully.');
    }
}
