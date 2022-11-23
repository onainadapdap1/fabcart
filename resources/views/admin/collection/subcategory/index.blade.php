@extends('layouts.admin')

@section('content')
    {{-- bootstrap modal --}}
    <!-- Modal -->
    <div class="modal fade" id="SubcategoryMODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- modal header --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sub-category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                {{-- modal body --}}
                <form action="{{ url('sub-category-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Id (Name)</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($category as $cat_item)
                                            <option value="{{ $cat_item->id }}">{{ $cat_item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="enter name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea rows="4" name="description" type="text" class="form-control" placeholder="enter description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="subcategory_image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Priority</label>
                                    <input type="number" name="priority" class="form-control" placeholder="enter priority">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Show / Hide</label>
                                    <input type="checkbox" name="status" class="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end-bootstrap-modal --}}

    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <h6 class="mb-2 mb-sm-0 pt-1">
                    <a href="#">Collections</a>
                    <span>/</span>
                    <span>Sub-category</span>
                    {{-- <a href="{{ url('group-add') }}" class="btn btn-primary py-2">ADD Groups</a> --}}
                    <h6 class="mb-0">
                        <a href="{{ url('') }}"class="btn btn-warning text-white py-2 float-right ml-2">Deleted
                            Sub-categories</a>
                        <a href="#" data-toggle="modal" data-target="#SubcategoryMODAL"
                            class="btn btn-primary text-white py-2 float-right">ADD
                            Sub-category</a>
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
                                <th>Category Name/Id</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Priority</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($subcategory as $item)
                                <tbody>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/subcategory/' . $item->image) }}" width="50px"
                                            alt="">
                                    </td>
                                    <td>{{ $item->priority }}</td>
                                    <td>
                                        <input type="checkbox" {{ $item->status == '1' ? 'checked' : ' ' }}>
                                    </td>
                                    <td>
                                        <a href="{{ url('subcategory-edit/' . $item->id) }}"
                                            class="badge btn btn-primary">Edit</a>
                                        <a href="{{ url('subcategory-delete/' . $item->id) }}"
                                            class="badge btn btn-danger">Delete</a>
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
