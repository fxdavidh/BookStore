<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookId', 'genreId'
    ];

    public function books()
    {
        return $this->belongsTo(Book::class, 'bookId', 'id');
    }

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genreId', 'id');
    }
}
