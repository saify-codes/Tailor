@extends('admin.base')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Order# {{ $order->id }}
            </h2>

            @if (is_null($tailor))
                <div class="mb-5">
                    <div class="customer-info">
                        <h2 class="font-semibold text-gray-700">Name: <span
                                class="text-gray-400">{{ ucfirst($order->fname . ' ' . $order->lname) }}</span></h2>
                        <h2 class="font-semibold text-gray-700">Phone: <span class="text-gray-400">{{ $order->phone }}</span>
                        </h2>
                        <h2 class="font-semibold text-gray-700">Address: <span
                                class="text-gray-400">{{ $order->address }}</span>
                        </h2>
                        <h2 class="font-semibold text-gray-700">Price: <span
                                class="text-gray-400">{{ $order->price }}</span>
                        </h2>

                    </div>
                </div>
            @else
                <div class="mb-5 grid grid-cols-2">
                    <div class="customer-info">
                        <h2 class="font-semibold text-gray-700">Name: <span
                                class="text-gray-400">{{ ucfirst($order->fname . ' ' . $order->lname) }}</span></h2>
                        <h2 class="font-semibold text-gray-700">Phone: <span
                                class="text-gray-400">{{ $order->phone }}</span>
                        </h2>
                        <h2 class="font-semibold text-gray-700">Address: <span
                                class="text-gray-400">{{ $order->address }}</span>
                        </h2>
                        <h2 class="font-semibold text-gray-700">Price: <span
                                class="text-gray-400">{{ $order->price }}</span>
                        </h2>

                    </div>
                    <div class="tailor-info">
                        <h2 class="font-semibold text-gray-700">Tailor: <span
                                class="text-gray-400">{{ $tailor->name }}</span></h2>
                        <h2 class="font-semibold text-gray-700">Phone: <span
                                class="text-gray-400">{{ $tailor->phone }}</span></h2>
                        <h2 class="font-semibold text-gray-700">Address: <span
                                class="text-gray-400">{{ $tailor->address }}</span></h2>
                    </div>
                </div>
            @endif
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th>Measurement</th>
                                <th>inch"</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach (explode('|', $order->details) as $item)
                                <tr>
                                    @foreach (explode(':', $item) as $val)
                                        <td class="px-4 py-3 text-sm">{{ ucwords(str_replace('_', ' ', $val)) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="pagination my-6">
                {{ $data['orders']->links('vendor.pagination.tailwind') }}
            </div> --}}
        </div>

    </main>
@endsection
