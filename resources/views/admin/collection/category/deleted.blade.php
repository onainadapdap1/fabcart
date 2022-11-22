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
                    <span>/</span>
                    <span>Category deleted records</span>
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
                                <th>Group Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($category as $item)
                                <tbody>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->group->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/categoryimage/' . $item->image) }}" width="50px" alt="">
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/categoryicon/' . $item->icon) }}" width="50px" alt="">
                                    </td>
                                    <td>
                                        <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' ' }}>
                                    </td>
                                    <td>
                                        <a href="{{ url('category-re-store/' . $item->id) }}" class="badge btn btn-success">Re-store</a>
                                    </td>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- end-body --}}
    </div>
@endsection
