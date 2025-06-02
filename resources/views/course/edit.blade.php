@extends('layout.admin.app')

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
                            <a href="{{ route('course.index') }}" class="btn btn-danger d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l6 6" />
                                    <path d="M5 12l6 -6" />
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
                    <form class="card" action="{{ route('course.update', $course_edit->id) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title">Edit Course</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Course Name</label>
                                        <input id="inputAddress" type="text" class="form-control" name="name"
                                            placeholder="Enter Name" value="{{ $course_edit->name }}" required>
                                        <input type="hidden" name="id" value="">
                                    </div>
                                </div>
                                <br>
                                {{-- <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Session of Course</label>
                                        <input id="inputAddress" type="text" class="form-control" name="session"
                                            placeholder="Enter session" value="{{ $course_edit->session }}" required>
                                    </div>
                                </div> --}}
                                <br>
                                {{-- <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="inputAddress">Course Duration</label>
                                        <input id="inputAddress" type="number" class="form-control" name="duration"
                                            placeholder="Enter Duration" value="{{ $course_edit->duration }}" required>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="text-left card-footer">
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
