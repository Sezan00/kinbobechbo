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
<form action="{{ route('brand.store') }}" method="POST">
    @csrf
    <label class="text-gray-700 font-medium text-2xl block mb-2">Create Brand</label>

    <select name="category_id" class="mb-1 w-full border border-gray-300 p-2 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-red-400" id="">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{$category->name}}</option>
        @endforeach
    </select>
    @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <input class="mt-4 w-full border border-gray-300 p-2 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-red-400" 
           type="text" name="name" placeholder="Enter Brand">
    @error('slug')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <div class="mt-6">
        <button type="submit" class="bg-[#169C89] p-2 rounded-2xl text-white font-bold px-6 hover:bg-[#127f6f] transition">
            Add Brand
        </button>
    </div>
</form>
    <div class="mb-10">
        <p class="text-red-300 text-sm text-end">This page is only accessible to the website owner</p>
    </div>
</table>
        <div class="mb-10">
            <a class=" bg-blue-300 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-xl transition duration-200 " href="{{ route('categories.index') }}">Show Your All brand</a>
        </div>
    </div>
 </div>
</div>

@endsection