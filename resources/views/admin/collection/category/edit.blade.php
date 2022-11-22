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
                    <span>Update Category</span>
                </h6>
            </div>
        </div>
        <!-- Heading -->

        {{-- body --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{ url('category-update/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Group Id (Name)</label>
                                        <select name="group_id" class="form-control">
                                            <option value="{{ $category->group_id }}">{{ $category->group->name }}</option>
                                            @foreach ($group as $group_item)
                                            <option value="{{ $group_item->id }}">{{ $group_item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="enter name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea rows="4" name="description" type="text" class="form-control" placeholder="enter description">{{ $category->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="category_img" class="form-control">
                                        <img src="{{ asset('uploads/categoryimage/' . $category->image) }}" width="50px" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ICON</label>
                                        <input type="file" name="category_icon" class="form-control" >
                                        <img src="{{ asset('uploads/categoryicon/' . $category->icon) }}" width="50px" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }} >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
