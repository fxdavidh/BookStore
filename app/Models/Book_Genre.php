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

    public function book()
    {
        return $this->belongsTo('App\Book', 'id');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre', 'id');
    }
}
