<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('home') }}">Home</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('about') }}">About</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('automotive') }}">Automotive</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('culture') }}">Culture</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('movie.index') }}">Movies</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('genre.index') }}">Genres</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('country.index') }}">Countries</a></li>
                <li> | </li>
                @if (Route::has('login') && Auth::check())
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                            </form></li>
                @elseif (Route::has('login') && !Auth::check())
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('login') }}">Login</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('register') }}">Register</a></li>
                @endif
            </ul>
        </nav>

        <div class="flex items-center text-lg no-underline text-white pr-6">
            <a class="" href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>
