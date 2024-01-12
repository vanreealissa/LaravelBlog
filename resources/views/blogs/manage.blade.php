@extends('layout')
@section('content')

<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Beheer blogs
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($blogs->isEmpty())
            @foreach($blogs as $blog)
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="show.html"> {{$blog->title}}</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/blogs/{{$blog->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form action="/blogs/{{$blog->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                            Verwijder
                        </button>
                    </form>
                </td>
            </tr>  
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="center">Geen blogs gevonden</p>
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</div>
@endsection