@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <h6 class="mb-2 mb-sm-0 pt-1">
                    <a href="#">Collections</a>
                    <span>/</span>
                    <span>Product</span>
                    {{-- <a href="{{ url('group-add') }}" class="btn btn-primary py-2">ADD Groups</a> --}}
                    <h6 class="mb-0">
                        <a href="{{ url('') }}"class="btn btn-warning text-white py-2 float-right ml-2">Deleted Products</a>
                        <a href="{{ url('/add-products') }}" class="btn btn-primary text-white py-2 float-right">ADD Product</a>
                    </h6>
                </h6>
            </div>
        </div>
        <!-- Heading -->

        {{-- body  --}}
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Sub Category Name</th>
                                <th>Image</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->subcategory->name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/products/'.$item->image) }}" width="60px" alt="">
                                        </td>
                                        <td>
                                            <input type="checkbox" {{ $item->status == '1' ? 'checked' : '0' }}>
                                        </td>
                                        <td>
                                            <a href="" class="badge btn btn-primary">Edit</a>
                                            <a href="" class="badge btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-body --}}
    </div>
@endsection
