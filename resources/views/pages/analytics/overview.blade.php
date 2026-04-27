@extends('layouts.dashboard')
@section('title', 'Overview')
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
                        <li class="breadcrumb-item active">Analytics Overview!</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('analysis.overview') }}" method="POST" id="filterForm">
                    @csrf
                    <select name="filter" class="form-control" onchange="this.form.submit()">
                        <option value="" disabled {{ empty($value) ? 'selected' : '' }}>Search For</option>
                        @foreach ($sessions as $session)
                            @php
                                $optionText = $session->session_type . ' ' . $session->session_year;
                            @endphp
                            <option value="{{ $optionText }}" {{ $optionText == $value ? 'selected' : '' }}>
                                {{ $optionText }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4" style="max-width: 400px; width: 100%;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-0"
                            style="font-size: 0.75rem; letter-spacing: 0.05rem;">
                            Total Applications
                        </h6>
                    </div>

                    <div class="card-body px-4 py-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-3 bg-gradient d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 60px; height: 60px;background-color:purple;">
                                <i class="fa fa-bar-chart text-white fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="text-muted mb-0 small text-uppercase fw-medium">Total</p>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="fw-bold mb-0 me-2">{{ $total_applications }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4" style="max-width: 400px; width: 100%;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-0"
                            style="font-size: 0.75rem; letter-spacing: 0.05rem;">
                            PROCESSING FEE SUBMITTED
                        </h6>
                    </div>

                    <div class="card-body px-4 py-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-3 bg-gradient d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 60px; height: 60px;background-color:#32C5D2;">
                                <i class="fa fa-credit-card text-white fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="text-muted mb-0 small text-uppercase fw-medium">Total</p>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="fw-bold mb-0 me-2">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4" style="max-width: 400px; width: 100%;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-0"
                            style="font-size: 0.75rem; letter-spacing: 0.05rem;">
                            ELIGIBLE
                        </h6>
                    </div>

                    <div class="card-body px-4 py-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-3 bg-primary bg-gradient d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-check-circle text-white fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="text-muted mb-0 small text-uppercase fw-medium">Total</p>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="fw-bold mb-0 me-2">{{ $eligible }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4" style="max-width: 400px; width: 100%;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-0"
                            style="font-size: 0.75rem; letter-spacing: 0.05rem;">
                            APPEARED IN TEST
                        </h6>
                    </div>

                    <div class="card-body px-4 py-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-3 bg-gradient d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 60px; height: 60px;background-color:#E7505A;">
                                <i class="fa fa-calendar-check-o text-white fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="text-muted mb-0 small text-uppercase fw-medium">Total</p>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="fw-bold mb-0 me-2">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4" style="max-width: 400px; width: 100%;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-0"
                            style="font-size: 0.75rem; letter-spacing: 0.05rem;">
                            OFFERED ADMISSION
                        </h6>
                    </div>

                    <div class="card-body px-4 py-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-3 bg-gradient d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 60px; height: 60px;background-color:purple;">
                                <i class="fa fa-file-text text-white fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="text-muted mb-0 small text-uppercase fw-medium">Total</p>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="fw-bold mb-0 me-2">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4" style="max-width: 400px; width: 100%;">
                    <div class="card-header bg-transparent border-0 pt-4 px-4">
                        <h6 class="text-uppercase text-muted fw-bold mb-0"
                            style="font-size: 0.75rem; letter-spacing: 0.05rem;">
                            FINAL FEE
                        </h6>
                    </div>

                    <div class="card-body px-4 py-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-3 bg-primary bg-gradient d-flex align-items-center justify-content-center shadow-sm"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-check-circle text-white fs-2"></i>
                            </div>
                            <div class="ms-4">
                                <p class="text-muted mb-0 small text-uppercase fw-medium">Total</p>
                                <div class="d-flex align-items-baseline">
                                    <h2 class="fw-bold mb-0 me-2">0</h2>
                                </div>
                            </div>
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
