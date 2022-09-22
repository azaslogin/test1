<!doctype html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>
<div id="main" class="container mx-auto flex flex-wrap">
        @include('partials.nav')

        <header class="w-full container mx-auto">
           @include('includes.header')
        </header>

       @yield('content')


       <footer class="w-full border-t bg-white pb-12">
           @include('includes.footer')
       </footer>
    </div>
</body>
</html>