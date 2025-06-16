<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'idTransaction', 'idProduct', 'quantity', 'price'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'idTransaction', 'idTransaction');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'idProduct');
    }
}
