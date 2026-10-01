<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
public function index()
{
    $posts = Post::with(['author', 'categories'])
                 ->orderBy('id', 'asc') 
                 ->get(); // Change paginate(10) par get() ici

    return view('posts.index', compact('posts'));
}

    public function create()
    {
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['authorId'] = auth()->id() ?? 1; // ID 1 par défaut pour tes tests
        $data['published'] = 1;

        $post = Post::create($data);

        if ($request->has('categories')) {
            $post->categories()->attach($request->categories);
        }
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('posts.index')->with('success', 'Article créé avec succès !');
    }

    public function show($id)
    {
        $post = Post::with(['author', 'comments', 'tags', 'categories'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title); // On recalcule le slug si le titre change

        $post->update($data);

        $post->categories()->sync($request->categories ?? []);
        $post->tags()->sync($request->tags ?? []);

        return redirect()->route('posts.index')->with('success', 'Article mis à jour !');
    }

    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'L\'article a été supprimé !');
    }
}