@extends('layouts.default')
@section('content')
    <h1 class="text-lg w-full">Edit Movie</h1>

    <div id="section2" class="p-8 mt-6 lg:mt-0 rounded shadow bg-white w-full">
        <form method="POST" action="{{ route('movie.update', $movie)}}">
            {{ method_field('PUT') }}
            @csrf
          
            <div class="form-group mb-6">
            
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                    Title
                </label>
                <input type="text" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7"
              placeholder="Title" name="title" value="{{$movie->title}}">
          </div>
          @error('title')
            <span class="text-red-600 text-sm">
                        {{ $message }}
            </span>
            @enderror
            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                Description
            </label>
            <div class="form-group mb-6">
            <textarea
            class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            "
            id="exampleFormControlTextarea13"
            rows="3"
            placeholder="Description" name="description">{{$movie->description}}
          </textarea>
          @error('description')
                        <span class="text-red-600 text-sm">
                                    {{ $message }}
                                </span>
                        @enderror
          </div>
          <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
            Year
        </label>
          <div class="form-group mb-6">
            <input type="number" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
              placeholder="Year" name="year" value="{{$movie->year}}"> 
          </div>
          @error('year')
                        <span class="text-red-600 text-sm">
                                    {{ $message }}
                                </span>
                        @enderror
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                            Duration
                        </label>
          <div class="form-group mb-6">
            <input type="text" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
              placeholder="Duration" name="duration" value="{{$movie->duration}}">
          </div>
          @error('duration')
            <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
            @enderror
          <button
                            class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Save
                        </button>
        </form>
    </div>

@stop
