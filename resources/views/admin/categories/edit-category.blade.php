@extends('layout.desktop')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('admin.categories.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <h3 class="text-center text-dark">Edit Category</h3>
                <div class="form-group mt-3">
                    <label for="name" class="text-dark">Category Name:</label><br>
                    <input type="type" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
                    @error('name')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="text-dark">Description:</label><br>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ $category->description }}</textarea>
                    @error('description')
                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection