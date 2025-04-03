<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(){
        // DB::insert('insert into m_level (level_kode, level_nama, created_at, updated_at) values (?, ?, ?, ?)',
        // ['CUS', 'Pelanggan', now(), now()]);

        // return "Insert data baru berhasil";
        
        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate'. $row. ' Baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus'. $row. ' Baris';

        $data = DB::select('select * from m_level');
        return view ('level', ['data' => $data]);
    }
}
