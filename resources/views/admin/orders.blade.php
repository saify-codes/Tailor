@extends('admin.base')
@section('scripts')
    <script src="{{ asset('js/admin/utilities.js') }}"></script>
@endsection
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
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($data['orders'] as $order)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">{{ $order->id }}</td>
                                    <td class="px-4 py-3 text-sm">PKR {{ $order->price }}</td>
                                    <td class="px-4 py-3 text-sm">{{ date('d/m/Y', strtotime($order->date)) }}</td>
                                    <td class="px-4 py-3 text-xs">
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

                                            @case('COMPLETED')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">COMPLETED</span>
                                            @break

                                            @case('CANCELLED')
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">CANCELLED</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @if ($order->is_assigned)
                                            <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-300 border border-transparent rounded-md focus:outline-none focus:shadow-outline-purple">Assigned</button>
                                        @else
                                            <button data-order-id="{{ $order->id }}" x-on:click="openModal(event)"
                                                class="px-3 me-4 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Assign</button>
                                        @endif
                                        <a href="{{route('admin.orderdetail',['id'=> $order->id])}}" data-order-id="{{ $order->id }}" class="px-3 py-1 text-sm font-medium leading-5 text-yellow-500 transition-colors duration-150 bg-yellow-200 border border-transparent rounded-md focus:outline-none focus:shadow-outline-purple focus:ring-2 ring-yellow-600 ring-offset-2">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pagination my-6">
                {{ $data['orders']->links('vendor.pagination.tailwind') }}
            </div>
        </div>

        <!-- Modal backdrop. This what you want to place close to the closing body tag -->
        <div x-cloak x-show="isModalOpen"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-cloak x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @keydown.escape="closeModal"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                id="modal">

                <!-- Modal body -->
                <div class="mt-4 mb-6 styled-scrollbar" style="max-height:400px; overflow-y:auto;">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Tailors
                    </p>
                    <!-- Modal description -->
                    {{-- <p class="text-sm text-gray-700 dark:text-gray-400">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                        eligendi repudiandae voluptatem tempore!
                    </p> --}}
                    <ul class="px-5" id="tailors_list">
                        @foreach ($data['tailors'] as $tailor)
                            <li data-tailor-id="{{$tailor->id}}" class="py-3 flex justify-between items-center border-b border-gray-100">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div x-ref="p">
                                        <p class="font-semibold">{{ $tailor->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Location: {{ $tailor->address }}
                                        </p>
                                    </div>
                                </div>
                                <button @click="assignOrder(event.currentTarget)"
                                    class="assign-tailor px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-700 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none focus:shadow-outline-purple">
                                    <svg class="hidden inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span>Assign</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal(event)" id="reset"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-500 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Close
                    </button>
                </footer>
            </div>
        </div>
        <!-- End of modal backdrop -->
    </main>
@endsection
