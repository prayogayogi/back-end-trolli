@extends('layouts.master')

@section('title')
    Product Category
@endsection

@section('content')

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="message">
            @if(session()->has('message'))
                <p class="d-none" id="message">{{ session()->get('message') }}</p>
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>All Product Category</h3>
                <p class="text-subtitle text-muted">This product Category is a product that is in your shop, okay? <a href="{{ route("category.index") }}"> Check it out</a>.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("category.index") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route("category.create") }}" class="btn btn-primary">Add Category</a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->photo)
                                        <img src="{{ Storage::url($category->photo)}}" style="max-height:80px;"  />
                                    @else
                                        Foto Belum Tersedia
                                @endif
                            </td>
                            <td>
                                <a href="{{ route("category.edit", $category->id) }}">
                                    <span class="badge bg-success">Edit</span>
                                </a>
                                <a href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit()">
                                    <span class="badge bg-danger">Delete</span>
                                </a>
                                <form id="delete-form" action="{{ route("category.destroy", $category->id) }}" method="post" style="display: none">
                                    @method("DELETE")
                                    @csrf
                                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-compat/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            let hasil =  $("#message").text();
            if(hasil){
                swal({
                    title: "Bagus.!",
                    text: `${hasil}`,
                    icon: "success",
                    button: "Oke",
                });
            }
        });

    </script>
    <script src="{{ asset("assets/dist/assets/vendors/simple-datatables/simple-datatables.js") }}"></script>
    <script src="{{ asset("assets/dist/assets/js/vendors.js") }}"></script>
@endpush
