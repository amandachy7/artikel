<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user', 'comments.user')->latest()->paginate(10);
        return view('news.index', compact('news'));
    }
    public function create()
    {
        return view('news.add');
    }

    public function store(Request $request)
    {
        // Validate and store the news data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $news = new News();
        $news->title = $validated['title'];
        $news->content = $validated['content'];
        // Handle the image upload if it exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }
        $news->save();

        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan');
    }
}
