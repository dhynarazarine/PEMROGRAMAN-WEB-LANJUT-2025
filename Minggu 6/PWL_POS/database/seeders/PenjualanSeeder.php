<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualan = [
        
                ['penjualan_id'=> 1, 'user_id' => 1, 'pembeli' => 'Dhynar','penjualan_kode' => 'PJ001', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 2, 'user_id' => 2, 'pembeli' => 'Aqueena','penjualan_kode' => 'PJ002', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 3, 'user_id' => 3, 'pembeli' => 'Bagas','penjualan_kode' => 'PJ003', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 4, 'user_id' => 1, 'pembeli' => 'Putera','penjualan_kode' => 'PJ004', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 5, 'user_id' => 2, 'pembeli' => 'Daffa','penjualan_kode' => 'PJ005', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 6, 'user_id' => 3, 'pembeli' => 'Veve','penjualan_kode' => 'PJ006', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 7, 'user_id' => 1, 'pembeli' => 'Bebby','penjualan_kode' => 'PJ007', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 8, 'user_id' => 2, 'pembeli' => 'Eva','penjualan_kode' => 'PJ008', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 9, 'user_id' => 3, 'pembeli' => 'Nimas','penjualan_kode' => 'PJ009', 'penjualan_tanggal' => now()],
                ['penjualan_id'=> 1, 'user_id' => 1, 'pembeli' => 'Rizky','penjualan_kode' => 'PJ010', 'penjualan_tanggal' => now()],
            ];

            DB::table('t_penjualan')-> insert($penjualan);
    }
}
