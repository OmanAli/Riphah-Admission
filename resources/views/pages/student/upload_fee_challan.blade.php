@extends('layouts.dashboard')
@section('title', 'Upload Fee Challan')
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
                        <li class="breadcrumb-item active">Upload Fee Challan</li>
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
                                        <th>Fee Status</th>
                                        <th>Upload Fee Challan Copy</th>
                                        <th>Comments</th>
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
                                                <td>
                                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#uploadModal{{ $key }}">
                                                        <i class="fa fa-upload"></i>
                                                    </a>
                                                    <div class="modal fade" id="uploadModal{{ $key }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('application.save_challan') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Upload File</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="oas_id"
                                                                            value="{{ $item->oas_id }}">

                                                                        <div class="mb-3">
                                                                            <label class="form-label">Select File</label>
                                                                            <input type="file" name="file"
                                                                                class="form-control"
                                                                                accept="image/*,application/pdf" required>
                                                                            <small class="text-muted">Allowed: Images &
                                                                                PDF</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Upload</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                --
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
