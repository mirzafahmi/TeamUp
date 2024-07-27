@extends('layout.desktop')

@section('content')
    <div class="row justify-content-center">
        <div class="">
            <div class="hstack">
            <h1>Sport Play Level List</h1>
                <a class="btn btn-success btn-sm ms-auto" href="{{ route('admin.play-levels.create') }}">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Sport Play Level
                </a>
            </div>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sport playLevel</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($playLevels as $playLevel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $playLevel->id }}</td>
                            <td>{{ $playLevel->name }}</td>
                            <td>{{ $playLevel->description }}</td>
                            <td>
                                {{ $playLevel->created_at->toDateString() }}
                                <br>
                                {{ $playLevel->created_at->format('h:i A') }}
                            </td>
                            <td>
                                <div class="d-grid">
                                    <a href="" class="btn btn-sm btn-info mb-1">View</a>
                                    <a href="{{ route('admin.play-levels.edit', $playLevel->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form method="POST" action="{{ route('admin.play-levels.destroy', $playLevel->id) }}" class="d-grid">
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