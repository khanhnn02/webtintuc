@extends('layouts.app')

@section('content')
<h1>Thêm tin tức mới</h1>

<form action="{{ route('news.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Nội dung:</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="content">Hình ảnh:</label>
        <input type="text" name="image" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select name="category_id" class="form-control" required>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
</form>
@endsection
