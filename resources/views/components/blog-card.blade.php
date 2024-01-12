@props(['blog'])


<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
        src="{{$blog->foto ? asset('storage/' . $blog->foto) : asset('/images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/blogs/{{$blog->id}}">{{$blog->title}}</a>
            </h3>
            <ul class="flex">
                <x-blog-tags :tagsCsv="$blog->tags" />
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{$blog->location}}
            </div>
            <br>
            <div>
                <p>Geplaatst op: {{ $blog->created_at}}</p>
            </div>
            <div>
                <p>Geplaatst door: {{ $blog->user->name }}</p>
            </div>
        </div>
    </div>
</div>