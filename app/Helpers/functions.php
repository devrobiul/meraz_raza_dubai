<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        static $setting;


        if (!$setting) {
            $setting =  Setting::get()->pluck('value', 'key')->toArray();
        }

        return $setting[$key] ?? $default;
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $path = 'frontend/uploads')
    {
        if ($file) {
            $fileName = hexdec(uniqid()) . '.' . $file->extension();
            $file->move(public_path($path), $fileName);
            $uploadPath =  $path . '/' . $fileName;
            return str_replace('\\', '/', $uploadPath);
        }

        return null;
    }
}
