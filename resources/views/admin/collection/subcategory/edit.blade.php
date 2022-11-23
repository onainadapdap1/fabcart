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
                    <span>Sub-category</span>
                    {{-- <a href="{{ url('group-add') }}" class="btn btn-primary py-2">ADD Groups</a> --}}
                    <h6 class="mb-0">
                        <a href="{{ url('/sub-category') }}" data-toggle="modal" data-target="#SubcategoryMODAL"
                            class="btn btn-primary text-white py-2 float-right">Back</a>
                    </h6>
                </h6>
            </div>
        </div>
        <!-- Heading -->

        {{-- body  --}}
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ url('sub-category-update/' . $subcategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category Id (Name)</label>
                                        <select name="category_id" class="form-control">
                                            <option value="{{ $subcategory->category_id }}">{{ $subcategory->category->name }}</option>
                                            @foreach ($category as $cat_item)
                                                <option value="{{ $cat_item->id }}">{{ $cat_item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $subcategory->name }}"
                                            class="form-control" placeholder="enter name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea rows="4" name="description" type="text" class="form-control" placeholder="enter description">{{ $subcategory->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="subcategory_image" class="form-control">
                                        <img src="{{ asset('uploads/subcategory/' . $subcategory->image) }}" width="100px"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Priority</label>
                                        <input type="number" name="priority" value="{{ $subcategory->priority }}"
                                            class="form-control" placeholder="enter priority">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" name="status"
                                            value="{{ $subcategory->status == true ? 'checked' : ' ' }}" class="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- end-body --}}
    </div>
@endsection
