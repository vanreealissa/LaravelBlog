@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless(count($blogs) == 0)
        @foreach($blogs as $blog)
          <x-blog-card :blog="$blog" />
        @endforeach
    @else 
        <p>Geen blogs gevonden</p>
    @endunless

    <div class="mt-6 p-4">
        {{$blogs->links()}}
    </div>

</div>
@endsection