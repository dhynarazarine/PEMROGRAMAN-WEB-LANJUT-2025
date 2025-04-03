<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang = [
            ['kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BG001', 'barang_nama' => 'Kipas Angin', 'harga_beli' => '45000', 'harga_jual' => '60000'],
            ['kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BG002', 'barang_nama' => 'Chopper', 'harga_beli' => '100000', 'harga_jual' => '145000'],
            ['kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BG003', 'barang_nama' => 'Gamis', 'harga_beli' => '185000', 'harga_jual' => '200000'],
            ['kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BG004', 'barang_nama' => 'Sepatu Lari', 'harga_beli' => '245000', 'harga_jual' => '370000'],
            ['kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BG005', 'barang_nama' => 'Butter Cookies', 'harga_beli' => '100000', 'harga_jual' => '125000'],
            ['kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BG006', 'barang_nama' => 'Kurma', 'harga_beli' => '85000', 'harga_jual' => '95000'],
            ['kategori_id' => 4, 'supplier_id' => 4, 'barang_kode' => 'BG007', 'barang_nama' => 'Hydro Coco', 'harga_beli' => '17000', 'harga_jual' => '22000'],
            ['kategori_id' => 4, 'supplier_id' => 4, 'barang_kode' => 'BG008', 'barang_nama' => 'Indomilk Fullcream', 'harga_beli' => '15000', 'harga_jual' => '20000'],
            ['kategori_id' => 5, 'supplier_id' => 5, 'barang_kode' => 'BG009', 'barang_nama' => 'Binder Note Joyko', 'harga_beli' => '19500', 'harga_jual' => '28000'],
            ['kategori_id' => 5, 'supplier_id' => 5, 'barang_kode' => 'BG010', 'barang_nama' => 'Pensil Joyko', 'harga_beli' => '9500', 'harga_jual' => '16000']
        ];
        DB::table('m_barang')->insert($barang);
    }
}
