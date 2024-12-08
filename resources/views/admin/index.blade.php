@extends('layouts.app')

@section('content')

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit">Đăng Xuất</button>
</form>


<h1>Danh sách tin tức</h1>

<form action="/search" method="GET" class="mb-4">
    <input type="text" name="query" placeholder="Tìm kiếm tin tức..." class="form-control" required>
</form>

@foreach ($news as $item)
<div class="card mb-3">
    <div class="card-body">
        <h2><a href="/news/{{ $item->id }}">{{ $item->title }}</a></h2>
        <p>{{ Str::limit($item->content, 150) }}</p>
        <small>Danh mục: {{ $item->category->name }} | Ngày tạo: {{ $item->created_at }}</small>
    </div>
</div>
@endforeach

{{ $news->links() }}
@endsection
