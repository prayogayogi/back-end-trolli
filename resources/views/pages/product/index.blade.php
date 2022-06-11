@extends('layouts.master')

@section('title')
    Product
@endsection

@section('content')


<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Product</h3>
                <p class="text-subtitle text-muted">This product is a product that is in your shop, okay? <a href="{{ route("dashboard.index") }}"> Check it out</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("dashboard.index") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route("product.create") }}" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td>Data Not Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@endsection

@push('before-style')
    <link rel="stylesheet" href="{{ asset("assets/dist/assets/vendors/simple-datatables/style.css") }}">
@endpush

@push('before-script')
    <script src="{{ asset("assets/dist/assets/vendors/simple-datatables/simple-datatables.js") }}"></script>
    <script src="{{ asset("assets/dist/assets/js/vendors.js") }}"></script>
@endpush
