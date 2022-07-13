@extends('layouts.master')

@section('title')
    Add Product
@endsection

@section('content')


<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Category</h3>
                <p class="text-subtitle text-muted">This page is a page to add products category, ok<a href="{{ route("product.index") }}"> Check it out</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("product.index") }}">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Add Product Category</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <form action="{{ route("category.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Add product name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo Category</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" id="photo">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
