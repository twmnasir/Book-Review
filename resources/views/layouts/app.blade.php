<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book Reviews</title>
  @vite('resources/css/app.css')
</head>
<body>
  <header class="flex flex-wrap items-center px-4 py-4 bg-white shadow-md lg:px-16">
    <div class="flex items-center justify-between flex-1">
        <a href="#" class="text-xl">Company</a>
    </div>

    <label for="menu-toggle" class="block pointer-cursor md:hidden">
      <svg class="text-gray-900 fill-current"
        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
        <title>menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
        <nav>
            <ul class="items-center justify-between pt-4 text-base text-gray-700 md:flex md:pt-0">
                <li><a class="block px-0 py-3 md:p-4" href="#">About Us</a></li>
                <li><a class="block px-0 py-3 md:p-4" href="#">Treatments</a></li>
                <li><a class="block px-0 py-3 md:p-4" href="#">Blog</a></li>
                <li><a class="block px-0 py-3 mb-2 md:p-4 md:mb-0" href="#">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container max-w-3xl mx-auto mt-10 mb-10">
  @yield('content')
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    menuToggle.addEventListener('change', function() {
        if (menuToggle.checked) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    });
</script>

</body>
</html>