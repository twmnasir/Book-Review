<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title> 
  <link rel="shortcut icon" href="{{ asset('assets/img/image.png') }}" type="image/x-icon">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets/dist/style.css') }}">
</head>
<body class="bg-light">

  
 <div class="mt-24 ">
  @yield('content')
 </div>

 <div id="loadingSpinner" class="flex items-center justify-center h-screen">
  <div class="w-16 h-16 border-4 border-t-4 border-gray-200 border-solid rounded-full animate-spin border-t-black">
    <span class="sr-only">Loading...</span>
  </div>
</div>

    
<button id="scrollTopBtn" 
        class="fixed p-3 text-white bg-gray-800 rounded-full shadow-lg bottom-4 right-4 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        <i class="fa-solid fa-arrow-up"></i>
</button>

    
  <script src="{{ asset('assets/dist/script.js') }}"></script>
  
</body>
</html>