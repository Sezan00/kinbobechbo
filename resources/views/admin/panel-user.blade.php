@extends('layout.panel-header')
@section('content')

<div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
  <h2 class="text-2xl font-bold text-gray-800 mb-6">Panel User List</h2>

  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">#</th>
        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Name</th>
        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Email</th>
        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Role</th>
        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Created At</th>
        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Action</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($panels as $panel)
      <tr class="hover:bg-gray-100 transition">
        <td class="px-6 py-4 text-sm text-gray-800">{{$loop->iteration }}</td>
        <td class="px-6 py-4 text-sm text-gray-800">{{$panel->name}}</td>
        <td class="px-6 py-4 text-sm text-gray-800">{{$panel->email}}</td>
        <td class="font-medium px-6 py-4 text-sm text-gray-800">{{$panel->roles->pluck('name')->implode(', ')}}</td>
        <td class="px-6 py-4 text-sm text-gray-800">{{($panel->created_at)->format('d M, Y')}}</td>
        <td>
            <a href="{{ route('edit_panel_user', $panel->id) }}">
            <Button class="text-black border border-gray-500 py-2 px-4 bg-gray-200 rounded-sm hover:bg-gray-600 duration-400">Edit</Button>
            </a>
        </td>
        
      </tr>
    @endforeach
    </tbody>
        <div class="mt-6 flex justify-center">
        {{ $panels->links() }}
    </div>
  </table>
</div>


@endsection