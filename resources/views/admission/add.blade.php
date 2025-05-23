@extends('layout.admin.app')

@push('js')
@endpush
@push('css')
{{-- <style>
     .icon {
            cursor: pointer;
            font-size: 20px;
            color: #007bff;
            margin-right: 50px;
            margin-top:20px;
        }
        .icon.remove {
            color: #dc3545; /* Red color for the remove icon */
        }
</style> --}}
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
                        Admission
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('package.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currntColor" stroke-width="2" stroke-linecap="round"
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
                <form class="card" action="{{ route('admission.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add Admission</h3>
                        <div class="row row-cards">

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">Select Student</div>
                                <select class="form-select col-md-6" name="student_id" id="course">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">Select Course</div>
                                <select class="form-select col-md-6" name="course_id" id="course" onchange="getPackagesForCourse(this.value)">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">Select Package</div>
                                <select class="form-select col-md-6" name="package_id" id="package" onchange="getPackageDetails(this.value)">
                                    <option value="">Select Package</option>
                                    @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <br>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">GST</div>
                                <input type="text" class="form-control" id="gst" name="gst" readonly>
                            </div>
                            <!-- <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="gst">GST (if any)</label>
                                    <input id="gst" type="number" class="form-control" name="gst" onchange="updatePrice()" placeholder="Enter GST if applicable" value="" required>
                                </div>
                            </div> -->
                            <br>

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">Amount</div>
                                <input type="text" class="form-control" id="amount" name="amount" readonly>
                            </div>
                            <!-- <div class="form-row col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input id="net_price" class="form-control" name="amount">
                                </div>
                            </div> -->

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">Total</div>
                                <input type="text" class="form-control" id="total" name="total" readonly>
                            </div>

                            <!-- <div class="form-row col-md-6">
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input id="net_price" class="form-control" name="total">
                                </div>
                            </div> -->

                            <div class="form-row col-md-6">
                                <div class="form-group">
                                    <label for="grand_total">Grand Total</label>
                                    <input id="grand_total" class="form-control" name="grand_total">
                                </div>
                            </div>

                            <br>
                            <hr>

                            <!-- <div class="container">
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                <div id="input-fields"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="text-left card-footer">
                        <button type="submit" id="b_tn" class="btn btn-primary">Confirm Admission</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- <div class="col-12" style="margin-top:75px;">

        </div> -->
@endsection

@push('js')
<script>
    function getPackagesForCourse(courseId) {
        if (courseId) {
            // alert(courseId);
            fetch(`/get-package-by-course/${courseId}`)
                .then(response => response.json())
                .then(data => {
                    const packageSelect = document.getElementById('package');
                    packageSelect.innerHTML = '<option value="">Select Package</option>';

                    if (data.length > 0) {
                        data.forEach(package => {
                            const option = document.createElement('option');
                            option.value = package.id;
                            option.textContent = package.name;
                            packageSelect.appendChild(option);
                        });
                    } else {
                        const option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'No packages available';
                        packageSelect.appendChild(option);
                    }
                })
                .catch(error => {
                    console.error('Error fetching packages:', error);
                });
        } else {
            document.getElementById('package').innerHTML = '<option value="">Select Package</option>';
        }
    }

    function getPackageDetails(packageId) {
        if (packageId) {
            // alert(packageId);
            fetch(`/get-package-details/${packageId}`)
                .then(response => response.json())
                .then(data => {
                    // Assuming the response contains the necessary fields: gst, amount, total
                    if (data) {
                        document.getElementById('gst').value = data.gst; 
                        document.getElementById('amount').value = data.base_price ;
                        document.getElementById('total').value = data.net_price  ;
                        document.getElementById('grand_total').value = data.net_price
                    }
                })
                .catch(error => {
                    console.error('Error fetching package details:', error);
                });
        } else {
            // Clear fields if no package is selected
            document.getElementById('gst').value = '';
            document.getElementById('amount').value = '';
            document.getElementById('total').value = '';
            document.getElementById('grand_total').value = '';
        }
    }
</script>
@endpush