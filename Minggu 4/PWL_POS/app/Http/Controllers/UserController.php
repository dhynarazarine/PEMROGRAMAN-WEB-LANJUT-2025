<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {      
        //Praktikum 1 - $fillable: 
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager dua',
        //     'nama' => 'Manager 2',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create ($data);


        //Praktikum 2.1 – Retrieving Single Models 
        // Ambil model dengan kunci utama
        // $user = UserModel::find(1); // Mengambil data pengguna dengan ID 1 dari database. mencari data berdasarkan primary key

        // Ambil model pertama yang cocok dengan kueri
        // $user = UserModel::where('level_id', 1)->first(); // Mencari data berdasarkan kolom terentu

        // Alternatid untuk mengambil model pertama yang cocok dengan batasan kueri
        // $user = UserModel::firstWhere('level_id', 1); // Mencari satu baris pertama dalam DB dimana level id 1 tetapi lebih ringkas

        // Kode digunakan untuk mencari data pengguna berdasarkan id = 1. Jika error maka memunculkan 484
        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(484);
        // });

        // kode error karena tidak menemukan id = 20 didalam tabel DB
        //  $user = UserModel::findOr(20, ['username', 'nama'], function () {
        //     abort(484);
        //  });
        
        
        // Praktikum 2.2 – Not Found Exceptions 
        // $user = UserModel::findOrFail(1); 
        // Mencari data berdasarkan id, jika data ditemukan maka dikembalikan ke objek $user 
        // Jika error maka menampilkan error 404
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // Mencari data berdasarkan username, namun karena dalam tabel tidak ada manager9 maka menampilkan error 404
        // return view('user', ['data' => $user]);

    }
}
