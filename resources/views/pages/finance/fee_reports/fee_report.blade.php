@extends('layouts.dashboard')
@section('title', 'Fee Report')
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
                        <li class="breadcrumb-item active">Fee Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-12">
                @include('common.alert')
                <form method="POST" action="{{ route('fee_report.accountant_report') }}" enctype="multipart/form-data"
                    class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Select Accountant <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="accountant_id" required>
                                            <option value="" selected disabled>--Select Accountant--</option>
                                            @foreach($accountants as $accountant)
                                                <option value="{{ $accountant->id }}">{{ $accountant->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('accountant_id') }}</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styles')

@endsection
@section('scripts')

@endsection
