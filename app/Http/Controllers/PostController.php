<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->where('userid', '!=', \Session::get('user')[0]);
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ptitle' => 'required',
            'pcategory' => 'required',
            'pdata' => 'required'
        ]);
        
        $post = new Post;
        $post->posttitle = $request->ptitle;
        $post->postcategory = $request->pcategory;
        $post->postdata = $request->pdata;
        $post->userid = \Session::get('user')[0];
        
        $result = $post->save();
        return redirect()->route('posts.index');
    }

    public function show($post)
    {   
        $post_with_id = Post::findOrFail($post);
        return view('post.show', ['post' => $post_with_id]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ptitle' => 'required',
            'pcategory' => 'required',
            'pdata' => 'required'
        ]);
        
        $post = Post::findOrFail($id);
        $post->posttitle = $request->ptitle;
        $post->postcategory = $request->pcategory;
        $post->postdata = $request->pdata;
        
        $result = $post->save();
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::where('id', '=', $id)->firstOrFail()->delete();
        return redirect('/my-posts');
    }
}
