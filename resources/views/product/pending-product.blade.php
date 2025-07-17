@extends('layout.panel-header')
@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-3 flex items-center gap-2">
        <svg class="w-7 h-7 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 6h18M9 14h6m-3 4h.01"></path>
        </svg>
        Pending Products
    </h2>

    @forelse($products as $product)
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm mb-6 p-6 transition hover:shadow-lg">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $product->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Product ID: {{ $product->id }}</p>
                    <p class="text-sm text-gray-600 mt-1">Condition: <span class="font-medium capitalize">{{ $product->condition }}</span></p>
                </div>

                <div class="flex gap-3">
                   @if(Auth::guard('panel')->user()?->can('approve', App\Models\Product::class))
                        
                    
                    {{-- Approve Button --}}
                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm font-medium shadow">
                            ✅ Approve
                        </button>
                    </form>
                   @endif
                 
                    @if(Auth::guard('panel')->user()?->can('reject',  App\Models\Product::class))
                        
                    
                    
                    {{-- Reject Button --}}
                    <form action="{{ route('admin.products.reject', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-medium shadow">
                            ❌ Reject
                        </button>
                    </form>
                    @else
                    <span>No Access</span>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-12">
            <p class="text-lg">No pending products found.</p>
        </div>
    @endforelse
</div>



@endsection