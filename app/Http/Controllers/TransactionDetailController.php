<?php

namespace App\Http\Controllers;

use App\Models\Transaction_Detail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function insertDetail($quantity,$transactionId,$bookId){
       return Transaction_Detail::create([
            'quantity' => $quantity,
            'transactionId' => $transactionId,
            'bookId' => $bookId
        ]);

    }
}
