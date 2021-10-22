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
    
    public function transaction()
    {
        return $this->belongsTo('App\Transaction', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
    
    public function book()
    {
        return $this->belongsTo('App\Book', 'id');
    }
}
