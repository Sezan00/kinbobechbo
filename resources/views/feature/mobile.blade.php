 <div class="grid grid-cols-2 gap-6 max-w-4xl mx-auto mb-4">
        
       <div class="space-y-2">
        @foreach ($features as $feature)
            
     
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="{{ $feature->id }}" class="accent-blue-600"> 
            <span>
            
        </span>{{$feature->name}}</label>
         @endforeach
    </div>
    
  
    {{-- <div class="space-y-2">
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="11" class="accent-blue-600"> <span>Expandable Memory</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="12" class="accent-blue-600"> <span>4 GB RAM</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="13" class="accent-blue-600"> <span>6 GB RAM</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="14" class="accent-blue-600"> <span>8 GB RAM</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="15" class="accent-blue-600"> <span>12 GB RAM</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="16" class="accent-blue-600"> <span>Dual Camera</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="17" class="accent-blue-600"> <span>Triple Camera</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="18" class="accent-blue-600"> <span>Dual LED Flash</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="19" class="accent-blue-600"> <span>Bluetooth</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="20" class="accent-blue-600"> <span>Wifi</span></label>
        <label class="flex items-center space-x-2"><input type="checkbox" name="features[]" value="21" class="accent-blue-600"> <span>Fingerprint Sensor</span></label>
    </div> --}}
    </div>



