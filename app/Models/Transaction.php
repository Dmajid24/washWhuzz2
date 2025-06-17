<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions'; // optional jika nama tabel tidak jamak
    protected $primaryKey = 'idTransaction';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idTransaction',
        'idUser',
        'date',
        'total',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }

    public function items() {
        return $this->hasMany(TransactionDetail::class, 'idTransaction', 'idTransaction');
    }
}
