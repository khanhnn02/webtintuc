@extends('layouts.app')

@section('content')
    <h1>Thêm Mới Danh Mục</h1>

    <form action="{{ url('admin/categories') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Lưu danh mục</button>
    </form>
@endsection
