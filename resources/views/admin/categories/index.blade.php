@extends('layouts.app')

@section('content')
    <h1>Danh Sách Danh Mục</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Thêm mới danh mục</a>



    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ url('admin/categories/' . $category->id . '/edit') }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ url('admin/categories/' . $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE') <!-- Xác định phương thức DELETE -->
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
