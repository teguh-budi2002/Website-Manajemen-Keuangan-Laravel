@extends('app')
@section('container')
<style>
    .box_container::before {
        content: "";
        position: absolute;
        top: -160px;
        width: 100%;
        min-height: 200px;
        background-color: rgb(139 92 246);
        z-index: -2;
    }

</style>
<div class="w-full h-full container_balance">
    <div class="box_container relative w-full flex justify-evenly mt-28">
        <div class="w-3/12 bg-white roundeed p-2 space-y-4 shadow-md">
            <div class="header border-b-2 border-gray-300 pb-2 flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="uppercase font-semibold text-xl text-gray-400">saldo</p>
            </div>
            <div class="body flex justify-end items-center space-x-2">
                @if ($balances->count())
                @foreach ($balances as $balance)
                <p class="uppercase font-semibold text-xl text-gray-600">
                    {{ number_format($balance->balance, 2)}}
                    <span>IDR</span></p>
                <div class="update_balance_modal">
                    <button type="button" data-modal-toggle="balance-modal" class="p-2 bg-green-500 text-white"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>
                    </button>
                </div>
                @endforeach
                @else
                <p class="uppercase font-semibold text-xl text-gray-600">
                    0
                    <span>IDR</span></p>
                @endif
            </div>
        </div>
        <div class="w-3/12 bg-white roundeed p-2">
            <p>ww</p>
        </div>
        <div class="w-3/12 bg-white roundeed p-2">
            <p>ww</p>
        </div>
    </div>
    @if ($mess = Session::get('success'))
    <div class="w-full">
        <div class="w-2/3 mt-4 mx-auto rounded text-center p-2 bg-green-500 text-white">
            <p class="uppercase">{{ $mess }}</p>
        </div>
    </div>
    @elseif ($mess = Session::get('success-cashout'))
    <div class="w-full">
        <div class="w-2/3 mt-4 mx-auto rounded text-center p-2 bg-green-500 text-white">
            <p class="uppercase">{{ $mess }}</p>
        </div>
    </div>
    @endif
</div>
</div>
<div id="balance-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="balance-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            @if ($balances->count())
            @foreach ($balances as $balance)
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-500 dark:text-white">TAMBAH SALDO</h3>
                <form class="space-y-6" action="{{ URL("cash/" . $balance->id )}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div>
                        <label for="balance"
                            class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">SALDO</label>
                        <input type="balance" name="balance" id="balance"
                            class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Masukkan Nominal Yang Ingin Kamu Tambahkan....">
                        <input type="hidden" name="category_id" id="cat_id">
                    </div>
                    <div class="btn text-center">
                        <button class="py-2.5 px-6 rounded bg-green-600 text-white">TAMBAH SEKARANG</button>
                    </div>
                </form>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"
    integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "get-balance",
            success: function (response) {
                console.log(response.data.category.id)
                $("#balance").val(response.data.balance)
                $("#cat_id").val(response.data.category.id)
            }
        });
    });

</script>
@endsection
