@extends('layout.desktop')

@section('content')
    <div class="row justify-content-center">
        <div class="">
            <div class="hstack">
            <h1>Sport Category List</h1>
                <a class="btn btn-success btn-sm ms-auto" href="{{ route('admin.categories.create') }}">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Sport Category
                </a>
            </div>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sport Category</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                {{ $category->created_at->toDateString() }}
                                <br>
                                {{ $category->created_at->format('h:i A') }}
                            </td>
                            <td>
                                <div class="d-grid">
                                    <a href="" class="btn btn-sm btn-info mb-1">View</a>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" class="d-grid">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection