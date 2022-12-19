@extends('app')
@section('container')
  <div class="flex justify-center mt-28">
    <div class="w-2/3 bg-white shadow p-2">
      <div class="text_info text-center text-gray-400  border-b pb-2 pt-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <p class="text-xl font-semibold uppercase">user information</p>
      </div>
      <div class="body_info">
        <div class="grid grid-cols-3 gap-5 p-2">
          <div class="data space-y-2 uppercase text-gray-500 border-r">
            <p>Nama Lengkap</p>
            <p>Username</p>
            <p>Email</p>
            <p>Umur</p>
            <p>Status</p>
            <p>Alamat</p>
          </div>
          <div class="data_info col-span-2 space-y-2 text-gray-700">
            <p>{{ auth()->user()->name }}</p>
            <p>{{ auth()->user()->username }}</p>
            <p>{{ auth()->user()->email }}</p>
            <p>{{ auth()->user()->age }}</p>
            <div class="bg-blue-400 w-fit text-white p-1.5">{{ auth()->user()->isAdmin ? "ADMIN" : "KARYAWAN" }}</div>
            <address>{{ auth()->user()->address }}</address>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection