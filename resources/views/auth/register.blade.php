@extends('app')
@section('container')
<div class="logo mt-12 mb-5">
  <img src="{{ asset("/img/rupiah_logo.png") }}" class="mx-auto w-24 h-auto" alt="rupiah logo">
</div>
<div class="flex justify-center mb-10">
    <div class="w-2/4 p-2 bg-white shadow-md shadow-violet-400 rounded-md border-t-4 border-violet-400">
        <div class="header_register mt-2 mb-4 flex justify-between items-center">
            <p class="text-start text-2xl font-semibold text-gray-400">DAFTAR AKUN</p>
            <a href="login" class="text-sm font-medium text-blue-400 hover:text-blue-300">Login?</a>
        </div>
        @if ($mess = Session::get('success'))
        <div class="alert_success w-full mt-2 p-2 text-center bg-green-400 text-white rounded-md">
          <p>{{ $mess }}</p>
        </div>
        @elseif($mess = Session::get('error'))
        <div class="alert_server_error w-full mt-2 p-2 text-center bg-red-400 text-white rounded-md">
          <p>{{ $mess }}</p>
        </div>
        @endif
        <form action="{{ route("regSend") }}" method="POSt" class="space-y-6">
          @csrf
            <div class="form-group">
                <div class="relative">
                    <input type="text" id="floating_outlined" name="name"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama</label>
                </div>
            </div>
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
                    <input type="email" id="floating_outlined" name="email"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
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
            <div class="form-group">
                <div class="relative">
                    <input type="text" id="floating_outlined" name="age"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Umur</label>
                </div>
            </div>
            <div class="form-group">
                <div class="relative">
                    <input type="text" id="floating_outlined" name="address"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Alamat</label>
                </div>
            </div>
            <div class="btn_submit text-center">
              <button type="submit" class="text-white bg-violet-400 hover:bg-violet-600 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm w-full py-2.5 mr-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700 focus:outline-none dark:focus:ring-violet-800">DAFTAR</button>
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
