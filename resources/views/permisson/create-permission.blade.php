@extends('layout.panel-header')

@section('content')
<div class="bg-gray-100 min-h-screen py-10">
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold">Create Permission</h2>
<form action="{{ route('permisson.post') }}" method="POST">
    @csrf
        <div class="mb-4 block">
        <label class="block mt-3" for="">Name</label>

        <input name="name" value="{{ old('name') }}" class="w-full border border-gray-300 px-4 py-2 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-blue-400" type="text">
        @error('name')
            <span class=" mt-2 border border-gray-600 bg-red-400 rounded-sm py-2 px-3">{{$message}}</span>
        @enderror
        <div class="mt-2">
            <Button class="border-black border bg-gray-600 rounded-sm text-white py-2 px-3 hover:bg-black duration-300">Submit</Button>
        </div>
    </div>
    </div>
</form>
</div>

@endsection