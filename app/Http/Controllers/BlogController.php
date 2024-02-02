<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    //show alle blogs
    public function index() {
        $blogs = Blog::with('tags')->paginate(10);
        return view('blogs.index', [
            'blogs' =>  Blog::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //show enkele blog
    public function show($blogId)
    {
        $blog = Blog::with('comments')->findOrFail($blogId);
        return view('blogs.show', ['blog' => $blog]);
    }

    //laat formulier zien
    public function create() {
        $tags = Tag::all();
        return view('blogs.create', compact('tags'));
    }




    //data opslaan
    public function store(Request $request) {
        
        $formFields = $request->validate([
            'title' =>  ['required', Rule::unique('blogs', 'title') ],
            'description' => 'required',
            //'tags' => 'required',
            'location' => 'required',
        ]);

        if($request->hasFile('foto')) {
            $formFields['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $tagIds = $request->input('tags', []);
        $newTags = explode(',', $request->input('new_tags'));
    
        foreach ($newTags as $tagName) {
            $tagName = trim($tagName);
    
            if ($tagName !== '') {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
        }

        $formFields['user_id'] = auth()->id();

        Blog::create($formFields);

        return redirect('/')->with('message', 'Blog is succesvol toegevoegd!');
    }

    public function edit(Blog $blog) {
        $tags = Tag::all();
        $blog->load('tags');
        return view('blogs.edit', ['blog' => $blog, 'tags' => $tags]);
    
    } 

    public function update(Request $request, Blog $blog) {

        if($blog->user_id != auth()->id()) {
            return back()->with('message', 'U heeft niet de rechten om dit blog te bewerken!');
        }

        $formFields = $request->validate([
            'title' =>  ['required'],
            'description' => 'required',
            'location' => 'required',
            //'tags' => 'required',
        ]);

        if($request->hasFile('foto')) {
            $formFields['foto'] = $request->file('foto')->store('fotos', 'public');
        }

       $blog->update($formFields);

        return back()->with('message', 'Blog is succesvol veranderd!');
    }

    public function destroy(Blog $blog){

        if($blog->user_id != auth()->id()) {
            return back()->with('message', 'U heeft niet de rechten om dit blog te verwijderen!');
        }

        $blog->delete();
        return redirect('/')->with('message', 'Blog is succesvol verwijderd');
    }

    public function manage() {
        return view('blogs.manage', ['blogs' => auth()->user()->blogs]);
    }
}
