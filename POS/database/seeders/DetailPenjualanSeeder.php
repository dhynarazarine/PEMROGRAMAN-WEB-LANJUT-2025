<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailpenjualan = [];
        for ($i = 1; $i <= 10; $i++) { //10 transaksi penjualan
            for ($j = 1; $j <= 3; $j++) { // 3 barang per transaksi
                $barang_id = rand(1, 10);
                $harga = DB::table('m_barang')->where('barang_id', $barang_id)->value('harga_jual') ?? 10000; //default harga 10000 jika null

                $detailpenjualan[] = [
                    'penjualan_id' => $i,
                    'barang_id' => $barang_id,
                    'harga' => $harga,
                    'jumlah' => rand (1,5),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }
        DB::table('t_penjualan_detail')->insert($detailpenjualan);
    }
}
