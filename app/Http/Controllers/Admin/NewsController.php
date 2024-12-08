<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
{
    $news = News::all();
    return view('admin.news.index', compact('news'));
}

public function create()
{
    $categories = Category::all();
    return view('admin.news.create', compact('categories'));
}

public function store(Request $request)
{
    News::create($request->all());
    return redirect()->route('news.index');
}

public function edit($id)
{
    $news = News::findOrFail($id);
    $categories = Category::all();
    return view('admin.news.edit', compact('news', 'categories'));
}

public function update(Request $request, $id)
{
    $news = News::findOrFail($id);
    $news->update($request->all());
    return redirect()->route('news.index');
}

public function destroy($id)
{
    News::findOrFail($id)->delete();
    return redirect()->route('news.index');
}

}
