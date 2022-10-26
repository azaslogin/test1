@extends('layouts.default')
@section('content')
<div class="flex items-center justify-center">
    <a href="{{route('movie.create')}}" class="text-blue-500 underline hover:text-blue-700">Add movie!</a>
    <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">Movies</h1>
</div>
{{-- {{$movies}} --}}
<div class="flex flex-col">
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
