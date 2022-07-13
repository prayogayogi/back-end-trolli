@extends('layouts.master')

@section('title')
    Edit Product
@endsection

@section('content')


<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Product</h3>
                <p class="text-subtitle text-muted">This page is a page to add products, ok<a href="{{ route("product.index") }}"> Check it out</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("product.index") }}">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Input Edit Product</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <form action="{{ route("product.update", $product->id) }}" method="post">
                        @method("PATCH")
                        @csrf
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" id="name" placeholder="Add product name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ $product->type }}" id="type" placeholder="Add product type">
                                @error('type')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="heavy">Heavy (Berat)</label>
                                <input type="number" name="heavy" id="heavy" class="form-control @error('heavy') is-invalid @enderror" value="{{ $product->heavy }}" placeholder="Add product heavy">
                                @error('heavy')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="condition">Condition</label>
                                <input type="text" name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror" value="{{ $product->condition }}" placeholder="Add product condition">
                                @error('condition')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="product_kategori_id">Product Kategori</label>
                                <div class="form-group">
                                    <select class="choices form-select @error('product_kategori_id') is-invalid @enderror" name="product_kategori_id" id="product_kategori_id">
                                        <option>Select Product Kategori</option>
                                        @foreach ($categories as $categori)
                                            <option value="{{ $categori->id }}" @if($categori->id == $product->id) selected @endif>{{ $categori->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_kategori_id')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ $product->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">price</label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" placeholder="Add product price">
                                @error('price')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity }}"placeholder="Add product quantity">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
