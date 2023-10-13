<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('uploadImage')) {
    function uploadImage($image, $path, $table = null, $id = null)
    {
        if ($table) {
            $old_image = \DB::table($table)->where('id', $id)->first()->image;
            $old_path = $old_image ? public_path('admin_assets/images/' . $path . '/' . $old_image) : null;

            $old_path &&  file_exists($old_path) ? unlink($old_path) : '';
        }

        $name  = time() . '.' . $image->extension();
        $image->move(public_path('admin_assets/images/' . $path), $name);
        return $name;
    }
}

