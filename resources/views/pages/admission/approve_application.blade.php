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
            {{-- <div class="col-md-12 text-end">
                <button class="btn btn-primary btn-sm">
                    PUBLISH OFFER LETTER
                </button>
                <button class="btn btn-warning btn-sm">
                    UNPUBLISH OFFER LETTER
                </button>
            </div> --}}
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
                                                <td>

                                                    @if ($application->offerletter && $application->offerletter->status == 1)
                                                        <a href="{{ route('download_offer_letter', ['id' => $application->id]) }}"
                                                            class="btn btn-success btn-sm"><i
                                                                class="fa fa-download "></i></a>
                                                    @else
                                                        @if ($application->offerletter && $application->offerletter->status == 2)
                                                            <span class="badge bg-secondary">Un Published</span>
                                                        @endif
                                                        @if (!$application->offerletter)
                                                            <span class="badge bg-warning">Not Published</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $application->created_at->format('Y-m-d') }}</td>

                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" class="text-dark" data-bs-toggle="dropdown">
                                                            &#8942;
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            @if (!$application->offerletter)
                                                                <li>
                                                                    <a class="btn btn-primary btn-sm dropdown-item"
                                                                        type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#offerletterModal{{ $key }}"
                                                                        style="color: white">
                                                                        PUBLISH OFFER LETTER
                                                                    </a>

                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a class="btn btn-danger btn-sm dropdown-item"
                                                                    href="{{ route('un_publish_offer_letter', [$application->id]) }}"
                                                                    style="color: white">
                                                                    UNPUBLISH OFFER LETTER
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal fade" id="offerletterModal{{ $key }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Publish Offer Letter
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('publish_offer_letter') }}">
                                                                    <div class="modal-body">

                                                                        @csrf
                                                                        <input type="hidden" name="application_id"
                                                                            value="{{ $application->id }}">
                                                                        <div class="mb-3">
                                                                            <label for="">Fee Submission
                                                                                Date <span
                                                                                    style="color: red">*</span></label>
                                                                            <input type="date" class="form-control"
                                                                                name="date">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="">Offer
                                                                                Letter<span
                                                                                    style="color: red">*</span></label>
                                                                            <select name="offer_letter" id=""
                                                                                class="form-control">
                                                                                <option value="" selected disabled>
                                                                                    Select Offer Letter
                                                                                </option>
                                                                                @foreach ($letters as $letter)
                                                                                    <option value="{{ $letter->id }}">
                                                                                        {{ $letter->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">

                                                                        <button type="submit" class="btn btn-info"
                                                                            name="action" value="preview">Preview</button>
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            name="action" value="submit">Submit</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
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
