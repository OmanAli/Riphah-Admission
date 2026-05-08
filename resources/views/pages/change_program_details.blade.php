@extends('layouts.dashboard')
@section('title', 'Change Student Program')
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
                        <li class="breadcrumb-item active">Change Student Program</li>
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
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">

                                <tr>
                                    <th>OAS ID</th>
                                    <td>{{ $application->oas_id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Father Name</th>
                                    <td>{{ $application->father_name }}</td>
                                </tr>
                                <tr>
                                    <th>Program Preference 1</th>
                                    <td>{{ $application->preferenceOne->program_name ?? 'Not Specified' }}</td>
                                </tr>
                                <tr>
                                    <th>Program Preference 2</th>
                                    <td>{{ $application->preferenceTwo->program_name ?? 'Not Specified' }}</td>
                                </tr>
                                <tr>
                                    <th>Program Preference 3</th>
                                    <td>{{ $application->preferenceThree->program_name ?? 'Not Specified' }}</td>
                                </tr>
                                <tr>
                                    <th>Program Preference 4</th>
                                    <td>{{ $application->preferenceFour->program_name ?? 'Not Specified' }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                @include('common.alert')
                <form method="POST" action="{{route('application_program_add')}}" enctype="multipart/form-data"
                    class="form theme-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Offered Programs<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="hidden" name="oas_id" value="{{ $application->oas_id }}">
                                        <select name="offered_program" id="offered_program" class="form-control" required>
                                            <option value="" selected disabled>--Select Program--</option>
                                            @foreach ($programs as $program)
                                                <option value="{{ $program->id }}">{{ $program->program_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{ $errors->first('offered_program') }}</span>
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
@endsection

@section('styles')

@endsection
@section('scripts')

@endsection
