@extends('layouts.dashboard')
@section('title', 'Fee Challan')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Welcome</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Fee Challan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-12">
                @include('common.alert')
                <form method="POST" action="#" enctype="multipart/form-data" class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Enter OAS ID <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="{{ old('oas_id') }}"
                                            name="oas_id" autofocus required>
                                        <span class="text-danger">{{ $errors->first('oas_id') }}</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>OAS ID</th>
                                        <th>Program</th>
                                        <th>Admission Fee</th>
                                        <th>University Registration Fee</th>
                                        <th>Council Fee</th>
                                        <th>College Security</th>
                                        <th>Student Service Charges</th>
                                        <th>University ID Card</th>
                                        <th>Tuition Fee</th>
                                        <th>Examination Fee</th>
                                        <th>Semester Enrollment Fee</th>
                                        <th>Total Fee</th>
                                        <th>Income Tax</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($fee))
                                        @foreach ($fee as $key => $item)
                                            <tr>

                                                <td> {{ $item->id }}</td>
                                                <td>{{ $item->oas_program_id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->admissionFee }}</td>
                                                <td>{{ $item->registrationFee }}</td>
                                                <td>{{ $item->pharmCouncilFee }}</td>
                                                <td>{{ $item->collegeSecurityFee }}</td>
                                                <td>{{ $item->service_charge }}</td>
                                                <td>{{ $item->idCardFee }}</td>
                                                <td>{{ $item->tuitionFee }}</td>
                                                <td>{{ $item->examinationFee }}</td>
                                                <td>{{ $item->semesterEnrollFee }}</td>
                                                <td>{{ $item->total_fee }}</td>
                                                <td>{{ $item->taxFee }}</td>
                                                <td>{{ $item->net_fee }}</td>
                                                <td>
                                                    @if ($offerLetterCheck && $offerLetterCheck->program_id == $item->oas_program_id)
                                                        <span class="text-success">Offer Letter Issued</span>
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if (isset($fee))
                            <div class="row text-center mt-3 mb-3">
                                <div class="col-md-12">
                                    <p>Action (Note: If submitted again previous challan with be overwritten)</p>
                                </div>
                            </div>
                            @if (!isset($offerLetterCheck))
                                <div class="row text-center mt-3 mb-3">
                                    <span class="text-danger">
                                        You cannot generate a challan for this application until the offer letter is
                                        issued.
                                    </span>
                                </div>
                            @else
                                <form action="{{ route('create_fee_challan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="oas_id" value="{{ $oasID }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Select Program</label>
                                            <select name="program_id" id="program_id" class="form-control" required>
                                                <option value="" selected disabled>--Select Program--</option>
                                                @foreach ($programs as $program)
                                                    <option value="{{ $program->id }}">{{ $program->program_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Select Bank</label>
                                            <select name="sap_prg_id" id="sap_prg_id" class="form-control" required>
                                                <option value="" selected disabled>--Select Bank--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">No Of Installments</label>
                                            <select name="installments" id="" class="form-control" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Due Date</label>
                                            <input type="date" class="form-control" name="due_date" required>
                                        </div>

                                        <div class="col-md-2" style="margin: 28px 0 0 0;">

                                            <button class="btn btn-primary">Create Challan</button>

                                        </div>
                                    </div>
                                </form>
                            @endif
                            <hr>
                            <h5>Created Challan Info</h5>
                            <div class="table-responsive mt-5">
                                <table class="display mt-5" id="basic-9" style="font-size: 14px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>OAS ID</th>
                                            <th>Doc No</th>
                                            <th>Total Amount</th>
                                            <th>Installments</th>
                                            <th>Amount Due</th>
                                            <th>Remaining Amount</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($challans))
                                            @foreach ($challans as $key => $challan)
                                                <tr>

                                                    <td> {{ $challan->id }}</td>
                                                    <td>{{ $challan->oas_id }}</td>
                                                    <td>{{ $challan->doc_id }}</td>
                                                    <td>{{ $challan->total_amount }}</td>
                                                    <td>{{ $challan->installments }}</td>
                                                    <td>{{ $challan->due_amount }}</td>
                                                    <td>{{ $challan->remaining_amount }}</td>
                                                    <td>{{ $challan->expiry_date }}</td>
                                                    <td>--</td>
                                                    <td><a href="{{ route('create_fee_challan', $challan->oas_id) }}"
                                                            class="btn btn-info btn-sm">View Challan</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection
@section('scripts')
    <script>
        $('#program_id').on('change', function() {
            let programId = $(this).val();

            $('#sap_prg_id').html('<option>Loading...</option>');

            $.ajax({
                url: '/get-bank-by-program/' + programId,
                type: 'GET',
                success: function(data) {
                    let options = '<option value="" disabled selected>--Select Bank--</option>';

                    if (data.length > 0) {
                        data.forEach(function(bank) {
                            options += `<option value="${bank.id}">${bank.name}</option>`;
                        });
                    } else {
                        options += `<option disabled>No Bank Found</option>`;
                    }

                    $('#sap_prg_id').html(options);
                }
            });
        });
    </script>
@endsection
