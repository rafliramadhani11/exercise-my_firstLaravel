<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController
{
    public function index(Category $category, User $user)
    {
        $judul = 'All Post';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $judul = 'All Post in ' . $category->name;
        }
        if (request('user')) {
            $user = User::firstWhere('name', request('user'));
            $judul = 'All Post By ' . $user->name;
        }


        return view('posts', [
            "title" => "Blog",
            "judul" => $judul,
            //Local Scope Filter()
            "posts" => Post::latest()->Filter(request(['search', 'category', 'user']))->paginate(5)->withQueryString()
        ]);
    }

    public function Post(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
