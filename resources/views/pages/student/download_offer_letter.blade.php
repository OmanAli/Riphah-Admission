@extends('layouts.dashboard')
@section('title', 'Offer Letter')
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
                        <li class="breadcrumb-item active">Offer Letter</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="{{ route('home') }}" class="btn btn-primary btn-sm">
                    View Applications
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($offerLetters))
                                        @foreach ($offerLetters as $key => $item)
                                            <tr>
                                                <td>{{ $item->application->oas_id }}</td>
                                                <td>{{ $item->application->first_name . ' ' . $item->application->last_name }}
                                                </td>
                                                <td>{{ strtoupper($item->offerletter->oas_prg->program_name) }}
                                                </td>
                                                <td>
                                                    --
                                                </td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('download_offer_letter', ['id' => $item->application_id]) }}"
                                                        class="btn btn-success btn-sm"><i class="fa fa-download "></i></a>
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
