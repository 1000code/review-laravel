<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function Index()
    {
        $data = Books::all();
        return view('admin.book.index', compact('data'));
    }

    public function FormAdd()
    {

        return view('admin.book.add');
    }
    public function Store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'serial' => 'required',
            'type' => 'required',
        ], [
            'name.required' => 'ກະລຸນາປ້ອນຊື່ໜັງສື',
            'serial.required' => 'ກະລຸນາປ້ອນລະຫັດໜັງສື',
            'type.required' => 'ກະລຸນາປ້ອນລະຫັດໝວດໝູ່',
        ]);

        Books::insert([
            'name' => $req->name,
            'serial' => $req->serial,
            'type' => $req->type,
        ]);

        $success = 'ບັນທຶກຂໍ້ມູນສຳເລັດ';

        return redirect()->route('admin.book')->with('success', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
    }
    public function FormUpdate(Request $req)
    {
        $book = Books::find($req->code);

        return view('admin.book.update', compact('book'));
    }


    public function Update(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'serial' => 'required',
            'type' => 'required',
        ], [
            'name.required' => 'ກະລຸນາປ້ອນຊື່ໜັງສື',
            'serial.required' => 'ກະລຸນາປ້ອນລະຫັດໜັງສື',
            'type.required' => 'ກະລຸນາປ້ອນລະຫັດໝວດໝູ່',
        ]);

        Books::find($req->code)->update([
            'name' => $req->name,
            'serial' => $req->serial,
            'type' => $req->type,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('admin.book')->with('success', 'ອັບເດດ ຂໍ້ມູນສຳເລັດ');
    }

    public function Remove(Request $req)
    {
        Books::find($req->code)->delete();
        return redirect()->route('admin.book')->with('success', 'ລົບ ຂໍ້ມູນສຳເລັດ');
    }
}
