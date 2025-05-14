<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('asset_img')) {
    function asset_img($path)
    {
        if (!empty($path) && Storage::exists($path)) {
            return Storage::url($path);
        } else {
            return asset('images/'.$path);
        }
    }
}