@extends('layouts.app')

@section('content')
<h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>

@if ($news->count() > 0)
    @foreach ($news as $item)
    <div class="card mb-3">
        <div class="card-body">
            <h2><a href="/news/{{ $item->id }}">{{ $item->title }}</a></h2>
            <p>{{ Str::limit($item->content, 150) }}</p>
        </div>
    </div>
    @endforeach
@else
    <p>Không tìm thấy kết quả nào.</p>
@endif

<a href="/" class="btn btn-secondary">Quay lại</a>
@endsection
