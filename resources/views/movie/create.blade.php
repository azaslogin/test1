@extends('layouts.default')
@section('content')
    <div id="section2" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white w-full">
        <form method="POST" action="{{ route('movie.store') }}">
            @csrf
            <div class="form-group mb-6">
                <label class="default-label" for="input-title">
                    Title
                </label>
                <input type="text" class="default-input" id="input-title" placeholder="Title" name="title"
                       value="{{old('title')}}">

                @error('title')
                @include('forms.validation-message')
                @enderror
            </div>

            <div class="form-group mb-6">
                <label class="default-label" for="my-textarea">
                    Description
                </label>
                <textarea class="default-input" rows="3" placeholder="Description"
                          name="description">{{old('description')}}</textarea>
                @error('description')
                @include('forms.validation-message')
                @enderror
            </div>

            <div class="form-group mb-6">
                <label class="default-label" for="my-textarea">
                    Year
                </label>
                <input type="number" class="default-input" placeholder="Year" name="year" value="{{old('year')}}">

                @error('year')
                @include('forms.validation-message')
                @enderror
            </div>

            <div class="form-group mb-6">
                <label class="default-label">
                    Genre
                </label>
                <select name="genre-id" class="default-input">
                    <option value="">Select Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre-id') == $genre->id ? 'selected' : '' }}>{{ $genre->title }}</option>
                    @endforeach
                </select>

                @error('genre-id')
                @include('forms.validation-message')
                @enderror
            </div>

            <div class="form-group mb-6">
                <label class="default-label" for="my-textarea">
                    Duration
                </label>
                <input type="text" class="default-input" placeholder="Duration" name="duration"
                       value="{{old('duration')}}">

                @error('duration')
                @include('forms.validation-message')
                @enderror
            </div>

            <button
                class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="submit">
                Save
            </button>
        </form>
    </div>
@endsection
