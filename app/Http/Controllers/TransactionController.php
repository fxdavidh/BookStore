<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\TransactionDetailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    public function checkout(Request $request){

        $uuid = Str::uuid()->toString();

        Transaction::create([
            'id' => $uuid,
            'userId' => Auth::user()->id,
            'dueDate' => Carbon::now()->addWeeks(4)->toDateTime(),
        ]);

        $items = Cart::where('userId',Auth::user()->id)->get();
        foreach($items as $item){
            (new TransactionDetailController)->insertDetail($item->quantity,$uuid,$item->bookId);
        }

        (new CartController)->clearCart();

        return redirect(route('getBooks'));
    }

    public function getAllTransaction(){
        $transactions = Transaction::where('userId',Auth::user()->id)->simplePaginate(10);

        return view('transaction.viewTransactionHistory',[
            'transactions' => $transactions
        ]);
    }

    public function getOwenedBooks(){
        $transactions = DB::table('transactions')
                ->join('transaction__details', 'transactions.id', '=', 'transaction__details.transactionId')
                ->join('books', 'transaction__details.bookId', '=', 'books.id')
                ->where('userId',Auth::user()->id)
                ->whereDate('transactions.dueDate', '>', Carbon::now()->toDateTime())
                ->simplePaginate(10);

        return view('transaction.viewOwnedBooks',[
            'items' => $transactions
        ]);
    }

    

}
