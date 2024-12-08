@extends('layouts.app')

@section('content')
    <h1>Chỉnh Sửa Danh Mục</h1>

    <form action="{{ url('admin/categories/' . $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Cập nhật danh mục</button>
    </form>
@endsection
