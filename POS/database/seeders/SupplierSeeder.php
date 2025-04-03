<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = [
            ['supplier_kode' => 'SP001', 'supplier_nama' => 'Supplier A', 'kontak' => '08123456789', 'alamat' => 'Surabaya'],
            ['supplier_kode' => 'SP002', 'supplier_nama' => 'Supplier B', 'kontak' => '08129876543', 'alamat' => 'Pasuruan'],
            ['supplier_kode' => 'SP003', 'supplier_nama' => 'Supplier C', 'kontak' => '08235672130', 'alamat' => 'Banyuwangi'],
            ['supplier_kode' => 'SP004', 'supplier_nama' => 'Supplier D', 'kontak' => '08513948720', 'alamat' => 'Bali'],
            ['supplier_kode' => 'SP005', 'supplier_nama' => 'Supplier E', 'kontak' => '08109301428', 'alamat' => 'Bekasi'],
        ];
        DB::table('m_supplier')->insert($supplier);
    }
}
