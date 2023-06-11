<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Product;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function imageUpload(Request $request) {
        $file = $request->image;

        $fileNameWithExt = $file->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $fileExtension = $file->getClientOriginalExtension();

        $generatedFileName = $fileName . '_' . time() . '.' . $fileExtension;

        $fileStorePath = $file->storeAs('img/editor/', $generatedFileName);

        $imagePreviewPath = '/storage/img/editor/' . $generatedFileName;   

        $res = array(
            'success' => 1,
            'file' => (object) array(
                'url' => $imagePreviewPath
            )
        );  

        return response()->json($res);
    }

    public function add(Request $request) { 
        $validated = $request->validate([
            'description' => 'required'
        ]);

        $description = new Description; 
        $description->description =  json_encode($request->description);
        $description->save();

        $res = ['msg' => 'post save'];

        return response()->json($res);
    }
}
