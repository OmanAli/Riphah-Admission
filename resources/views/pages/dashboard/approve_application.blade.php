@extends('layouts.dashboard')
@section('title', 'Approve Application')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Welcome</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li> --}}
                        <li class="breadcrumb-item active">Your Search results are here!</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 d-flex justify-content-end">

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Father Name</th>
                                        <th>Program Name</th>
                                        <th>Campus</th>
                                        <th>Eligible Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($application))
                                        <tr>

                                            <td>{{ $application->oas_id }}</td>
                                            <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                            <td>{{ $application->father_name }}</td>
                                            <td>{{ strtoupper($application->preferenceOne->program_name ?? $application->level) }}
                                            </td>
                                            <td>{{ $application->appliedcampus->campus_name ?? $application->campus }}</td>
                                            <td>

                                                @if ($application->ok_for_admission == 0)
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($application->ok_for_admission == 1)
                                                    <span class="badge bg-success">Eligible</span>
                                                @elseif($application->ok_for_admission == 2)
                                                    <span class="badge bg-danger">Not Eligible</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($application->application_status == 0)
                                                    <a type="button" data-bs-toggle="modal"
                                                        data-bs-target="#approveModal_{{ $application->oas_id }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                @elseif($application->application_status == 1)
                                                    <span class="badge bg-success" style="text-wrap: auto;">
                                                        Approved for {{ $application->application_program ?? '-' }}
                                                    </span>
                                                @elseif($application->application_status == 2)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                                <div class="modal fade" id="approveModal_{{ $application->oas_id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Approve Program</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <form method="post"
                                                                action="{{ route('oas.approve_application') }}">
                                                                @csrf
                                                                <input type="hidden" name="oas_id"
                                                                    value="{{ $application->oas_id }}">
                                                                <div class="modal-body">

                                                                    <div class="mb-3">
                                                                        <select name="program" class="form-control">

                                                                            @if (!empty($application->preferenceOne->program_name))
                                                                                <option
                                                                                    value="{{ $application->preferenceOne->program_name }}">
                                                                                    {{ strtoupper($application->preferenceOne->program_name) }}
                                                                                </option>
                                                                            @endif

                                                                            @if (!empty($application->preferenceTwo->program_name))
                                                                                <option
                                                                                    value="{{ $application->preferenceTwo->program_name }}">
                                                                                    {{ strtoupper($application->preferenceTwo->program_name) }}
                                                                                </option>
                                                                            @endif

                                                                            @if (!empty($application->preferenceThree->program_name))
                                                                                <option
                                                                                    value="{{ $application->preferenceThree->program_name }}">
                                                                                    {{ strtoupper($application->preferenceThree->program_name) }}
                                                                                </option>
                                                                            @endif

                                                                            @if (!empty($application->preferenceFour->program_name))
                                                                                <option
                                                                                    value="{{ $application->preferenceFour->program_name }}">
                                                                                    {{ strtoupper($application->preferenceFour->program_name) }}
                                                                                </option>
                                                                            @endif

                                                                            @if (empty($application->preferenceOne->program_name))
                                                                                <option value="{{ $application->level }}">
                                                                                    {{ strtoupper($application->level) }}
                                                                                </option>
                                                                            @endif

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Approve</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
