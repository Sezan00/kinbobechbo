@extends('layout.header')
@section('content')
<form action="{{ route('product.store', ['slug' => $category->slug]) }}" enctype="multipart/form-data" method="POST">
  @csrf

  

    @if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded">
      {{ session('success') }}
    </div>
    @endif
  <div class="bg-gray-100 min-h-screen py-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Fill in the details</h2>

  <input type="hidden" name="category_id" value="{{ $category->id }}">

    <div class="mb-4">
      <label class="block text-gray-700 mb-2 font-medium">Condition</label>
      <div class="flex gap-6">
        <label class="flex items-center space-x-2">
          <input type="radio" name="condition" value="used" class="accent-blue-600" checked>
          <span>Used</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="condition" value="new" class="accent-blue-600">
          <span>New</span>
        </label>
      </div>
    </div>
<input type="hidden" name="category_id" value="{{ $category->id }}">

    
    <div class="mb-4">
      <label class="block text-gray-700 mb-2 font-medium">Authenticity</label>
      <div class="flex gap-6">
        <label class="flex items-center space-x-2">
          <input type="radio" name="authenticity" value="original" class="accent-blue-600">
          <span>Original</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="authenticity" value="refurbished" class="accent-blue-600" checked>
          <span>Refurbished</span>
        </label>
      </div>
    </div>

{{-- brand side  --}}
    

      @if($category->slug == 'Mobile-phones')
       
       @elseif ($category == 'car')
       @elseif ($category == 'laptop')
       @endif

       @switch($category->slug)
           @case('Mobile-phones')
               @include('brand.mobile')
               @break
           @case('Car-sell')
               @include('brand.car')
               @break
            @case('Laptop-sell')
              @include('brand.laptop')
              @break
           @default
               @break
       @endswitch



    <div class="text-right">
      <a href="" class="text-sm text-blue-600 hover:underline">See our posting rules</a>
    </div>

    <div class="mb-4">
        <label  class="block text-gray-700 mb-2 font-medium" for="">Model</label>
        {{-- <input type="hidden" name="model" value="model"> --}}
        <select name="model_id" id="model" class="w-full px-4 py-2 border border-gray-300 rounded-lg sm:shadow focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value=""> </option>
        </select>
    </div>

    <div class="mb-4">
        <label class="text-gray-700 font-medium" for="">Features (optional)</label>
    </div>
      @if($category->slug == 'Mobile-phones')
        @include('feature.mobile')
    @elseif ($category->slug == 'Car-sell')
      @include('feature.car')
      @elseif ($category->slug == 'Laptop-sell')
      @include('feature.laptop')
    @endif

    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="">Title</label>
         <label for="">
            <input name="title" class="w-full border border-gra-300 px-4 py-2 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-blue-400" type="text">
         </label>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2" for="">Description</label>
         <label for="">
            <textarea class="w-full px-4 py-4  border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-blue-400" name="description" id="" cols="30" rows="3" ></textarea>
         </label>
    </div>

    
    <div class="mb-4">
        <label class="block text-gray-700 font-medium" for="">Price</label>
        <input name="price" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:outline-none shadow focus:ring-2 focus:ring-blue-400" type="number" placeholder="Enter your product price">
    </div>
    <div class="mb-4">
        <input type="checkbox" name="negotiable" class="form-checkbox" value="1">
        <span class="ml-2">Negotiable</span>
    </div>

    {{-- photo section  --}}
    <div class="mb-4" >
      <label class="text-gray-700 font-medium" for="">Add up to 5 photos</label>
      <div class="grid grid-cols-5 gap-3">
        
     <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
     <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
     <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
     <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
     <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
     <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      </div>
    </div>
    {{-- more 10 photo put need to pay  --}}
    <div class="mb-4">
      <label class="block text-gray-700 font-medium" for="">Got more images to upload? </label>
      <label class="text-sm text-gray-700" for="">Sell faster by adding 10 more images for a fee of Tk 299.</label>

      <div class="grid grid-cols-5 gap-3">
        <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>
      <label class="border border-dashed border-gray-300 rounded-md flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 transition h-24 w-24">
        <input type="file" name="images[]" accept="image/*" class="hidden" multiple> 
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="text-xs text-gray-500 text-center">Add a photo</span>
      </label>

        
      </div>
    </div>
    {{-- contact section  --}}
    <div class="mb-4">
      <label class="block text-gray-700 font-medium mb-4" for="">Contact details</label>
      <p class="block text-gray-700 font-medium ">Name</p>
      <p class="block text-gray-700 mb-4">All sharia sezan</p>
      <p class="block text-gray-700 font-medium">Email</p>
      <p class="block text-gray-700">sezanvay.bd@gmail.com</p>
    </div>
    {{-- phone number add  --}}
    <div class="mb-4 p-4 border border-gray-300 roundd-md">
      <label class="block text-sm mb-2" for="">Add phone number</label>
      <div class="mb-4 items-center justify-center">
      <input class="w-full max-w-xs px-2 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="Enter Your Phone number" required>
     
      </div>
    </div>
    {{-- terms and codition  --}}

    <div class="mb-4">
      <div class="flex justify-left gap-1">
      <label for="">
        <input type="checkbox" name="terms" class="form-checkbox text-blue-500" required> I have read and accept the
      </label>
      <div> <a class="text-blue-500" href="{{ route('terms_condition') }}">Terms and Conditions</a></div>
    </div>

  </div>
  {{-- <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="flex justify-end">
    <a class="bg-[#169C89] p-2 rounded-md text-white font-bold px-12" href="">Post Add</a>
  </div>
    </form> --}}
    <button class="bg-[#169C89] p-2 rounded-md text-white font-bold px-12" type="submit" class="btn btn-primary">Post Add</button>
  </div>
</div>
</form>

@endsection

@push('scripts')
  <script>

    var brand_selector = document.getElementById('brand_name');

    var model_selector = document.getElementById('model');

    brand_selector.addEventListener('change', function(e) {
      console.log(e.target.value);
      if(e.target.value == null || e.target.value == '') {
        return;
      }

      getModel(e.target.value);

    })

    async function getModel(id) {

      let route = "{{ route('api.get.model', ['id' => '_id']) }}";
      route = route.replace('_id', id)

      console.log(route);
      

      const response = await axios.get(route);
      const data = response.data.data;

      model_selector.options.length = 0;

      data.forEach(function(val, index){
        console.log(val, index);
        
        var option = document.createElement("option");
        option.text = val.name
        option.value = val.id
        model_selector.add(option)
      })
      
    }


    
  </script>
@endpush