<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request, $filename)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Get the uploaded file
        $image = $request->file('image');

        // Store the uploaded file with the specified filename
        $imageName = $filename . '.' . $image->getClientOriginalExtension();  
        $image->move(public_path('images'), $imageName);

        // Optionally, save $imageName to the database or perform other operations

        return response()->json(['success' => true, 'message' => 'Image uploaded successfully'], 200);
    }
}
