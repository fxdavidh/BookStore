<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    public function getDetail(Request $request){

        $items = Transaction_Detail::where('transactionId',$request->post()['id'])->simplePaginate(10);

        foreach($items as $item => $value){
            $bookId = $items[$item]->bookId;
            $book = Book::where('id',$bookId)->get();
            $items[$item]->book = $book;
        }

        return view('transaction.viewTransactionDetail',[
            'items' => $items,
        ]);
    }
}
