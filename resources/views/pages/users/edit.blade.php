@extends('layouts.dashboard')
@section('title', 'Add SAP Program')
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
                        <li class="breadcrumb-item active">SAP Programs</li>
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
                                <h3>Create SAP Program</h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a href="{{ route('sap_program.index') }}" class="btn btn-primary">View SAP Programs</a>
                            </div>
                        </div>
                        <hr>
                        @include('common.alert')

                        <form action="{{ route('sap_program.update', $program->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_region<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_region"
                                            value="{{ old('sap_region', $program->sap_region) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_region_id<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_region_id"
                                            value="{{ old('sap_region_id', $program->sap_region_id) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_campus_name<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_campus_name"
                                            value="{{ old('sap_campus_name', $program->sap_campus_name) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_campus_id<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_campus_id"
                                            value="{{ old('sap_campus_id', $program->sap_campus_id) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_institute_name<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_institute_name"
                                            value="{{ old('sap_institute_name', $program->sap_institute_name) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_institute_id<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_institute_id"
                                            value="{{ old('sap_institute_id', $program->sap_institute_id) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_program_name<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_program_name"
                                            value="{{ old('sap_program_name', $program->sap_program_name) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">sap_program_id<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="sap_program_id"
                                            value="{{ old('sap_program_id', $program->sap_program_id) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">profit_center<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="profit_center"
                                            value="{{ old('profit_center', $program->profit_center) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">fee_category<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="fee_category"
                                            value="{{ old('fee_category', $program->fee_category) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">oas_prg_name<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="oas_prg_name"
                                            value="{{ old('oas_prg_name', $program->oas_prg_name) }}" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">oas_prg_id<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="oas_prg_id"
                                            value="{{ old('oas_prg_id', $program->oas_prg_id) }}" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">bank_name<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="bank_name"
                                            value="{{ old('bank_name', $program->bank_name) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">bank_address<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="bank_address"
                                            value="{{ old('bank_address', $program->bank_address) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">bank_branch_code<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="bank_branch_code"
                                            value="{{ old('bank_branch_code', $program->bank_branch_code) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">bank_account_name<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="bank_account_name"
                                            value="{{ old('bank_account_name', $program->bank_account_name) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">bank_account_no<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="bank_account_no"
                                            value="{{ old('bank_account_no', $program->bank_account_no) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">house_bank_id<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="house_bank_id"
                                            value="{{ old('house_bank_id', $program->house_bank_id) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">company_code<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="company_code"
                                            value="{{ old('company_code', $program->company_code) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">customer_code<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="customer_code"
                                            value="{{ old('customer_code', $program->customer_code) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">hk_tid<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="hk_tid"
                                            value="{{ old('hk_tid', $program->hk_tid) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">bank_gl<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="bank_gl"
                                            value="{{ old('bank_gl', $program->bank_gl) }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">is_adm_challan<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="is_adm_challan"
                                            value="{{ old('is_adm_challan', $program->is_adm_challan) }}" required>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-3" style="float: right">Update</button>
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
