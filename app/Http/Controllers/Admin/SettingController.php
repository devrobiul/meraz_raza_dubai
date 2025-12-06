<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general(){
           return view('admin.pages.settings.general');
    }
    public function information(){
           return view('admin.pages.settings.information');
    }
    public function googleCode(){
           return view('admin.pages.settings.google_code');
    }

    public function seo($type){
           return view('admin.pages.settings.seo',compact('type'));
    }

       public function store(Request $request)
    {
        $data =  $request->except('_toke');


        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $value = uploadFile($request->file($key));
            }
            $setting = Setting::firstOrNew([
                'key' => $key,
            ]);
            if ($setting->exists && $setting->value != $value) {
                if ($setting->value && file_exists(public_path($setting->value))) {
                    unlink(public_path($setting->value));
                }
            }
            $setting->value =  $value;

            $setting->save();
        }

        flash()->success('Data updated successfully.');
        return back();
    }
}
