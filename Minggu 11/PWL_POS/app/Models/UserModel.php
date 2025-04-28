<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable 

class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';        // mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; // mendefinisikan primary key dari tabel yang digunakan
    
    protected $fillable = ['username', 'nama', 'password', 'level_id', 'image'];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
   
    protected function image(): Attribute 
    {
        return Attribute::make(get: fn ($image) => url('/storage/posts/' . $image), );
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