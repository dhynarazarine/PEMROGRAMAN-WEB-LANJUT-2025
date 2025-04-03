<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualan = [
            ['user_id' => 1, 'pembeli' => 'Dhynar', 'penjualan_kode' => 'PJ001', 'tanggal_penjualan' => now()],
            ['user_id' => 2, 'pembeli' => 'Veve', 'penjualan_kode' => 'PJ002', 'tanggal_penjualan' => now()],
            ['user_id' => 3, 'pembeli' => 'Danica', 'penjualan_kode' => 'PJ003', 'tanggal_penjualan' => now()],
            ['user_id' => 1, 'pembeli' => 'Satria', 'penjualan_kode' => 'PJ004', 'tanggal_penjualan' => now()],
            ['user_id' => 2, 'pembeli' => 'Daffa', 'penjualan_kode' => 'PJ005', 'tanggal_penjualan' => now()],
            ['user_id' => 3, 'pembeli' => 'Aqueena', 'penjualan_kode' => 'PJ006', 'tanggal_penjualan' => now()],
            ['user_id' => 1, 'pembeli' => 'Babby', 'penjualan_kode' => 'PJ007', 'tanggal_penjualan' => now()],
            ['user_id' => 2, 'pembeli' => 'Rizky', 'penjualan_kode' => 'PJ008', 'tanggal_penjualan' => now()],
            ['user_id' => 3, 'pembeli' => 'Wahyu', 'penjualan_kode' => 'PJ009', 'tanggal_penjualan' => now()],
            ['user_id' => 1, 'pembeli' => 'Renald', 'penjualan_kode' => 'PJ010', 'tanggal_penjualan' => now()]
        ];
        DB::table('t_penjualan')->insert($penjualan);
    }
}
