<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberConttroller extends Controller
{
    public function index()
    {
        return view('member.index');
    }
}
