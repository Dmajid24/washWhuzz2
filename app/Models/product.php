<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Product extends Model
{
protected $primaryKey = 'idProduct';
public $incrementing = false;
protected $keyType = 'string';

public function transactions() {
    return $this->hasMany(Transaction::class, 'idProduct', 'idProduct');
}

    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image','category'];
}
