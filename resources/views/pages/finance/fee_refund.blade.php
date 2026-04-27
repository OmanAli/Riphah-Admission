@extends('layouts.dashboard')
@section('title', 'Fee Refund')
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
                        <li class="breadcrumb-item active">Fee Refund</li>
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
                                        <th>Admitted Program</th>
                                        <th>Doc No</th>
                                        <th>Amount Paid</th>
                                        <th>Refund Status</th>
                                        <th>Refund Reason</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $application)
                                            <tr>
                                                <td>{{ $application->id }}</td>
                                                <td>{{ $application->oas_id }}</td>
                                                <td>{{ $application->program1_name }}</td>
                                                <td>--</td>
                                                <td>{{ $application->applicable_fee }}</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>

                                                    <form action="" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Refund</button>
                                                            </div>
                                                        </div>
                                                    </form>





                                                </td>
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
