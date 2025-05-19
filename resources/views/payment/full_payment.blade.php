@extends('layout.admin.app')

@push('css')
    <style>
        .payment_title {
            font-size: 36px;
            border-bottom: 1px solid gray;
            color: black;
            margin: 50px 10px 30px 20px;
            font-weight: 600;
            font-family:

        }
        .amount {
            width: 100%;
            height: 40px;
            border: 1px solid grey;
            padding-inline: 5px;
            margin: 20px 0px;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .form-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-control,
        .form-select {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #206bc4;
            box-shadow: none;
        }
    </style>
@endpush

@section('content')
    <div class="page-wrapper">
        <div class="payment_title ">
            Make Payment In Full
        </div>
        <div class="col-12 col-md-6 col-lg-6 mx-auto">
            <div class="amount">
                Pay Amount (Rs):{{ $admission_fees->amount }}
            </div>
            <form>

                <!-- Discount Field with Button & Gap -->
                <div class="mb-4">
                    <label class="form-label">Discount</label>
                    <div class="d-flex">
                        <input type="text" class="form-control" placeholder="Enter discount">
                        <button class="btn btn-outline-secondary ms-2" type="button">Apply</button>
                    </div>
                </div>

                <!-- Payment Method Dropdown -->
                <div class="mb-4">
                    <label class="form-label">Select Payment Method</label>
                    <select class="form-select">
                        <option value="select"> Select Option</option>
                        <option value="cash">Cash</option>
                        <option value="online">Online</option>
                    </select>
                </div>

                <!-- Date Field -->
                <div class="mb-4">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control">
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                    <button type="button" class="btn btn-outline-danger">Cancel</button>
                </div>

            </form>
        </div>

    </div>
@endsection

@push('js')
@endpush
