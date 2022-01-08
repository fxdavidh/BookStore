@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width: 10%">Book Name</th>
            <th scope="col" style="width: 20%">Book Author</th>
            <th scope="col" style="width: 10%">Price</th>
            <th scope="col" style="width: 10%">Quantity</th>
            <th scope="col" style="width: 10%">Sub Total</th>
            <th scope="col" style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $grandtotal = 0;
            @endphp
            @foreach ($items as $key =>$item)
            @php
                $grandtotal = $grandtotal + $item['book'][0]->price * $item->quantity;
            @endphp
            <tr>
                <td>{{ $item['book'][0]->name }}</td>
                <td>{{ $item['book'][0]->author }}</td>
                <td>IDR {{ $item['book'][0]->price }}</td>
                <td>{{ $item->quantity }} book</td>
                <td>IDR {{ $item['book'][0]->price * $item->quantity }}</td>
                <td>
                    <div style="display: flex;">
                        <form style="margin-right: 1%" action="{{route('viewBook', ['id' => $item['book'][0]->id])}}" method="GET">
                            <button class="btn btn-secondary">View book detail</button>
                        </form>
                        <form style="margin-right: 1%" action="{{ route('editCart',['id' =>$item['book'][0]->id]) }}" method="GET">
                            <button class="btn btn-primary">Edit</button>
                        </form>
                        <form action="{{ route('deleteCart',['id' => $item['book'][0]->id]) }}" method="POST">
                            @csrf
                            @method('DELEtE')
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}

    <div class="grand-total" style="margin-bottom: 1%">
        <span style="font-weight: bold">Grand Total: IDR {{ $grandtotal }}</span>
    </div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#checkoutModal">Checkout</button>

    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Checkout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <span style="font-weight: bold">
                  Grand Total: IDR {{ $grandtotal }}
              </span>
              <br>
                Apakah anda yakin akan checkout?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                  <input name="userid" type="hidden" value="{{Auth::user()->id}}">
                  <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
