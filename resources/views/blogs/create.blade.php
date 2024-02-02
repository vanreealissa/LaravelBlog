@extends('layout')
@section('content')

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Maak een blog
        </h2>
        <p class="mb-4">Plaats een blog over een deur</p>
    </header>

    <form method="POST" action="/blogs" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="company" class="inline-block text-lg mb-2">Titel</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ old('title') }}"/>

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">Description</label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ old('description') }}</textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="company" class="inline-block text-lg mb-2">Locatie</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{ old('location') }}"/>

            @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">Tags</label>

            <select name="tags[]" multiple class="border border-gray-200 rounded p-2 w-full">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>

            <input type="text" name="new_tags" class="border border-gray-200 rounded p-2 w-full mt-2" placeholder="Voeg nieuwe tags toe"/>

            @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">Bijpassende foto</label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="foto" id="foto" onchange="previewImage()"/>

            <div class="mt-2">
                <img src="" alt="Preview" id="imagePreview" style="max-width: 100%; max-height: 200px;"/>
            </div>

            @error('foto')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Maak een blog
            </button>

            <a href="/" class="text-black ml-4"> Terug </a>
        </div>
    </form>
</div>

<script>
    function previewImage() {
        const input = document.getElementById('foto');
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
