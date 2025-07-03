 <div class="grid grid-cols-2 gap-6 max-w-4xl mx-auto mb-4">
        
       <div class="space-y-2">
        @foreach ($features as $feature)
            
     
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="{{ $feature->id }}" class="accent-blue-600"> 
            <span>
            
        </span>{{$feature->name}}</label>
         @endforeach
    </div>
  
    </div>



