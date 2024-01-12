@extends('layout')
@section('content')
@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6" src="{{$blog->foto ? asset('storage/' . $blog->foto) : asset('/images/no-image.png')}}" alt="" />
        <h3 class="text-2xl mb-2">{{$blog->title}}</h3>
        <x-blog-tags :tagsCsv="$blog->tags" />
        <br>
        <div>
            <h3 class="text-3xl font-bold mb-4">
                Blog:
            </h3>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div class="text-lg space-y-6">
               {{$blog->description}}
            </div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> 
                {{$blog->location}}
            </div>
            <div class="text-lg mt-4">
                <p>Geplaatst op: {{ $blog->created_at->format('d-m-Y H:i') }}</p>
            </div>      
            <div>
                <p>Geplaatst door: {{ $blog->user->name }}</p>
            </div>
        </div>
    </div>
</div>
{{-- <div class="mt-4 p-2 flex space-x-6">
    <a href="/blogs/{{$blog->id}}/edit">
      <i class="fa-solid fa-pencil"></i> Edit
    </a>


    <form action="/blogs/{{$blog->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i>
            Verwijder
        </button>
    </form>
</div> --}}
</div>
@endsection



