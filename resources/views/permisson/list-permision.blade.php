@extends('layout.panel-header')
@section('content')

<div class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
    @if (session('success'))
    <span class="text-green-600 font-semibold mx-auto bg-green-100 rounded-sm py-2 px-3">
        {{ session('success') }}
    </span>
@endif
    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-3">🔐 Permission List</h2>

    <table class="min-w-full table-auto border border-gray-200">
      <thead class="bg-gray-100">
        <tr class="text-left text-sm text-gray-700">
          <th class="px-4 py-3 border-b">#</th>
          <th class="px-4 py-3 border-b">Permission Name</th>
          <th class="px-4 py-3 border-b text-center">Action</th>
        </tr>
      </thead>
      <tbody class="text-sm text-gray-800">
  @foreach ($permissions as $permission)
    <tr class="hover:bg-gray-50 transition">
      <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
      <td class="px-4 py-2 border-b">{{ $permission->name }}</td>
      <td class="px-4 py-2 border-b text-center space-x-2">
        <a href="{{ route('Permission.edit', $permission->id) }}">
        <button class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</button>
        </a>
        <a href="javascript:voide(0);" onclick="deletePermission({{ $permission->id }})">
        <button class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">Delete</button>
        </a>
      </td>
    </tr>
  @endforeach
  <div class="mt-6 flex justify-center">
  {{ $permissions->links() }}
</div>
</tbody>

    </table>
    <div class="mt-6 flex justify-center">
  {{ $permissions->links() }}
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

@push('scripts')
<script>
  function deletePermission(id) {
    if (confirm("Are you sure you want to delete?")) {
      $.ajax({
        url: '{{ route("permission.delete") }}',
        type: 'DELETE',
        data: {
          _token: '{{ csrf_token() }}', 
          id: id
        },
        dataType: 'json',
        success: function(response) {
          if (response.status) {
            alert('✅ Permission deleted!');
            location.reload(); 
          } else {
            alert('❌ Permission not found!');
          }
        },
        error: function(xhr) {
          alert('🚫 Something went wrong!');
          console.log(xhr.responseText);
        }
      });
    }
  }
</script>
@endpush
@endsection