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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('common.alert')
                        <h3>Accountant Report</h3>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2 text-end"><label for="">Accountant Name</label></div>
                            <div class="col-md-6">
                                <form action="{{ route('report.fee_report_accountant') }}" method="post">
                                    @csrf
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="" selected disabled>- Select Accountant -</option>
                                        <option value="UG">
                                            Accountant-1</option>
                                        <option value="PG">
                                            Accountant-2</option>
                                        <option value="D">
                                            Accountant-3
                                        </option>
                                        <option value="Ph.D">
                                            Accountant-4</option>
                                    </select>

                                    <div class="card-footer text-start">
                                        <div class="col-sm-12 text-end">
                                            <button class="btn btn-primary" type="submit">Submit</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4"></div>

                        </div>

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
