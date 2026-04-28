@extends('layouts.dashboard')
@section('title', 'Add Final Fee')
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
                        <li class="breadcrumb-item active">Final Fee</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6 d-flex justify-content-start">
                                <h3>Create Final Fee</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('finalfee.view') }}" class="btn btn-primary">View Final Fee</a>
                            </div>
                        </div>
                        <hr>
                        @include('common.alert')

                        <form action="{{ route('finalfee.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Final Fee Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="final_fee_name" class="form-label">Final Fee Name <span
                                                style="color: red">*</span></label>
                                        <select name="oas_program_id" id="oas_program_id" class="form-control">
                                            <option value="" selected disabled>--Final Fee Name--</option>
                                            @foreach ($programs as $program)
                                                <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                  <!-- Processing Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="processing_fee" class="form-label">Processing Fee (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="processing_fee"
                                            name="processing_fee" required>
                                    </div>
                                </div>
                                <!-- Admission Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="admission_fee" class="form-label">Admission Fee (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="admission_fee"
                                            name="admission_fee" required>
                                    </div>
                                </div>

                                <!-- University Registration Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="registration_fee" class="form-label">University Registration Fee (₨)
                                            <span style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="registration_fee"
                                            name="registration_fee" required>
                                    </div>
                                </div>

                                <!-- Pharmacy Council Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pharm_council_fee" class="form-label">Pharmacy Council Fee (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="pharm_council_fee"
                                            name="pharm_council_fee" required>
                                    </div>
                                </div>

                                <!-- College Security -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="college_security_fee" class="form-label">College Security (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="college_security_fee"
                                            name="college_security_fee" required>
                                    </div>
                                </div>

                                <!-- University ID Card Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id_card_fee" class="form-label">University ID Card Fee (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="id_card_fee"
                                            name="id_card_fee" required>
                                    </div>
                                </div>

                                <!-- Credit Hours (no fee) -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="credit_hour" class="form-label">Credit Hours<span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="credit_hour"
                                            name="credit_hour" required>
                                    </div>
                                </div>

                                <!-- Per Credit Hour -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="per_credit_hour" class="form-label">Per Credit Hour (₨)<span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="per_credit_hour"
                                            name="per_credit_hour" required>
                                    </div>
                                </div>

                                <!-- Tuition Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tuition_fee" class="form-label">Tuition Fee (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="tuition_fee"
                                            name="tuition_fee" required>
                                    </div>
                                </div>

                                <!-- Examination Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="examination_fee" class="form-label">Examination Fee (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="examination_fee"
                                            name="examination_fee" required>
                                    </div>
                                </div>

                                <!-- Semester Enrollment Fee -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="semester_enroll_fee" class="form-label">Semester Enrollment Fee
                                            (₨) <span style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control"
                                            id="semester_enroll_fee" name="semester_enroll_fee" required>
                                    </div>
                                </div>

                                <!-- Student Services Charges -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="service_charge" class="form-label">Student Services Charges
                                            (₨)</label>
                                        <input type="number" step="0.01" class="form-control" id="service_charge"
                                            name="service_charge">
                                    </div>
                                </div>

                                <!-- Withholding Tax -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tax_fee" class="form-label">Withholding Tax (₨) <span
                                                style="color: red">*</span></label>
                                        <input type="number" step="0.01" class="form-control" id="tax_fee"
                                            name="tax_fee" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3" style="float: right">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection
@section('scripts')

@endsection
