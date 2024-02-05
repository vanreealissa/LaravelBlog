@extends('layout')
@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
         Verander een blog
    </h2>
    <p class="mb-4">verander: {{$blog->title}}</p>
</header>

<form method="POST" action="/blogs/{{$blog->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Titel</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$blog->title}}"/>

        @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">Description</label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value=""rows="10">{{$blog->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>


    <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Locatie</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{$blog->location}}"/>

        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Tags</label>
        <select name="tags[]" multiple class="border border-gray-200 rounded p-2 w-full">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        
        <input type="text" name="new_tags" class="border border-gray-200 rounded p-2 w-full mt-2" placeholder="Voeg nieuwe tags toe"/>
        
    </div>
    

    <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">Bijpassende foto</label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="foto"/>
        <img class="w-48 mr-6 mb-6" src="{{$blog->foto ? asset('storage/' . $blog->foto) : asset('/images/no-image.png')}}" alt="" />

        @error('foto')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div> 

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            verander een blog
        </button>

        <a href="/" class="text-black ml-4"> Terug </a>
    </div>
</form>
</div>

@endsection