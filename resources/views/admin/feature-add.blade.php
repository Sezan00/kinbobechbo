@extends('layout.tail')

<div class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md p-8">

    <!-- Title -->
    <div class="mb-6">
      <h1 class="text-4xl text-center font-medium">Feature Section by Admin</h1>
    </div>

    @if ($errors->any())
        <p class="">Here have error</p>
    @endif

    <!-- Feature Input -->
    <form action="{{ route('feature_post') }}" method="POST">
  
          @csrf
    
      <div class="mb-4">
          
        <select class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-400 mb-4" name="category_id" id="">
            @foreach ($categories as $category)
          <option class="" value="{{ $category->id }}">{{$category->name}}</option>
          @endforeach
        </select>
             
        <input type="text" id="feature" name="name"
               class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
               placeholder="Enter new feature name">
                @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
   
      <div class="flex justify-end">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg shadow" >
          ➕ Add Feature
        </button>
      </div>
    </form> 

  </div>
</div>
