@extends('base')
@section('content')
    <div class="container my-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Order#</th>
                    <th class="text-center">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td class="text-center">
                            <span class="badge badge-success rounded-pill d-inline">{{$order->status}}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{route('orderdetail',['id'=>$order->id])}}" class="btn btn-danger btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
