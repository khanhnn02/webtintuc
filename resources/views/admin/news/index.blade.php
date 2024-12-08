@extends('layouts.app')

@section('content')
<h1>Danh sách tin tức</h1>

<a href="{{ route('news.create') }}" class="btn btn-success mb-3">Thêm tin tức</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->content}}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <img src="{{ $item->image}}" alt="" style="width:100px; height: auto; ">
            </td>
            <td>
                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary">Sửa</a>
                <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
