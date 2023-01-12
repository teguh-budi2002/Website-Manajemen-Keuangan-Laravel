@extends('app')
@section('container')
<div class="w-full flex justify-center mt-28">
    <div class="w-2/3 bg-white rounded p-2">
        <div class="header_title flex items-center space-x-4 border-b-2 pb-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
            </svg>
            <p class="text-xl text-gray-400 font-semibold">UANG MASUK</p>
        </div>
        <form action="{{ URL("cash") }}" method="POST">
            @csrf
            <div class="form-group mt-5 flex items-center space-x-6">
                <div class="relative w-full">
                    <input type="text" id="balance" name="balance"
                        class="block px-6 py-3 w-full text-sm text-gray-900 bg-transparent rounded border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="balance"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nominal
                        (Rp.)</label>
                </div>
                <div class="w-full">
                    <select name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-violet-500">
                        <option disabled selected">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class=" text-gray-500 uppercase">-
                            {{ $category->name_category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form_group mt-3">
                <label for="keterangan"
                    class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Keterangan</label>
                <textarea id="keterangan" rows="4" name="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Masukkan Keterangan Anda"></textarea>
            </div>
            <div class="btn_submit text-center pt-2">
                <button type="submit"
                    class="text-white bg-violet-400 hover:bg-violet-600 focus:ring-4 focus:ring-violet-300 font-medium rounded text-xl uppercase w-full py-2 mr-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700 focus:outline-none dark:focus:ring-violet-800">
                    Tambah Saldo</button>
            </div>
            @if ($mess = Session::get('exists'))
            <div class="alert_error bg-red-400 text-white rounded p-2 text-center">
                <p>{{ $mess }}</p>
            </div>
            @elseif ($errors->any())
            @foreach ($errors->all() as $err)
            <div class="alert_error w-full mt-2 p-2 text-center bg-red-400 text-white rounded-md">
                <p>{{ $err }}</p>
            </div>
            @endforeach
            @endif
        </form>
    </div>
</div>
@endsection
