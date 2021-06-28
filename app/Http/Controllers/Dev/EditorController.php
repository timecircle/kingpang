<?php

namespace App\Http\Controllers\Dev;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    public function imgUpload(Request $request)
    {
        $images = [];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $name  = uniqid() . '.' . $image->getClientOriginalExtension();
                $images[] = $image->storeAs('editor/', $name, 'media'); // thay doi thu muc uploads
            }
        }
        return $images;
    }
}
