@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Dashboard</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Manage Applications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-md-12">
                <div class="card">
                    <!-- card body start -->
                    <div class="card-body">
                        @include('common.alert')
                        <ul class="pb-5">
                            @if (isset($latestFeeStructures))
                                <ol>
                                    @foreach ($latestFeeStructures as $key => $feeStructure)
                                        <li class="font-size-14 pb-1">
                                            Please check Fee Structure of
                                            <strong>{{ $feeStructure->campus_name }}</strong>
                                            campus for your selected program on the Final Fee Operation.
                                            <a href="{{ $feeStructure->link }}" target="_blank"
                                                class="text-underline-hover"><i class="fa fa-info-circle"></i> Fee Structure
                                                {{ $feeStructure->campus_name }}</a>
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </ul>
                        <div class="row pb-2">
                            <div class="col-md-3">
                                <h3>APPLY NOW <span>-></span></h3>
                            </div>
                            <div class="col-md-9">
                                <a href="{{ route('application.mbbs_bds_form') }}"
                                    class="btn btn-success text-white float-end {{ $settings->mbbs_admission_status == 0 ? 'disabled' : '' }}">
                                    +
                                    MBBS/BDS</a>
                                <a type="button" href="{{ route('application.german_course_form') }}"
                                    class="btn btn-success text-white float-end" style="margin: 0 10px 0 0"> + GERMAN
                                    LANGUAGE</a>
                                <a href="{{ route('application.form') }}" class="btn btn-success text-white float-end"
                                    style="margin: 0 10px 0 0"> +
                                    BS/MS/PHD/DIPLOMA/CERTIFICATE</a>

                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                        <th>Processing Fee Challan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $item)
                                            <tr>

                                                <td>{{ $item->oas_id }}</td>
                                                <td>{{ $item->first_name . ' ' . $item->last_name }}</td>
                                                <td>{{ strtoupper($item->preferenceOne->program_name ?? $item->program) }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary">{{ $item->status_label }}</span>
                                                </td>
                                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    @if ($item->application_type == 'General')
                                                        @if($item->application_status==0)

                                                        <a href="{{ route('application.form_edit', ['id' => $item->oas_id]) }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                        @endif
                                                        <a href="{{ route('oas.preview_submitted_application', ['oasID' => base64_encode($item->oas_id)]) }}" class="btn btn-info btn-sm"><i
                                                                class="fa fa-eye"></i></a>
                                                    @else
                                                        <a href="#" class="btn btn-primary btn-sm"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="#" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->feeReceipt==null)
                                                    <a href="{{ route('application.download_challan', ['oasID' => $item->oas_id]) }}"
                                                        class="btn btn-success btn-sm"><i class="fa fa-download "></i></a>
                                                    @else
                                                        <span class="badge bg-success">PAID</span>
                                                    @endif
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

@section('script')
@endsection
