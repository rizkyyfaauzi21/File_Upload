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
        // dump($request->berkas);
        // dump($request->file('fiel'));
        // return "Pemrosesan file upload disini";

        // if ($request->hasFile('berkas')) {
        //     echo "path(): " . $request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): " . $request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): " . $request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): " . $request->berkas->getSize();
        // } else {
        //     echo "<br>";
        //     echo "Tidak ada berkas yang diupload";
        // }

        $request->validate([
            'name_picture' => 'required',
            'berkas' => 'required|file|image|max:500',
        ]);
        $extension = $request->berkas->getClientOriginalExtension();
        $namaFile = $request->name_picture . "." . $extension;
        // $extfile = $request->berkas->getClientOriginalName();
        // $namaFile = 'web-' . time() . "." . $extfile;
        // $namaFile = 'web-' . time() . "." . $extension;
        // $path = $request->berkas->store('uploads');
        // $path = $request->berkas->storeAs('public', $namaFile);
        // echo "proses upload berhasil, data disimpan pada: $path";

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        // echo "Variabel path berisi:$path <br>";

        // $pathBaru = asset('storage/' . $namaFile);        
        // echo "Proses upload berhasil, data disimpan pada: $pathBaru";
        $pathBaru = asset('gambar/' . $namaFile);
        echo "Gambar berhasil diupload ke:<a href='$pathBaru'>$namaFile<a/>";
        echo "<br>";
        echo "<img src='$pathBaru' alt='$namaFile' style='max: width 500px; height: auto;'>";
        // echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";

        // echo "proses upload berhasil, file berada di: $path";
        // echo $request->berkas->getClientOriginalName() . "lolos validasi";
    }
}