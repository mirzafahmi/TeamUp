@extends('layout.desktop')

@section('content')
    <div class="row justify-content-center">
        <div class="">
            <div class="hstack">
            <h1>Play Modes List</h1>
                <a class="btn btn-success btn-sm ms-auto" href="{{ route('admin.play-modes.create') }}">
                    <i class="fa-solid fa-plus me-1"></i>
                    Add Play Modes
                </a>
            </div>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Sports</th>
                        <th>Play Modes</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($playModes as $playMode)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $playMode->id }}</td>
                            <td>{{ $playMode->sport_id }}</td>
                            <td>{{ $playMode->name }}</td>
                            <td>{{ $playMode->description }}</td>
                            <td>
                                {{ $playMode->created_at->toDateString() }}
                                <br>
                                {{ $playMode->created_at->format('h:i A') }}
                            </td>
                            <td>
                                <div class="d-grid">
                                    <a href="" class="btn btn-sm btn-info mb-1">View</a>
                                    <a href="{{ route('admin.play-modes.edit', $playMode->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form method="POST" action="{{ route('admin.play-modes.destroy', $playMode->id) }}" class="d-grid">
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