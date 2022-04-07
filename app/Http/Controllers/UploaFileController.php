<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploaFileController extends Controller
{
    public function Index()
    {
        return view('files.index');
    }
}
