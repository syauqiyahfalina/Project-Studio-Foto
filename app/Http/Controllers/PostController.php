<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firefly\FilamentBlog\Models\Post; // <--- Import model Post bawaan Firefly

class PostController extends Controller
{
    /**
     * Menampilkan semua daftar artikel di halaman depan blog
     */
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->latest()
            ->paginate(6);

        // Ganti dari 'blog.index' jadi 'filament-blog::blogs.index'
        return view('filament-blog::blogs.index', compact('posts'));
    }

    /**
     * Menampilkan detail isi satu artikel (Single Post)
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        // Ganti dari 'blog.show' jadi 'filament-blog::blogs.show'
        return view('filament-blog::blogs.show', compact('post'));
    }
}
