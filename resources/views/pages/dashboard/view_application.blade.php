@extends('layouts.dashboard')
@section('title', 'View Application')
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
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
                                    <i class="fa fa-envelope"></i> EMAIL
                                </button>

                                <div class="modal fade" id="emailModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title">Mail</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <textarea id="editor"></textarea>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="table-layout: fixed; width: 100%;font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Program</th>
                                        <th>Branch</th>
                                        <th>Eligible Status</th>
                                        <th>Fee Status</th>
                                        <th>Ok for Admission</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($application))
                                        <tr>

                                            <td>{{ $application->oas_id }}</td>
                                            <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                            <td>{{ strtoupper($application->preferenceOne->program_name ?? $application->program) }}
                                            </td>
                                            <td>{{ $application->appliedcampus->campus_name ?? $application->campus }}</td>
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
                                                    <span class="badge bg-warning">--</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
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
                                                    <span class="badge bg-warning">--</span>
                                                @endif
                                            </td>
                                            {{-- <td>{{ $application->created_at->format('Y-m-d') }}</td> --}}
                                            <td>
                                                <a href="{{ route('oas.preview_submitted_application', ['oasID' => base64_encode($application->oas_id)]) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-eye"></i>View</a>
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
    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle(
                        'min-height',
                        '250px',
                        editor.editing.view.document.getRoot()
                    );
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
