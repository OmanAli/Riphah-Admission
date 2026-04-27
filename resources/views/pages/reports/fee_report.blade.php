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
                                        <th>Fee Receipt</th>
                                        <th>Payment Method</th>
                                        <th>Submitted By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if (isset($applications))
                                        @foreach ($applications as $key => $application) --}}
                                            <tr>

                                                <td>9365</td>
                                                <td>Candidate-1</td>
                                                <td>Doctor of Physical Therapy (DPT) LHR</td>
                                                <td>2017-05-08 00:00:00</td>
                                                <td><span class="badge bg-success">SUBMITTED</span></td>
                                                <td><span class="badge bg-success">SUBMITTED</span></td>
                                                <td><span class="badge bg-info">SUBMITTED</span></td>
                                                <td><span class="badge bg-info">CASH</span></td>
                                                <td><span class="badge bg-warning">Accountant-1</span></td>
                                                

                                            </tr>
                                        {{-- @endforeach

                                    @endif --}}
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
