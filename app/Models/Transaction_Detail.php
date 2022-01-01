<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity', 'transaction_id', 'userId', 'bookId', 
    ];
    
    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
    
    public function books()
    {
        return $this->belongsTo(Book::class, 'bookId', 'id');
    }
}
