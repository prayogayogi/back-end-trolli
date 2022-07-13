@extends('layouts.master')

@section('title')
    Edit Category
@endsection

@section('content')


<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Category</h3>
                <p class="text-subtitle text-muted">This page is a page to add Categorys, ok<a href="{{ route("category.index") }}"> Check it out</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("category.index") }}">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Edit Category</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <form action="{{ route("category.update", $category->id) }}" method="post" enctype="multipart/form-data">
                            @method("PATCH")
                            @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" id="name" placeholder="Add Category name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Photo</label>
                                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                    <div class="col-md-2 align-self-center mb-4">
                        <img src="{{ Storage::url($category->photo) }}" class="img-fluid img-thumbnail" alt="" width="150">
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
