<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailpjl = [];
        for ($i = 1; $i <= 10; $i++) { // 10 transaksi penjualan
            for ($j = 1; $j <= 3; $j++) { // 3 barang per transaksi
                $barang_id = rand(1, 10); // Pilih barang secara acak
                $harga = DB::table('m_barang')->where('barang_id', $barang_id)->value('harga_jual') ?? 10000; // Default harga 10000 jika null

                $detailpjl[] = [
                    'penjualan_id' => $i,
                    'barang_id' => $barang_id,
                    'harga' => $harga,
                    'jumlah' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        // Insert batch untuk efisiensi
        DB::table('t_penjualan_detail')->insert($detailpjl);
    }
}