<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'idTransaction';
public $incrementing = false;
protected $keyType = 'string';

public function user() {
    return $this->belongsTo(User::class, 'idUser', 'idUser');
}

public function product() {
    return $this->belongsTo(Product::class, 'idProduct', 'idProduct');
}

}
