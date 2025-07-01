@extends('layout.header')
@section('content')
<div class="bg-gray-100 min-h-screen py-10">
 <div class="max-w-5xl mx-auto bg-white rounded-xl p-8 shadow-md ">
    <div class="mb-4">
  @if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
      {{ session('success') }}
    </div>
    @endif
<form action="{{ route('category_upload') }}" method="POST">
    @csrf

    <label class="text-gray-700 font-medium text-2xl block mb-2">Create Category</label>

    <input class="mb-1 w-full border border-gray-300 p-2 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-red-400" 
           type="text" name="name" placeholder="Enter your category name">
    @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <input class="mt-4 w-full border border-gray-300 p-2 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-red-400" 
           type="text" name="slug" placeholder="Enter unique slug (optional)">
    @error('slug')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <div class="mt-6">
        <button type="submit" class="bg-[#169C89] p-2 rounded-2xl text-white font-bold px-6 hover:bg-[#127f6f] transition">
            Add Category
        </button>
    </div>
</form>
    <div class="mb-10">
        <p class="text-red-300 text-sm text-end">This page is only accessible to the website owner</p>
    </div>

    <div class="mb-4">
          <h1 class="text-center text-4xl font-bold">List of Category</h1>
    </div>
    @if (session('delete'))
      <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
      Category Hasbeen deleted
    </div>
    @endif
 <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-md overflow-hidden">
    <thead class="bg-gray-100 text-left text-gray-600">
        <tr>
            <th class="px-6 py-3 text-sm font-semibold">Category Name</th>
            <th class="px-6 py-3 text-sm font-semibold">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($categories as $category)
        <tr>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $category->name }}</td>
            <td class="px-6 py-4 text-sm">
                <form action="{{ route('category_delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 ml-2">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
 </div>
</div>

@endsection