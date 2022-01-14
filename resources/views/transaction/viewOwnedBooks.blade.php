@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="width: 20%">Book Name</th>
            <th scope="col" style="width: 20%">Book Author</th>
            <th scope="col" style="width: 20%">Available Until</th>
            <th scope="col" style="width: 20%">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key =>$item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->dueDate }}</td>
                <td>
                    <div style="display: flex;">
                        <form style="margin-right: 1%" action="{{route('viewBook', ['id' => $item->bookId])}}" method="GET">
                            <button class="btn btn-secondary">View book detail</button>
                        </form>
                        <form style="margin-right: 1%" action="{{route('viewFile', ['id' => $item->bookId])}}" method="GET">
                            <button class="btn btn-primary">Read This Book</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
</div>
@endsection
