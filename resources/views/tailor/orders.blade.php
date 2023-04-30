@extends('tailor.base')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Order
            </h2>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Order#</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($orders as $order)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">{{ $order->id }}</td>
                                    <td class="px-4 py-3 text-sm">PKR {{ $order->price }}</td>
                                    <td class="px-4 py-3 text-sm">{{ date('d/m/Y', strtotime($order->date)) }}</td>
                                    {{-- <td class="px-4 py-3 text-xs">
                                        @switch($order->status)
                                            @case('PENDING')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-60">PENDING</span>
                                            @break

                                            @case('ON PROCESS')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">ON
                                                    PROCESS</span>
                                            @break

                                            @case('DELIVERED')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">DELIVERED</span>
                                            @break

                                            @case('CANCELLED')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">CANCELLED</span>
                                            @break
                                        @endswitch
                                    </td> --}}
                                    <td class="text-end">
                                        <a href="{{route('tailor.accept',['id'=>$order->id])}}" class="px-3 py-1 me-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md hover:bg-purple-700">
                                            Accept
                                        </a>
                                        <a href="{{route('tailor.reject',['id'=>$order->id])}}" class="px-3 py-1 me-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-md">
                                            Decline
                                        </a>
                                        <a href="{{route('tailor.detail',['id'=>$order->id])}}" class="px-3 py-1 me-3 text-sm font-medium leading-5 text-yellow-500 transition-colors duration-150 bg-yellow-200 border border-transparent rounded-md">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination my-6">
                {{-- {{ $orders->links('vendor.pagination.tailwind') }} --}}
            </div>
        </div>
    </main>
@endsection
