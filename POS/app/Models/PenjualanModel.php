<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'barang_id', 'tanggal_penjualan'];

    public function barang(): BelongsTo 
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

}