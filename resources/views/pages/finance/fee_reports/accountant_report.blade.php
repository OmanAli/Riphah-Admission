@extends('layouts.dashboard')
@section('title', 'Accountant Report')
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
                        <li class="breadcrumb-item active">Accountant Report</li>
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
                            <div class="col-md-12 d-flex justify-content-end">
                            </div>
                        </div>
                        @include('common.alert')
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th>Created At</th>
                                        <th>Fee Status</th>
                                        <th>Download</th>
                                        <th>Payment Method</th>
                                        <th>Submitted By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($receipts))
                                        @foreach ($receipts as $key => $receipt)
                                            <tr>
                                                <td>{{ $receipt->oas_id }}</td>
                                                <td>{{ $receipt->name }}</td>
                                                <td>{{ $receipt->program1_name }}</td>
                                                <td>{{ $receipt->created_at }}</td>
                                                <td><span class="badge bg-success">Submitted</span></td>
                                                <td><span class="badge bg-success">Submitted</span></td>
                                                <td><span class="badge bg-success">Cash</span></td>
                                                <td>{{ $receipt->created_by_name }}</td>
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
