@extends('layouts.dashboard')
@section('title', 'MBBS/BDS Application')
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
                        <li class="breadcrumb-item active">MBBS/BDS Application</li>
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
                        @include('common.alert')
                        <div class="table-responsive">
                            <table class="display" id="basic-1" style="font-size: 14px;">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Program</th>
                                        <th>Session</th>
                                        <th>Full Name</th>
                                        <th>Father Name</th>
                                        <th>CNIC</th>
                                        <th>Phone</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($applications))
                                        @foreach ($applications as $key => $application)
                                            <tr>
                                                <td><button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#candidateModal_{{ $key }}"
                                                        class="btn"><i class="fa fa-plus" style="color: green;"></i>
                                                    </button>{{ $application->oas_id }}</td>
                                                <td>{{ strtoupper($application->program) }}</td>
                                                <td>{{ $application->session }}</td>
                                                <td>{{ $application->first_name . ' ' . $application->last_name }}</td>
                                                <td>{{ $application->father_name }}</td>
                                                <td>{{ $application->cnic }}</td>
                                                <td>{{ $application->mobile }}</td>
                                            </tr>

                                            <div class="modal fade bd-example-modal-lg"
                                                id="candidateModal_{{ $key }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Application Details</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <div class="details-container">
                                                                <!-- Personal Information -->
                                                                <div class="details-section">
                                                                    <h5 class="section-title">Personal Information</h5>
                                                                    <div class="info-grid">
                                                                        <div class="info-item">
                                                                            <span class="info-label">Alt Phone #</span>
                                                                            <span
                                                                                class="info-value">{{ $application->phone }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">Gender</span>
                                                                            <span class="info-value">
                                                                                {{ $application->gender == 1 ? 'Male' : ($application->gender == 2 ? 'Female' : $application->gender) }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">Date of Birth</span>
                                                                            <span
                                                                                class="info-value">{{ $application->dob }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">Nationality</span>
                                                                            <span
                                                                                class="info-value">{{ $application->country }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">Address</span>
                                                                            <span
                                                                                class="info-value">{{ $application->address }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">Quota</span>
                                                                            <span
                                                                                class="info-value">{{ $application->quota }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">Hafiz e Quran</span>
                                                                            <span class="info-value">
                                                                                {{ $application->haifz_quran == 1 ? 'Yes' : 'No' }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Academic Information -->
                                                                <div class="details-section">
                                                                    <h5 class="section-title">Academic Record</h5>
                                                                    <div class="info-grid">
                                                                        <div class="info-item">
                                                                            <span
                                                                                class="info-label">{{ $application->education_level_1 }}</span>
                                                                            <span
                                                                                class="info-value">{{ $application->education_level_1_obtained_marks }}
                                                                                /
                                                                                {{ $application->education_level_1_total_marks }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span
                                                                                class="info-label">{{ $application->education_level_2 }}</span>
                                                                            <span
                                                                                class="info-value">{{ $application->education_level_2_obtained_marks }}
                                                                                /
                                                                                {{ $application->education_level_2_total_marks }}</span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">MDCAT Roll No.</span>
                                                                            <span
                                                                                class="info-value">{{ $application->entrance_roll_number }}
                                                                                (Year:
                                                                                {{ $application->entrance_year }})
                                                                            </span>
                                                                        </div>
                                                                        <div class="info-item">
                                                                            <span class="info-label">MDCAT Score</span>
                                                                            <span class="info-value"
                                                                                style="color: var(--primary-color); font-weight: 700;">{{ $application->entrance_obtained_marks }}
                                                                                / {{ $application->entrance_total_marks }}
                                                                                -
                                                                                ({{ $application->entrance_passed_from }})</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Documents -->
                                                                <div class="details-section">
                                                                    <h5 class="section-title">Attached Documents</h5>
                                                                    <div class="document-grid">
                                                                        <a href="{{ asset('uploads/applications/' . $application->cnic_front) }}"
                                                                            target="_blank" class="doc-card"
                                                                            download="download">
                                                                            <span class="doc-icon">🪪</span>
                                                                            <span class="doc-text">CNIC/Passport
                                                                                (Front)
                                                                            </span>
                                                                        </a>
                                                                        <a href="{{ asset('uploads/applications/' . $application->cnic_back) }}"
                                                                            target="_blank" class="doc-card"
                                                                            download="download">
                                                                            <span class="doc-icon">🪪</span>
                                                                            <span class="doc-text">CNIC/Passport
                                                                                (Back)</span>
                                                                        </a>
                                                                        <a href="{{ asset('uploads/applications/' . $application->education_level_1_result_card) }}"
                                                                            target="_blank" class="doc-card"
                                                                            download="download">
                                                                            <span class="doc-icon">📜</span>
                                                                            <span class="doc-text">SSC Result Card</span>
                                                                        </a>
                                                                        <a href="{{ asset('uploads/applications/' . $application->education_level_2_result_card) }}"
                                                                            target="_blank" class="doc-card"
                                                                            download="download">
                                                                            <span class="doc-icon">🎓</span>
                                                                            <span class="doc-text">HSSC Result Card</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
    <style>
        :root {
            --primary-color: #2563eb;
            --bg-muted: #f8fafc;
            --border-color: #e2e8f0;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        .details-container {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: var(--text-main);
            padding: 10px;
        }

        .details-section {
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--primary-color);
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 8px;
            margin-bottom: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .info-item {
            background: var(--bg-muted);
            padding: 12px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .info-label {
            display: block;
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .info-value {
            display: block;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 12px;
            margin-top: 10px;
        }

        .doc-card {
            text-decoration: none;
            color: var(--text-main);
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 10px;
            text-align: center;
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .doc-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .doc-icon {
            font-size: 1.5rem;
        }

        .doc-text {
            font-size: 0.7rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            background: #dcfce7;
            color: #166534;
            font-weight: bold;
        }
    </style>
@endsection
@section('scripts')

@endsection
