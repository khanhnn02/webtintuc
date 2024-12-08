@extends('layouts.app')

@section('content')
<h1>{{ $news->title }}</h1>
<p>{{ $news->content }}</p>
<div>
    <img src="{{ $news->image }}" alt="" style="width: 400px;">
</div>
<p><strong>Danh mục:</strong> {{ $news->category->name }}</p>
<p><small>Ngày tạo: {{ $news->created_at }}</small></p>

<a href="/" class="btn btn-secondary">Quay lại</a>
@endsection
