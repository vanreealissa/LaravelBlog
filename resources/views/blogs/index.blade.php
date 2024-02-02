@extends('layout')

@section('content')
    @include('partials._hero')
    @include('partials._search')

    <div class="container mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @unless(count($blogs) == 0)
            @foreach($blogs as $blog)
                <a href="{{ route('blogs.show', $blog) }}" class="group mb-8 bg-white border border-gray-300 rounded-md overflow-hidden hover:shadow-lg transition-all duration-300">
                    <img class="w-full h-64 object-cover" src="{{ $blog->foto ? asset('storage/' . $blog->foto) : asset('/images/no-image.png') }}" alt="{{ $blog->title }}">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2 group-hover:text-indigo-600">{{ $blog->title }}</h2>
                        <p class="text-gray-600">{{ $blog->description }}</p>
                        <div class="flex items-center mt-4">
                            <span class="text-gray-500">{{ $blog->created_at->diffForHumans() }}</span>

                            @if(count($blog->tags) > 0)
                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    @foreach($blog->tags as $tag)
                                        {{ $tag->name }}@if(!$loop->last),@endif
                                    @endforeach
                                </span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <p class="text-center">Geen blogs gevonden</p>
        @endunless

        <div class="mt-6 p-4">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
