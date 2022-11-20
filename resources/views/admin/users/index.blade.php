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
                        <h5>
                            @php
                                $user_total = 0;
                            @endphp
                            @foreach ($users as $item)
                                @php
                                    if ($item->isUserOnline()) {
                                        $user_total += 1;
                                    }
                                @endphp
                            @endforeach
                            User Total : {{ $users->total() }}
                            <br>
                            Total User Online :{{ $user_total }}
                        </h5>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Online/Offline</th>
                                    <th class="text-center">isBan/unBan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach ($users as $item)
                                <tbody>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role_as }}</td>
                                    <td>
                                        @if ($item->isUserOnline())
                                            <label class="py-2 px-3 badge btn-success">Online</label>
                                        @else
                                            <label class="py-2 px-3 badge btn-warning">Offline</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->isban == '0')
                                            <label class="py-2 px-3 badge btn-primary">Not banned</label>
                                        @elseif($item->isban == '1')
                                            <label class="py-2 px-3 badge btn-danger">Banned</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('role-edit/' . $item->id) }}"
                                            class="badge badge-pill btn-primary px-3 py-2">EDIT</a>
                                        <a href="" class="badge badge-pill btn-danger px-3 py-2">DELETE</a>
                                    </td>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
                <!--/.Card-->
            </div>
            <!--Grid column-->
        </div>
    </div>
@endsection
