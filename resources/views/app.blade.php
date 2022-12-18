<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Money Management App</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
</head>
<body class="bg-gray-100">
  <nav class="w-full fixed top-0 z-50 bg-violet-500 p-4 px-16 flex justify-between items-center  {{ Request::is('register') || Request::is('login') ? "hidden" : "" }}">
    @include('layout.navbar')
  </nav>
  <main class="w-full h-full">
    @yield('container')
  </main>
  <footer>
    @include('layout.footer')
  </footer>

  <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</body>
</html>