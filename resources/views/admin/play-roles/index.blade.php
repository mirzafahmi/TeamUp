@extends('layout.desktop')

@section('content')
    <div class="row justify-content-center">
        <div class="">
            <div class="hstack">
            <h1>Play Roles List</h1>
                <a class="btn btn-success btn-sm ms-auto" href="{{ route('admin.play-roles.create') }}">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Play Roles
                </a>
            </div>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sports</th>
                        <th>Play Roles</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($playRoles as $playRole)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $playRole->id }}</td>
                            <td>{{ $playRole->sport->name }}</td>
                            <td>{{ $playRole->name }}</td>
                            <td>{{ $playRole->description }}</td>
                            <td>
                                {{ $playRole->created_at->toDateString() }}
                                <br>
                                {{ $playRole->created_at->format('h:i A') }}
                            </td>
                            <td>
                                <div class="d-grid">
                                    <a href="" class="btn btn-sm btn-info mb-1">View</a>
                                    <a href="{{ route('admin.play-roles.edit', $playRole->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form method="POST" action="{{ route('admin.play-roles.destroy', $playRole->id) }}" class="d-grid">
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