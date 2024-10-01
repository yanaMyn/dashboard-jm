<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //index
    public function index()
    {
        return view('pages.user-add');
    }

    //show
    public function show()
    {
        $jamaah = DB::table('jamaah')->paginate(10);
        return view('pages.list-user', ['jamaah' => $jamaah, 'type_menu' => 'user']);
    }

    //save
    public function save(Request $request)
    {

        $validation = $request->validate(
            [
                'name' => 'required|max:45|min:3',
                'phone_number' => 'nullable|numeric|digits_between:10,15',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'name.max' => 'Maksimal 45 karakter',
                'name.min' => 'Minimal 3 karakter',
                'phone_number.numeric' => 'Harus angka',
                'phone_number.digits_between' => 'Panjang minimal 10 dan maksimal 15',
            ]
        );

        $name = $request->name;
        $status = $request->status;
        $address = $request->address;
        $phone_number = $request->phone_number;
        $note = $request->note;
        $gender = $request->gender;
        $generus = $request->generus;

        DB::table('jamaah')->insert(
            [
                'name' => $name,
                'status' => $status,
                'address' => $address,
                'phone_number' => $phone_number,
                'note' => $note,
                'gender' => $gender,
                'generus' => $generus,
            ]
        );

        $strSuccess = "Berhasil Ditambahkan";
        return redirect()->route('list.user')->with('success', $name . ' ' . $strSuccess);
    }

    //delete
    public function delete($id)
    {
        DB::table('jamaah')->where('id', $id)->delete();

        return redirect()->back()->with('success_delete', 'Data berhasil dihapus');
    }
}
