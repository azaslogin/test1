@extends('layouts.default')
@section('content')
<div class="w-full">
  <h1 class="font-small leading-tight text-3xl mt-0 mb-2 text-blue-600">Index page for Movie</h1>
</div>
<div class="flex items-center justify-center">
  <div class="m-2 p-3 flex flex-wrap bg-blue-600 text-center w-full rounded">
    <a href="{{route('movie.create')}}" class="text-white underline hover:text-black">Add movie!</a>
  </div>
</div>


{{-- {{$movies}} --}}

<div class="w-full">
    <table class="w-full">
      <thead class="border-b">
        <tr class="w-1/2 bg-indigo-300">
          <th scope="col" class="p-2 text-center pr-4">
            TITLE
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            DESCRIPTION
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            ID
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            GENRE
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            COUNTRY
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            RELEASE YEAR
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            DURATION
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            
          </th>
          <th scope="col" class="p-2 text-center pr-4">
            
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($movies as $movie)
        <tr class="">
          <td class="p-2">
              {{$movie->title}}
          </td>
          <td class="p-2">
              {{$movie->description}}
          </td>
          <td class="p-2">
              {{$movie->id}}
          </td>
          <td class="p-2">
              @foreach ($movie->genres as $genre)
                  <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                      <a href="{{ route('moviebygenre.index', $genre->id) }}">{{ $genre->title }} </a>
                  </div>
              @endforeach
          </td>
          <td class="p-2">
            @foreach ($movie->countries as $country)
                <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full">
                  <span>{{ $country->title }} </span>
                </div>
                
            @endforeach
        </td>
          <td class="p-2">
              {{$movie->year}}
          </td>
          <td class="p-2">
              {{$movie->duration}}
          </td>
          <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
              <a href="{{ route('movie.edit', $movie->id) }}" class="text-indigo-600 hover:text-indigo-900">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
              </a>
          </td>
          <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
              <form action="{{ route('movie.destroy',$movie->id) }}" method="POST" onsubmit="return confirm('{{ trans('Are you sure?') }}');">
                  <input type="hidden" name="_method" value="DELETE">
                  @csrf
                      <button type="submit" class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                      </button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $movies->onEachSide(2)->links() }}
  </div>
@endsection
