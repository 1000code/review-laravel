<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function Index()
    {
        $files = Files::all();
        return view('files.index', compact('files'));
    }

    public function Store(Request $request)
    {
        // $request->validate([
        //     'file' => 'mimes:jpg,png,gif,pdf|required'
        // ]);

        $file = $request->file('mini');


        $new_name = date('dmY') . mt_rand(99, 99999) . '.' . strtolower($file->extension());

        $path = 'files/';

        $move = $file->move(public_path($path), $new_name);

        $full_path =  $path .  $new_name;

        if ($move) {
            $upload =  Files::Insert([
                'path' => $full_path,
                'created_at' => Carbon::now()
            ]);

            if ($upload) {
                return back()->with('success', 'ອັບໂຫຼດສຳເລັດ');
            }
        }
    }


    public function Remove(Request $request)
    {






        $remove =  unlink($request->path);



        if ($remove) {
            $del =  Files::find($request->id)->delete();

            if ($del) {
                return back()->with('success', 'ລົບສຳເລັດ');
            }
        }
    }
}
