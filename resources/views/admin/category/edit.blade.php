@extends('admin.layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 ml-4 text-grey-800">Category</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</div>

<div class="row justify-content-center">
    @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="col-lg-10">
        <form action="{{ route('category.update', [$category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
                </div>

                <div class="card-body">
                    {{-- Add this border for debugging if button is not showing --}}
                    {{-- style="border: 2px solid red;" --}}

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            value="{{ $category->name }}"
                        >
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            class="form-control @error('description') is-invalid @enderror" 
                            rows="4"
                        >{{ $category->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="customFile">Image</label>
                        <div class="custom-file">
                            <input 
                                type="file" 
                                class="custom-file-input @error('image') is-invalid @enderror" 
                                id="customFile" 
                                name="image"
                            >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <br>
                        <img src="{{ Storage::url($category->image) }}" width="100" alt="Category Image">
                        @error('image')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
