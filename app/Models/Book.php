<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'author', 'synopsis', 'cover', 'price', 
    ];
    
    public function genres()
    {
        return $this->hasMany(Book_Genre::class, 'bookId', 'id');
    }
}
