@extends('layout.admin.app')

@push('js')
@endpush
@push('css')
@endpush

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="col-md-6">
                <form class="card" action="{{route ('student.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Add Student</h3>
                        <div class="row row-cards">
                

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amount">Address</label>
                                    <input id="" type="text" class="form-control" name="address"
                                        placeholder="Enter address" value="" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="due_date">Father name</label>
                                    <input id="#" type="text" class="form-control" name="father_name"
                                        placeholder="Enter father name" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="payment_date">Father phone</label>
                                    <input id="#" type="number" class="form-control" name="father_mobile"
                                        placeholder="Enter father mobile" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Mobile number</label>
                                    <input id="#" type="number" class="form-control" name="mobile_no"
                                        placeholder="Enter mobile number" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Scholar number</label>
                                    <input id="#" type="number" class="form-control" name="scholar_no"
                                        placeholder="Enter scholar number" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Email</label>
                                    <input id="#" type="email" class="form-control" name="email"
                                        placeholder="Enter your email" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Password</label>
                                    <input id="#" type="password" class="form-control" name="password"
                                        placeholder="Enter your password" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fine">Gender</label>
                                    <input id="#" type="text" class="form-control" name="gender"
                                        placeholder="Enter your gender" value="" required>
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