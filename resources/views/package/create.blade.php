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
                            Package
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
                    <form class="card" action="{{ route('package.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title">Add Package</h3>
                            <div class="row row-cards">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">Select Course</div>
                                    <select class="form-select col-md-6" name="course_id" required>
                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="name">Package Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <i class="fa fa-plus-square" id="add-field" style="cursor: pointer;"
                                        aria-hidden="true"></i> Add Item
                                    <div id="input-fields" class="mt-3"></div>
                                </div>

                                <div class="col-md-4 offset-md-8 mt-3">
                                    <label><strong>Grand Total</strong></label>
                                    <input type="text" class="form-control" name="final_total_value" id="grand_total"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="text-left card-footer">
                            <button type="submit" id="submit_button" class="btn btn-primary">Submit</button>
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
        //  document.addEventListener('DOMContentLoaded', function () {
        function updatePrice() {
            var basePrice = parseFloat(document.getElementById('base_price').value) || 0;
            var gstPercentage = parseFloat(document.getElementById('gst').value) || 0;

            var gstAmount = (basePrice * gstPercentage) / 100;
            var netPrice = basePrice + gstAmount;

            // Update the net price input field
            document.getElementById('net_price').value = netPrice.toFixed(2);
        }
        //  });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const addButton = document.getElementById('add-field');
            const inputFieldsContainer = document.getElementById('input-fields');
            const submitButton = document.getElementById('submit_button');
            let inputFieldCount = 0;
            const maxFields = 5;

            function updateFinalTotal() {
                let grandTotal = 0;
                document.querySelectorAll('.total-value').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });
                document.getElementById('grand_total').value = grandTotal.toFixed(2);
            }

            function addInputGroup() {
                if (inputFieldCount >= maxFields) {
                    alert('You can only add up to 5 input field sets.');
                    return;
                }

                const row = document.createElement('div');
                row.className = 'row mb-3';

                row.innerHTML = `
                <div class="col-md-2">
                    <label>Billable Item</label>
                    <select class="form-control" name="billable1_item_id[]" required>
                        <option value="">Select</option>
                        @foreach ($billable_item as $item)
                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Net Price</label>
                    <input type="number" class="form-control net-price" name="net_price1[]" required>
                </div>
                <div class="col-md-2">
                    <label>GST (%)</label>
                    <input type="number" class="form-control gst" name="gst1[]" required>
                </div>
                <div class="col-md-2">
                    <label>Discount (%)</label>
                    <input type="number" class="form-control discount" name="discount_percentage1[]" required>
                </div>
                <div class="col-md-2">
                    <label>Total Value</label>
                    <input type="text" class="form-control total-value" name="total_value1[]" readonly>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <i class="fa fa-minus-square text-danger" style="cursor: pointer; font-size: 1.5rem;"></i>
                </div>
            `;

                const netPrice = row.querySelector('.net-price');
                const gst = row.querySelector('.gst');
                const discount = row.querySelector('.discount');
                const totalValue = row.querySelector('.total-value');
                const removeBtn = row.querySelector('.fa-minus-square');

                function calculateTotal() {
                    const np = parseFloat(netPrice.value) || 0;
                    const gstVal = parseFloat(gst.value) || 0;
                    const disc = parseFloat(discount.value) || 0;
                    const total = np + (np * gstVal / 100) - (np * disc / 100);
                    totalValue.value = total.toFixed(2);
                    updateFinalTotal();
                }

                netPrice.addEventListener('input', calculateTotal);
                gst.addEventListener('input', calculateTotal);
                discount.addEventListener('input', calculateTotal);

                removeBtn.addEventListener('click', () => {
                    row.remove();
                    inputFieldCount--;
                    updateFinalTotal();
                });

                inputFieldsContainer.appendChild(row);
                inputFieldCount++;
            }

            addButton.addEventListener('click', addInputGroup);

            // Add one set by default
            addInputGroup();

            // Prevent submission if no input sets are present
            document.querySelector('form').addEventListener('submit', function(e) {
                if (inputFieldCount === 0) {
                    e.preventDefault();
                    alert('Please add at least one item before submitting.');
                }
            });
        });
    </script>
@endpush
