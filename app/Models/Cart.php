<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 'bookId', 'quantity', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book', 'id');
    }
}
