@extends('layout.header')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold">Create Roles</h2>
    <form action="{{ route('store.role') }}" method="POST">
        @csrf
        <div class="mb-4 block">
        <label class="block mt-3" for="">Name</label>

        <input name="name" value="{{ old('name') }}" class="w-full border border-gray-300 px-4 py-2 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-blue-400" type="text">
        @error('name')
            <span class=" mt-2 border border-gray-600 bg-red-400 rounded-sm py-2 px-3">{{$message}}</span>
        @enderror
        <div class="mt-2">
            <button class="mt-2 border-black border bg-gray-600 rounded-sm text-white py-2 px-5 hover:bg-black duration-300">Submit</button>
        </div>
    </div>
      <div class="mb-6">
    <label class="block text-lg text-gray-700 font-medium mb-3">Assign Permissions</label>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @if ($permissions->isNotEmpty())
            @foreach ($permissions as $permission)
                <label for="permission-{{ $permission->id }}" class="flex items-center gap-3 p-3 bg-gray-50 border border-gray-200 rounded-lg hover:shadow-md transition cursor-pointer">
                    <input type="checkbox" id="permission-{{ $permission->id }}" name="permission[]"
                        value="{{ $permission->id }}"
                        class="h-5 w-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-400 border-gray-300">
                    <span class="text-gray-800 text-sm font-medium">{{ $permission->name }}</span>
                </label>
            @endforeach
        @endif
                </div>
            </div>
        </form>
    </div>

</div>

@endsection