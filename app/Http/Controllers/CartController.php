<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function viewCart(){
        $items = Cart::where('userId',Auth::user()->id)->simplePaginate(10);
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

        $isExist = Cart::where('userId',Auth::user()->id)->where('bookId',$request->bookId)->get();

        if(count($isExist) == 0){
            Cart::create([
                'userId' => $request->userId,
                'bookId' => $request->bookId,
                'quantity' => 1
            ]);
        }else{
            Cart::where('userId',Auth::user()->id)->where('bookId',$request->bookId)->update(['quantity' => $isExist[0]->quantity + $request->quantity]);
        }



        return redirect(route('getBooks'));
    }

    function clearCart(){
        return Cart::where('userId',Auth::user()->id)->delete();
    }
    
    public function updateCart($id, Request $request){
        Cart::where('userId',Auth::user()->id)->where('bookId',$id)->update(['quantity' => $request->quantity]);

        return redirect(route('viewCart'));
    }

    public function deleteCart($id){
        Cart::where('userId',Auth::user()->id)->where('bookId',$id)->delete();

        return redirect(route('viewCart'));
    }
}
