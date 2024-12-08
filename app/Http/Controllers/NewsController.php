<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
{
    $news = News::latest()->paginate(5);
    return view('news.index', compact('news'));
}

public function show($id)
{
    $news = News::findOrFail($id);
    return view('news.show', compact('news'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    $news = News::where('title', 'LIKE', "%$query%")->get();
    return view('news.search', compact('news', 'query'));
}

}
