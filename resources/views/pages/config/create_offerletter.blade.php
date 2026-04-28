@extends('layouts.dashboard')
@section('title', 'Offer Letter')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Offer Letter</h5>
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

    <div class="container-fluid">
        <div class="row text-end mb-2">
            {{-- <div class="col-sm-12">
                <a href="{{ route('configuration.programs') }}" class="btn btn-primary"><- GO BACK</a>
            </div> --}}
        </div>
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('offer_letter.store') }}" enctype="multipart/form-data"
                            class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label class="col-form-label">For Program<span
                                                        style="color:red">*</span></label>
                                                <select class="form-control" name="oas_program_id" required>
                                                    <option value="">Select Program</option>
                                                    @foreach ($programs as $program)
                                                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Name<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label">
                                                    Instructions<span style="color:red">*</span>
                                                </label>
                                                <textarea id="editor" class="form-control" name="instructions" rows="4"></textarea>
                                            </div>
                                            <div class="col-sm-12 mt-3 text-end">
                                                <button class="btn btn-primary" type="submit">SUBMIT</button>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>


    <script>
        let editorInstance;

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => console.error(error));
    </script>
@endsection
