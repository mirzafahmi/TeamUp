@extends('layout.desktop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('admin.play-levels.store')}}" method="post">
                @csrf
                <h3 class="text-center text-dark">Create Play Level</h3>
                <div class="form-group mt-3">
                    <label for="name" class="text-dark">Play Level Name:</label><br>
                    <input type="type" name="name" id="name" class="form-control">
                    @error('name')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="text-dark">Description:</label><br>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    @error('description')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection