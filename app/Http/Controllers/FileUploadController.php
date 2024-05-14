<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function fileupload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        return "Pemrosesan file upload disini";
    }
}
