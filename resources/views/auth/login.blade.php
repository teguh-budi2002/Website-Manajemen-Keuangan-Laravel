@extends('app')
@section('container')
<div class="logo mt-12 mb-5">
  <img src="{{ asset("/img/rupiah_logo.png") }}" class="mx-auto w-24 h-auto" alt="rupiah logo">
</div>
<div class="flex justify-center mb-10">
    <div class="w-2/6 p-2 bg-white rounded-md border-t-4 border-violet-400">
        <div class="header_register mt-2 mb-4">
            <p class="text-start text-2xl font-semibold text-gray-400">MASUK AKUN</p>
        </div>
        @if($mess = Session::get('not-valid'))
        <div class="alert_server_error w-full mt-2 p-2 text-center bg-red-400 text-white rounded-md">
            <p>{{ $mess }}</p>
        </div>
        @endif
        <form action="{{ route("logSend") }}" method="POSt" class="space-y-6">
            @csrf
            <div class="form-group">
                <div class="relative">
                    <input type="text" id="floating_outlined" name="username"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Username</label>
                </div>
            </div>
            <div class="form-group">
                <div class="relative">
                    <input type="password" id="floating_outlined" name="password"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
                </div>
            </div>
            <div class="remember_me flex items-center space-x-2">
              <input type="checkbox" name="remember_me" class="w-4 h-4 text-violet-600 bg-gray-100 rounded border-gray-300 focus:ring-violet-500 dark:focus:ring-violet-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="remember_me">
              <label for="remember_me" class="ml-2 text-sm font-medium text-gray-400 dark:text-gray-300" >Ingat Saya?</label>
            </div>
            <div class="btn_submit text-center">
                <button type="submit"
                    class="text-white bg-violet-400 shadow-md shadow-violet-400 hover:bg-violet-600 focus:ring-4 focus:ring-violet-300 font-medium rounded text-sm w-full py-2.5 mr-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700 focus:outline-none dark:focus:ring-violet-800">MASUK</button>
            </div>
        </form>
        @if ($errors->any())
        @foreach ($errors->all() as $err)
        <div class="alert_error w-full mt-2 p-2 text-center bg-red-400 text-white rounded-md">
            <p>{{ $err }}</p>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
