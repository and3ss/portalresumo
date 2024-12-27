<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class PostListController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('portal')->latest()->get();
        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
    }
}
