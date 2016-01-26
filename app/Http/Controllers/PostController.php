<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.list', array(
            'posts' => $posts
        ));
    }

    public function edit(Request $request, $id = null)
    {
        $post = null;

        if ($request->method() === 'POST') {
            $post = Post::find($request->get('id')) ?: new Post();
            $post->is_active = $request->get('is_active', 0);
            $post->fill($request->input());
            $post->save();

            return redirect()->route('get-post-edit', array('id' => $post->id));
        }

        if ($id) {
            $post = Post::find($id);
        } else {
            $post = new Post();
        }

        return view('posts.edit', array(
            'post' => $post
        ));
    }

    public function story(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/');
        }

        return view('posts.view', array(
            'post' => $post
        ));
    }
}
