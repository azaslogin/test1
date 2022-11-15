@extends('layouts.default')
@section('content')
    <h1 class="text-lg w-full">Create Genre</h1>

    <div id="section2" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white w-full">

        <form method="POST" action="{{ route('genre.update', $genre) }}">
            {{ method_field('PUT') }}
            @csrf
            
            <x-forms.input title="Title" input-type="text" name="title" :value="$genre->title"/>
            
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                        Text Area
                    </label>
                </div>
                <div class="md:w-2/3">
                    <textarea name="description"
                              class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              rows="4" placeholder="400">{{ $genre->description }}</textarea>
                    @error('description')
                    <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                    @enderror
                    <p class="py-2 text-sm text-gray-600">add notes about populating the field</p>
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop
