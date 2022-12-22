<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function all()
    {
        dd(session()->has('users'));
        return view('post/index', [
            "posts" => Post::all(),
            "title" => "Blog"
        ]);
    }

    public function add()
    {
        return view('post/add', [
            "title" => "Add Post"
        ]);
    }

    public function create(Request $request)
    {
        $payload = [
            'title' => $request->input("title"),
            'body' => $request->input("body"),
            'thumbnail' => $request->file("thumbnail")->store("images", "public")
        ];
    
        if (strlen($payload['body']) > 200) {
            $payload['excerpt'] = substr($payload['body'], 0, 200) . '...';
        } elseif (strlen($payload['body']) > 150) {
            $payload['excerpt'] = substr($payload['body'], 0, 150) . '...';
        } elseif (strlen($payload['body']) > 100) {
            $payload['excerpt'] = substr($payload['body'], 0, 100) . '...';
        } else {
            $payload['excerpt'] = $payload['body'];
        }

        Post::query()->create($payload);
        return redirect("blog"); // ke halaman blog
    }
}
