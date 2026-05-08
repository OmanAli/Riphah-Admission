@extends('layouts.dashboard')
@section('title', 'Set Eligibility')
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            {{-- <div class="col-md-12 d-flex justify-content-end">
                                <form action="{{ route('oas.save_eligibility') }}" class="d-flex align-items-center gap-2"
                                    method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $application->oas_id }}" name="oas_id">

                                    <select name="eligibility_status" class="form-control">
                                        <option value="">Select Status</option>

                                        <option value="1" {{ $application->ok_for_admission == 1 ? 'selected' : '' }}>
                                            Eligible
                                        </option>

                                        <option value="2" {{ $application->ok_for_admission == 2 ? 'selected' : '' }}>
                                            Not Eligible
                                        </option>

                                        <option value="0" {{ $application->ok_for_admission == 0 ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                    </select>

                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </form>
                            </div> --}}
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th>Date Of Application</th>
                                        <th>City</th>
                                        <th>Major Subjects</th>
                                        <th>Obtained Marks</th>
                                        <th>Total Marks</th>
                                        <th>%age</th>
                                        <th>College</th>
                                        <th>Passing Year</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($application))
                                        <tr>

                                            <td>{{ $application->oas_id }}</td>
                                            <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                            <td>{{ strtoupper($application->preferenceOne->program_name ?? $application->program) }}
                                            </td>
                                            <td>{{ $application->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                {{ $application->city }}
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                @if (!is_null($application->ok_for_admission))
                                                    @if ($application->ok_for_admission == 1)
                                                        <span class="badge bg-success">Eligible</span>
                                                    @elseif($application->ok_for_admission == 0)
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($application->ok_for_admission == 2)
                                                        <span class="badge bg-danger">Not Eligible</span>
                                                    @endif
                                                @else
                                                    <span class="badge bg-secondary">--</span>
                                                @endif
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
