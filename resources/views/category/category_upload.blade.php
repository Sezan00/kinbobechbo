@extends('layout.header')
@section('content')


<div class="bg-gray-100 min-h-screen py-10">
  @php
    $emojiMap = [
        'Mobile-phones' => '📱',
        'Car-sell' => '🚗',
        'Laptop-sell' => '💻',
        'electronics' => '🖥️',
        
    ];
    @endphp
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Select Product Category</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($categories as $category)
        <a href="{{ route('product.upload', ['category' => $category->slug]) }}" 
           class="border rounded-lg p-6 text-center hover:bg-gray-50 transition">
          <div class="text-4xl mb-3">{{ $emojiMap[$category->slug] ?? '📦' }}</div>
          <h3 class="font-medium">{{ $category->name }}</h3>
        </a>
      @endforeach
    </div>

  </div>
</div>
@endsection
