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
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{route ('course.index')}}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="" />
                                    <path d="" />
                                </svg>
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="page-body">
    <div class="container-xl">
        <div class="col">
            <form class="card" action="{{route('course.store')}}" method="post">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Add Course</h3>
                    <div class="row row-cards">
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input id="inputAddress" type="text" class="form-control" name="name"
                                    placeholder="Enter Name" value="" required>
                            </div>
                        </div>
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Session</label>
                                <input id="inputAddress" type="text" class="form-control" name="session"
                                    placeholder="Enter session" value="" required>
                            </div>
                        </div>
                        <div class="form-row col-md-3">
                            <div class="form-group">
                                <label for="inputAddress">Duration</label>
                                <input id="inputAddress" type="number" class="form-control" name="duration"
                                    placeholder="Enter Duration" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
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