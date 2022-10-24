<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'pucharse',
        'total',
        'date',
    ];
}
