@extends('layout.header')
@section('content')

<div class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Product List</h2>

    <!-- Product Item Start -->
    @foreach ($products as $product )
        
    <a href="{{ route('product.show', $product->id) }}" class="block">
    <div class="flex items-center gap-4 border-b py-4 hover:bg-gray-50 transition">
      <img src="https://via.placeholder.com/120" alt="Product Image" class="w-32 h-24 object-cover rounded">
      <div class="flex-1">
        <h3 class="text-lg font-semibold text-gray-800">{{$product->title}}</h3>
        <p class="text-gray-600 mt-1">Dhaka, {{$product->category->name}}</p>
        <p class="text-sm text-gray-500 mt-1">Dhaka, Bangladesh</p>
      </div>
      <div class="text-right">
        <p class="text-xl font-bold text-green-600">{{$product->price}}</p>
        <p class="text-sm text-gray-500">{{ $product->negotiable ? 'Negotiable' : 'Non-Negotiable' }}</p>
      </div>
    </div>
    </a>
  @endforeach

    <!-- More items... -->
  </div>
</div>


@endsection