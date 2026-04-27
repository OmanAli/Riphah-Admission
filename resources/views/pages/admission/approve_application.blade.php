@extends('layouts.dashboard')
@section('title', 'Approved Application')
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
                        <li class="breadcrumb-item active">Approved Application</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-12 text-end">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#offerletterModal">
                    PUBLISH OFFER LETTER
                </button>
                <button class="btn btn-warning btn-sm">
                    UNPUBLISH OFFER LETTER
                </button>
            </div>
        </div>

        <div class="modal fade" id="offerletterModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Publish Offer Letter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="">Fee Submission Date <span style="color: red">*</span></label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Offer Letter<span style="color: red">*</span></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Select Offer Letter</option>
                                    <option value="">Pharm-D Islamabad</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-info">Preview</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>

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
                                        <th>Full Name</th>
                                        <th>Father Name</th>
                                        <th>Program Type</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                        <th>Published Offer Letter</th>
                                        <th>Submission Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $application)
                                            <tr>

                                                <td>{{ $application->oas_id }}</td>
                                                <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                                <td>{{ $application->father_name }}</td>
                                                <td>
                                                    {{-- {{ $application->level == 'UG' ? 'Undergraduate' : ($application->level == 'PG' ? 'Postgraduate' : ($application->level == 'D' ? 'Diploma/Certificate' : $application->level)) }} --}}
                                                </td>
                                                <td>{{ strtoupper($application->preferenceOne->program_name ?? $application->program) }}
                                                </td>

                                                <td>-</td>
                                                <td>-</td>
                                                <td>{{ $application->created_at->format('Y-m-d') }}</td>

                                                <td>-</td>

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
