@extends('layout.header')
@section('content')

<!-- Alpine.js (for image slider) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="bg-gray-100 min-h-screen py-10 px-4">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">

    <!-- Main Layout -->
    <div class="md:flex md:gap-10 items-start">

      <!-- Left: Product Image -->
      <div class="md:w-2/3 w-full">
        <div class="border rounded-lg overflow-hidden bg-white">
          <img
            src="{{ asset($product->image) }}"
            alt="Product Image"
            class="w-full max-h-[500px] object-contain bg-white p-2"
          >
        </div>
      </div>

      <!-- Right: Product Info -->
      <div class="md:w-1/3 w-full mt-6 md:mt-0">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->title }}</h1>
        <p class="text-green-600 text-xl font-semibold">৳ {{ number_format($product->price) }}</p>
        <p class="text-sm mb-4 font-bold">{{ $product->negotiable ? 'Negotiable' : 'Fixed' }}</p>

        <div class="text-sm text-gray-700 space-y-1 mb-4">
          <p><strong>Condition:</strong> {{ ucfirst($product->condition) }}</p>
          <p><strong>Brand:</strong> {{ $product->brand->name ?? 'N/A' }}</p>
          <p><strong>Model:</strong> {{ $product->model->name ?? 'N/A' }}</p>
          <p><strong>Authenticity:</strong> {{ ucfirst($product->authenticity) }}</p>
          <p><strong>Location:</strong> Dhaka, Bangladesh</p>
          <p><strong>Status:</strong> {{ $product->negotiable ? 'Negotiable' : 'Fixed' }}</p>
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
          <p class="text-sm text-gray-500 mb-1">📞 Seller's Phone Number</p>
          <p class="text-lg font-medium text-blue-700">{{ $product->phone_number }}</p>
        </div>
       <div class="mt-4">
        
       @if (auth()->id() !== $product->user_id)
        <a href="{{ route('chat.with.user', $product->user->id) }}" 
          class="inline-block mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
          💬 Chat with Seller
        </a>
           @endif
      </div>
      </div>
    </div>

    <!-- Features -->
    @if ($product->features->count())
    <div class="mt-10">
      <h2 class="text-xl font-semibold text-gray-800 mb-2">🔧 Features</h2>
      <ul class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-1 text-gray-700 text-sm list-disc list-inside pl-4">
        @foreach ($product->features as $feature)
          <li>{{ $feature->name }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Specifications -->
    @if ($product->entities->count())
    <div class="mt-10">
      <h2 class="text-xl font-semibold text-gray-800 mb-2">💻 Specifications</h2>
      <ul class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-1 text-gray-700 text-sm list-disc list-inside pl-4">
        @foreach ($product->entities as $entity)
          <li>
            <span class="font-medium">
              {{ ucwords(str_replace('_', ' ', $entity->type)) }}:
            </span> {{ $entity->value }}
          </li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Description -->
    <div class="mt-10">
      <h2 class="text-xl font-semibold text-gray-800 mb-2">📝 Description</h2>
      <p class="text-gray-700 text-sm leading-relaxed">
        {{ $product->description }}
      </p>
    </div>
       {{-- @auth
        @if(auth()->id() === $product->user_id) --}}
            @can('update', $product)
            
            <div class="mt-4 flex gap-3">
              <a href="{{ route('product.edit', $product->id) }}" class="border border-gray-800 px-4 py-2 bg-[#169C89] rounded-sm text-white font-bold shadow hover:bg-[#0E7F6F]">✏️ Edit</a>
              @endcan
              @can('delete', $product)
              <div>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border border-gray-800 px-4 py-2 bg-red-400 text-white font-bold rounded-sm shadow hover:bg-red-800">🗑️ Delete</button>
                </form>
            </div>
            </div>
             @endcan
            
        {{-- @endif
    @endauth --}}

 {{-- Quetion fort non owners  --}}
@auth
    @if(auth()->id() !== $product->user_id) 
        <form action="{{ route('question.store', $product->id) }}" method="POST" class="mb-6">
            @csrf
            <div class="mt-4 bg-white p-4 rounded shadow">
                <h2 class="text-2xl font-bold text-center text-blue-700 mb-4">🤔 Ask a Question</h2>
                <textarea name="question" required class="w-full p-2 border rounded" placeholder="Write your question"></textarea>
                <button type="submit" class="mt-2 px-4 py-1 bg-blue-600 text-white rounded">Send Question</button>
            </div>
        </form>
    @endif
@endauth


{{-- list of All question and answer  --}}
<h2 class="text-xl font-semibold mt-6 mb-4">Question And Answer</h2>

@forelse ($product->questions as $question)
    <div class="mb-4 p-4 bg-gray-50 border rounded">
        <p><strong>{{ $question->asker->name  }}:</strong> {{ $question->question }}</p>
       
 
        @if($question->answer)
            <div class="mt-2 pl-3 border-l-4 border-green-500">
                <p class="text-green-700"><strong>{{ $question->answer->replier->name }}:</strong> {{ $question->answer->answer }}</p>
            </div>
        @elseif(auth()->id() === $product->user_id)
            {{-- only for owner form  --}}
            <form action="{{ route('answer.store', $question->id) }}" method="POST" class="mt-3">
                @csrf
                <textarea name="answer" required class="w-full p-2 border rounded" placeholder="Write you answer here"></textarea>
                <button type="submit" class="mt-2 px-4 py-1 bg-green-600 text-white rounded">Answer</button>
            </form>
        @endif
    </div>
@empty
    <p class="text-gray-500">No Question in this Product</p>
@endforelse

  </div>
</div>



@endsection