<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
class HomeController extends Controller
{
    public function index() {
        $posts = Post::paginate(10);

        return view('home', array(
            'posts' => $posts
        ));
    }

    public function users() {
        $users = User::paginate(10);

        return view('users', array(
            'users' => $users
        ));
    }
}