<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity', 'transactionId', 'bookId',
    ];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class,'id', 'transactionId');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'bookId', 'id');
    }
}
