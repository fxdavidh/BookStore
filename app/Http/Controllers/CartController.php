<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CartController extends Controller
{
    public function viewCart(Request $request){
        $items = Cart::where('userId',$request->post()['userid'])->simplePaginate(10);
        foreach($items as $item => $value){
            $bookId = $items[$item]->bookId;
            $book = Book::where('id',$bookId)->get();
            $items[$item]->book = $book;
        }
        return view("Cart.viewCart",[
            'items' => $items,
        ]);
    }

    public function addToCart(AddToCartRequest $request){

        $isExist = Cart::where('userId',$request->userId)->where('bookId',$request->bookId)->get();

        if(count($isExist) == 0){
            Cart::create([
                'userId' => $request->userId,
                'bookId' => $request->bookId,
                'quantity' => $request->quantity
            ]);
        }else{
            Cart::where('userId',$request->userId)->where('bookId',$request->bookId)->update(['quantity' => $isExist[0]->quantity + $request->quantity]);
        }



        return redirect(route('getBooks'));
    }
}
