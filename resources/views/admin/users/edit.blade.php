@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                    <span>/</span>
                    <span>Registered Users</span>
                    <span>/</span>
                    <span>Edit</span>
                </h4>
            </div>
        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">
            <!--Grid column-->
            <div class="col-md-12">
                <!--Card-->
                <div class="card">
                    <!--Card content-->
                    <div class="card-body">
                        <form action="{{ url('role-update/' . $user_roles->id) }}" method="POST">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h4>Current Role : {{ $user_roles->role_as }}</h4>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{ $user_roles->name }}">
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control" disabled value="{{ $user_roles->email }}">
                            </div><br>
                            <div class="form-group">
                                <select name="roles" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="">Default</option>
                                    <option value="admin">Admin</option>
                                    <option value="vendor">Vendor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.Card-->
            </div>
            <!--Grid column-->
        </div>
    </div>
@endsection
