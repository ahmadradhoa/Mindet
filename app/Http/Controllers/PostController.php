<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
       public function index(Request $request)
   {
       $posts = Post::with(['user', 'category'])
           ->withCount('comments')
           ->when($request->category_id, fn($q, $id) => $q->where('category_id', $id))
           ->when($request->search, fn($q, $search) => 
               $q->where('title', 'like', "%{$search}%")
                 ->orWhere('body', 'like', "%{$search}%")
           )
           ->latest()
           ->paginate(10)
           ->withQueryString();

       $categories = Category::orderBy('name')->get();
       return view('posts.index', compact('posts', 'categories'));
   }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string|min:1',
        ]);

        $data['user_id'] = auth()->id();
        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'The post was successfully published!');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'category', 'comments.user']);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        abort_unless($post->user_id === auth()->id(), 403, 'This is not your post!');
        $categories = Category::orderBy('name')->get();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        abort_unless($post->user_id === auth()->id(), 403, 'This is not your post!');

        $post->update($request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string|min:1',
        ]));

        return redirect()->route('posts.show', $post)->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        abort_unless($post->user_id === auth()->id(), 403, 'This is not your post!');
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
}