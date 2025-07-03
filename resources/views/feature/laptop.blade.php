<div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2" for="">RAM (optional)</label>
     <input type="hidden" name="features[]" value="1">
    <select class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 " name="entity_value[]" id="">
        <option disabled selected>RAM</option>
        <option class="" value="1">1 GB</option>
        <option class="" value="2">2 GB</option>
        <option class="" value="4">4 GB</option>
        <option class="" value="6">6 GB</option>
        <option class="" value="8">8 GB</option>
        <option class="" value="16 GB & Above">16 GB & Above</option>
    </select>
    <input type="hidden" name="entity[]" value="ram">
</div>

<script>
    document.querySelector('[name="features[]"]').remove();
</script>