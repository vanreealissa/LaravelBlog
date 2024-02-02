<div>
    <div>
        <label for="tags" class="inline-block text-lg mb-2">Tags</label>
        <select name="tags[]" multiple class="border border-gray-200 rounded p-2 w-full">
            @foreach($tags as $tag)
                <option value="{{ $tag }}" {{ in_array($tag, $selectedTags) ? 'selected' : '' }}>{{ $tag }}</option>
            @endforeach
        </select>
    </div>
</div>
