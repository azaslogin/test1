@extends('layouts.default')
@section('content')
<div class="flex items-center justify-center">
  <div class="m-2 p-3 flex flex-wrap bg-blue-700 text-center w-full rounded">
    <a href="{{route('movie.create')}}" class="text-white underline hover:text-black">Add movie!</a>
  </div>
</div>
  <div class="w-full">
    <h1 class="font-small leading-tight text-5xl mt-0 mb-2 text-blue-600">Movies</h1>
  </div>


{{-- {{$movies}} --}}

<div class="flex flex-wrap">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  #
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  TITLE
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  DESCRIPTION
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  RELEASE YEAR
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  DURATION
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($movies as $movie)
              <tr class="bg-white border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{$movie->id}}
                    @foreach ($movie->genres as $genre)
                        <span>{{ $genre->title }} </span>
                    @endforeach
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$movie->title}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$movie->description}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{$movie->year}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
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
        </div>
        {{ $movies->onEachSide(2)->links() }}
      </div>

    </div>
  </div>
@endsection
