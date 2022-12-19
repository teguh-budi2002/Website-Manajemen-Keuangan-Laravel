<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
  <main class="w-full h-screen flex justify-center items-center">
    <div class="w-2/3 h-auto bg-white shadow-md p-2 rounded">
      <div class="header_info text-center">
        <img src="{{ asset("/img/rupiah_logo.png") }}" class="mx-auto w-24 h-auto" alt="rupiah logo">
        <p class="font-semibold text-gray-500 uppercase text-xl">Silahkan Login Untuk Menggunakan Website Manajemen Keuangan</p>
      </div>
      <div class="btn text-center space-x-3 mt-3 mb-2">
        <a href="{{ URL('/register') }}" class="py-2.5 px-6 bg-blue-500 text-white rounded-md">REGISTER</a>
        <a href="{{ URL('/login') }}" class="py-2.5 px-6 border-2 border-blue-500 text-blue-500 rounded-md">LOGIN</a>
      </div>
    </div>
  </main>
</body>
</html>