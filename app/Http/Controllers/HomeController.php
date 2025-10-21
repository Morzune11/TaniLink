<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        // Ambil semua post dengan relasi user-nya
        $posts = Post::with('user')->latest()->get();

        return view("home.home", compact('posts'));
    }

    public function postStore(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/mov|max:10000',
        ]);

        // Buat instance post baru
        $post = new Post();
        $post->user_id = Auth::user()->id; // otomatis ambil ID user yang login
        $post->content = $request->content;

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts/images', 'public');
        }

        // Upload video jika ada
        if ($request->hasFile('video')) {
            $post->video = $request->file('video')->store('posts/videos', 'public');
        }

        // Simpan ke database
        $post->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Post created successfully!');
    }
}