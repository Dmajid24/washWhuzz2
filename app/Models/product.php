<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    
    use HasFactory;
    protected $table = 'ms_product';
    protected $fillable = ['name', 'description', 'price', 'image','category'];
}
