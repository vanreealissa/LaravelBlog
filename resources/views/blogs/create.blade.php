@extends('layout')
@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
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
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}"/>

        @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">Description</label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" value="{{old('description')}}"rows="10"></textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>


    <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Locatie</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{old('location')}}"/>

        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2">Tags</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full"name="tags" value="{{old('tags')}}" placeholder="Example: Stalendeur, Stalendeur, Stalendeur, etc"/>

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">Bijpassende foto</label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="foto"/>

        @error('foto')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div> 

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Maak een blog
        </button>

        <a href="/" class="text-black ml-4"> Terug </a>
    </div>
</form>
</div>

@endsection