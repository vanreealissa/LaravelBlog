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
</div>
<br>
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div class="flex flex-col items-center justify-center text-center">
            <h3 class="text-2xl mb-2">Reacties</h3>
                @if ($blog->comments)
                @foreach ($blog->comments as $comment)
                <p>{{ $comment->user->name }}: {{ $comment->content }}</p>
                
                @if (Auth::check() && $comment->user_id === Auth::id())
                    <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijder reactie</button>
                    </form>
                @endif
            @endforeach
                @else
                    <p>Geen reacties.</p>
                @endif
                    <br>
                    <br>
            </div>
            </div>
            @auth
            <form action="{{ route('comments.store', ['blogId' => $blog->id]) }}" method="post">
                @csrf
                <label for="content">Maak een reactie:</label>
                <br>
                <textarea name="content" id="content" rows="3"></textarea>
                <br>
                <button type="submit">plaats reactie</button>
            </form>
        @else
            <p> <a href="{{ route('login') }}">log in</a> om te reageren    .</p>
        @endauth
@endsection



