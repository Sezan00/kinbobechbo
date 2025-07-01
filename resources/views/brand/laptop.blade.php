<div class="mb-4">
  <label class="block text-gray-700 mb-2 font-medium">Brand</label>
  <select id="brand_name" name="brand_name" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-400">
    <option disabled selected>Choose a Brand</option>
    @foreach ($category->brands as $brand)
      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
    @endforeach
  </select>
</div>
