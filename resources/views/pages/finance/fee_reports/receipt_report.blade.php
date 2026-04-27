@extends('layouts.dashboard')
@section('title', 'Receipt Report')
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
                        <li class="breadcrumb-item active">Receipt Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-12">
                @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                <form method="POST" action="{{ route('fee_report.receipt_report') }}" enctype="multipart/form-data"
                    class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Select Campus<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="campus_id" required>
                                            <option value="" selected disabled>--Select Campus--</option>
                                            @foreach($campus as $item)
                                                <option value="{{ $item->id }}">{{ $item->campus_name }}</option>
                                            @endforeach
                                        </select>
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
                        @include('common.alert')
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>OAS</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>Program 1</th>
                                        <th>Program 2</th>
                                        <th>Program 3</th>
                                        <th>Program 4</th>
                                        <th>Applicable Fee</th>
                                        <th>Cash Received</th>
                                        <th>Created By</th>
                                        <th>Campus</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($receipts))
                                        @foreach ($receipts as $key => $receipt)
                                            <tr>
                                                <td>{{ $receipt->oas_id }}</td>
                                                <td>{{ $receipt->name }}</td>
                                                <td>{{ $receipt->father_name }}</td>
                                                <td>{{ strtoupper($receipt->program1_name) }}</td>
                                                <td>{{ strtoupper($receipt->program2_name) }}</td>
                                                <td>{{ strtoupper($receipt->program3_name) }}</td>
                                                <td>{{ strtoupper($receipt->program4_name) }}</td>
                                                <td>{{ $receipt->applicable_fee }}</td>
                                                <td>{{ $receipt->cash_received }}</td>
                                                <td>{{ $receipt->created_by_name }}</td>
                                                <td>{{ $receipt->campus }}</td>
                                                <td>{{ $receipt->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
