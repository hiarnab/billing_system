@extends('layout.admin.app')

@push('js')
@endpush
@push('css')
@endpush

@section('content')
    <div class="page-wrapper">
        <!-- page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Settings
                        </div>
                        <h2 class="page-title">
                            Course
                        </h2>
                    </div>
                    <!-- Page title actions -->

                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="col-8">
                    <form class="card" action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title">Add User</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">User Name</label>
                                        <input id="inputName" type="text" class="form-control" name="name"
                                            placeholder="Enter Name" value="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputNumber">Mobile Number</label>
                                        <input id="inputNumber" type="number" class="form-control" name="phone"
                                            placeholder="Enter mobile number" value="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input id="inputEmail" type="email" class="form-control" name="email"
                                            placeholder="Enter Email" value="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input id="inputPassword" type="password" class="form-control" name="password"
                                            placeholder="Enter password" value="" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="userType">User Type</label>
                                        <select id="userType" class="form-control" name="role_id" required>
                                            <option value="">Select user type</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-left card-footer">
                            <a class="btn btn-secondary" href="{{ route('course.index') }}">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-12" style="margin-top:75px;">

        </div> -->
@endsection
