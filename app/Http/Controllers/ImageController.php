<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request, $filename)
    {
        // Validasi file yang diunggah
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Ambil file yang diunggah
        $image = $request->file('image');

        // Buat nama file dengan ekstensi asli
        $imageName = $filename . '.' . $image->getClientOriginalExtension();  
        
        // Pindahkan file gambar ke direktori 'public/img' dengan nama baru
        $image->move(public_path('img'), $imageName);

        // Opsional, simpan $imageName ke database atau lakukan operasi lain

        return response()->json(['success' => true, 'message' => 'Image uploaded successfully'], 200);
    }
}



