@extends('layout.header')
@section('content')
   <div class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">

    <!-- Title -->
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">
      📱{{ $category->name }}
    </h2>
  @if(session('delete'))
    <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
      {{ session('delete') }}
    </div>
    @endif
    @if ($category->brands->count())
      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl overflow-hidden">
          <thead class="bg-gray-100 text-gray-700 text-left">
            <tr>
              <th class="px-6 py-3 text-sm font-semibold">Name</th>
              <th class="px-6 py-3 text-sm font-semibold">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach ($category->brands as $brand)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">{{ $brand->name }}</td>
                <td class="px-6 py-4">
                  <form action="{{ route('brand.delete', $brand->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition duration-200">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="text-gray-600 text-center">No brands found in this category.</p>
    @endif

  </div>
</div>


@endsection