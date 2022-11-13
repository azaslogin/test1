@extends('layouts.default')
@section('content')
    <h1 class="text-lg w-full">Edit Movie</h1>

    <div id="section2" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white w-full">
        <form method="POST" action="{{ route('movie.update', $movie)}}">
            {{ method_field('PUT') }}
            @csrf

            <x-forms.input title="Title" name="title" input-type="text" :value="$movie->title"/>

            <div class="form-group mb-6">
                <label class="default-label" for="my-textarea">
                    Description
                </label>
                <textarea class="default-input" rows="3" placeholder="Description"
                          name="description">{{$movie->description}}</textarea>
                @error('description')
                @include('forms.validation-message')
                @enderror
            </div>

            <x-forms.select-multiple title="Country" name="country-id" :items="$countries" :values="$movie->countries->pluck('id')->toArray()"/>

            <x-forms.select-multiple title="Genre" name="genre-id" :items="$genres" :values="$movie->genres->pluck('id')->toArray()"/>

            <x-forms.input title="Year" name="year" input-type="number" :value="$movie->year"/>

            <x-forms.input title="Duration" name="duration" input-type="text" :value="$movie->duration"/>

            <button
                class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit">
                Save
            </button>
        </form>
    </div>

@stop
