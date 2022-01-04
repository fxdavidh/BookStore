@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width: 20%">Transaction ID</th>
            <th scope="col" style="width: 20%">Date</th>
            <th scope="col" style="width: 10%">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->date }}</td>
                <td>
                <form action="{{ route('viewTransactionDetail') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$transaction->id}}" name="id">
                    <button type="submit" class="btn btn-secondary">View Transaction Detail</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }}
</div>
@endsection
