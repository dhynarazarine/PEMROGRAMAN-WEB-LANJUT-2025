<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {      
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager dua',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create ($data);
        // $user = UserModel::find(1); // Mengambil data pengguna dengan ID 1 dari database. mencari data berdasarkan primary key
        // $user = UserModel::where('level_id', 1)->first(); // Mencari data berdasarkan kolom terentu
        // $user = UserModel::firstWhere('level_id', 1); // Mencari satu baris pertama dalam DB dimana level id 1 tetapi lebih ringkas

        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(484);
        // });
         // Kode digunakan untuk mencari data pengguna berdasarkan id = 1. Jika error maka memunculkan 484

         $user = UserModel::findOr(20, ['username', 'nama'], function () {
            abort(484);
         });
        // kode error karena tidak menemukan id = 20 didalam tabel DB
        return view('user', ['data' => $user]);

    }
}
