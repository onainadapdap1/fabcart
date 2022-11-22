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
                    <span>Category</span>
                    {{-- <a href="{{ url('group-add') }}" class="btn btn-primary py-2">ADD Groups</a> --}}
                    <h6 class="mb-0">
                        <a href="{{ url('') }}"class="btn btn-warning text-white py-2 float-right ml-2">Deleted Group</a>
                        <a href="{{ url('category-add') }}" class="btn btn-primary text-white py-2 float-right">ADD Category</a>
                    </h6>
                </h6>
            </div>
        </div>
        <!-- Heading -->
    </div>
@endsection
