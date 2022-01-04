<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'userId',
        'date',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function details()
    {
        return $this->hasMany(Transaction_Detail::class, 'transactionId', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
