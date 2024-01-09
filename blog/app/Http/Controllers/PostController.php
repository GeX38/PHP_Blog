<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Events\PublishPostEvent;

class PostController extends Controller
{

    public function index()
    {

        $allPosts = Post::all();
        return view('posts.index', compact('allPosts'));
    }

    public function indexPub()
    {
        $publishedPosts = Post::where('published', true)->get();
        return view('posts.home', compact('publishedPosts'));
    }
    
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'published' => false,
        ]);
    
        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Статья успешно создана');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Статья успешно обновлена');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    
        return redirect()->route('posts.index')
            ->with('success', 'Статья удалена');
    }


    public function publish($id)
    {
        $post = Post::findOrFail($id);
        $post->published = true;
        $post->save();

        event(new PublishPostEvent($post));
    
        return redirect()->route('posts.index')
            ->with('success', 'Статья опубликована');
    }

    public function unpublish($id)
    {
        $post = Post::findOrFail($id);
        $post->published = false;
        $post->save();

        return redirect()->route('posts.show', $post->id)
            ->with('success', 'Статья снята с публикации');
    }
}
