<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\TransactionDetailController;

class TransactionController extends Controller
{
    public function checkout(Request $request){

        $transaction = Transaction::create([
            'userId' => $request->post()['userid'],
            'date' => Carbon::now(),
        ]);

        $lastId = $transaction->id;

        $items = Cart::where('userId',$request->post()['userid'])->get();
        foreach($items as $item){
            (new TransactionDetailController)->insertDetail($item->quantity,$lastId,$item->bookId);
        }

        return redirect(route('getBooks'));
    }
}
