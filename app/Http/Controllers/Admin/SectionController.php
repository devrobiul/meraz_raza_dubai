<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index($type)
    {
        return view('admin.pages.section.' . $type, compact('type'));
    }

  
}
