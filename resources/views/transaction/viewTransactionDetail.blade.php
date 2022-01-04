@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width: 20%">Book Name</th>
            <th scope="col" style="width: 20%">Book Author</th>
            <th scope="col" style="width: 20%">Price</th>
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
</div>
@endsection
