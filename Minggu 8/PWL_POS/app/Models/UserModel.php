<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable 

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';        // mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; // mendefinisikan primary key dari tabel yang digunakan
    
    protected $fillable = ['level_id', 'username', 'nama', 'password', 'user_profile_picture'];

    protected $hidden = ['password']; // jangan ditampilkan saat select
    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash


    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
     * Mendapatkan nama role
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }


    /**
     * Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }
}
// class UserModel extends Model
// {
//     use HasFactory;

//     protected $table = 'm_user';        // mendefinisikan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'user_id'; // mendefinisikan primary key dari tabel yang digunakan
    
//     protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }
// }

// class UserModel extends Model
// {
//     public function level(): HasOne
//     {
//         return $this->hasOne(LevelModel::class);
//     }

//     public function user(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class);
//     }
    
//     public function barang(): HasMany
//     {
//         return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
//     }
//     public function user(): BelongsTo
//     {
//         return $this->belongsTo(KategoriModel::class, 'kategori_id','kategori_id');
//     }
// }