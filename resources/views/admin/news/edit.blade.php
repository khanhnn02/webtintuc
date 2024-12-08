@extends('layouts.app')

@section('content')
<h1>Chỉnh sửa tin tức</h1>

<form action="{{ route('news.update', $news->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
    </div>

    <div class="form-group">
        <label for="content">Nội dung:</label>
        <textarea name="content" class="form-control" required>{{ $news->content }}</textarea>
    </div>

    <div class="form-group">
        <label for="content">hình ảnh:</label>
        <input type="text" name="image" class="form-control" value="{{ $news->image }}" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select name="category_id" class="form-control" required>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection
