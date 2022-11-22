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
                    <span>Group</span>
                    {{-- <a href="{{ url('group-add') }}" class="btn btn-primary py-2">ADD Groups</a> --}}
                    <h6 class="mb-0">
                        <a href="{{ url('group-deleted-records') }}"
                            class="btn btn-warning text-white py-2 float-right ml-2">Deleted Group</a>
                        <a href="{{ url('group-add') }}" class="btn btn-primary text-white py-2 float-right">ADD Groups</a>
                    </h6>
                </h6>
            </div>
        </div>
        <!-- Heading -->

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
                                <th>Description</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($group as $item)
                                <tbody>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' ' }}>
                                    </td>
                                    <td>
                                        <a href="{{ url('group-edit/' . $item->id) }}" class="badge btn btn-primary">Edit</a>
                                        <a href="{{ url('group-delete/' . $item->id) }}"
                                            class="badge btn btn-danger">Delete</a>
                                    </td>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
