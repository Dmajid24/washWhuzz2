<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'idUser'; // Tambahkan ini
    public $incrementing = false;     // Karena idUser seperti 'CU001', bukan angka auto-increment
    protected $keyType = 'string';    // Karena idUser berbentuk string

    protected $fillable = [
        'idUser',
        'name',
        'email',
        'username',
        'password',
        'city',
        'province',
        'address',
        'role',
        'status',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'idUser', 'idUser');
    }

    // Tambahkan ini untuk membantu autentikasi Laravel
    public function getAuthIdentifierName()
    {
        return 'idUser';
    }
}

