@extends('base')
@section('content')
    <div class="container my-5">
        <h3>Order#{{ $order->id }}</h3>

        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Measurement</th>
                    <th>inch"</th>
                </tr>
            </thead>
            <tbody>
                @foreach (explode('|', $order->details) as $item)
                    <tr>
                        @foreach (explode(':',$item) as $val)
                            <td>{{ucwords(str_replace('_',' ',$val))}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
