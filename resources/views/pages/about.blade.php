@extends('layouts.default')
@section('content')

    <!-- Posts Section -->
    <section class="w-full md:w-3/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img
                    src="https://images.unsplash.com/photo-1572204443372-c9145df8764d?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=500&ixid=MnwxfDB8MXxyYW5kb218MHwxMzQ2OTUxfHx8fHx8fDE2NjM4NDAxNzk&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1000">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">About</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Lorem Ipsum Dolor Sit Amet Dolor Sit
                    Amet</a>
                <p href="#" class="text-sm pb-3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta
                    dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet
                    posuere magna..</a>
                <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </article>

        <article class="flex flex-col shadow my-4">
            <h2 class="text-lg">Form</h2>
            <form method="POST" class="bg-gradient-to-r from-indigo-500">
                @csrf
                <input class="w-full hover:file:bg-violet-100 border-2 mb-2" name="name" type="text"/>
                <input class="w-full hover:file:bg-violet-100 border-2 mb-2" name="lastname" type="text"/>
                <input type="submit" value="OK"/>
            </form>
        </article>

    </section>
@stop
