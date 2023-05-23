<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="bg-gray-100">
<div id="main" class="container mx-auto flex flex-wrap">
    @include('partials.nav')
    @include('partials.flash-message')
    @yield('content')

    <footer class="w-full border-t bg-white pb-12">
        @include('includes.footer')
    </footer>
</div>
</body>
</html>
