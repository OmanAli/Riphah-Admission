@extends('layouts.dashboard')
@section('title', 'Application Preview')
@section('content')

    <div class="container-fluid py-3">
        <!-- BEGIN CONTAINER -->
        <div class="mx-auto" style="max-width: 1000px;">

            <!-- ACTION BUTTONS -->
            <div class="d-flex justify-content-end gap-2 mb-3 d-print-none">
                <a href="#" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                    Print <i class="fa fa-print"></i>
                </a>
                <a href="{{ route('home') }}" class="btn btn-success btn-sm d-flex align-items-center gap-2">
                    <i class="fa fa-eye"></i> Back To Home
                </a>
            </div>

            <!-- MAIN CONTENT (Printable Area) -->
            <div id="printable-content" class="bg-white border rounded shadow-sm overflow-hidden">

                <!-- HEADER / LOGO SECTION -->
                <div class="p-4 border-bottom">
                    <div
                        class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4">
                        <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/img/RiphahLogo.png"
                            alt="Riphah Logo" style="height: 70px; object-fit: contain;">
                        <div class="mt-2 mt-sm-0 text-end d-none d-sm-block">
                            <!-- Placeholder for QR -->
                        </div>
                    </div>

                    <!-- APPLICATION METADATA -->
                    <div class="row g-2 small">
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 text-nowrap">Enrollment No:</label>
                            <span class="border-bottom border-secondary flex-grow-1"
                                style="min-width: 80px; height: 1.2em;"></span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 text-nowrap">Online Application #</label>
                            <span class="fw-bold text-decoration-underline">{{ $application->oas_id ?? '12345' }}</span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 text-nowrap">Fee Receipt #</label>
                            <span class="fw-bold text-decoration-underline">
                                {{ $application->fee_status == 0 ? 'Pending' : 'Submitted' }}
                            </span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 text-nowrap">Session:</label>
                            <span class="fw-bold text-decoration-underline">{{ $application->session ?? '' }}</span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 text-nowrap">Date of Apply:</label>
                            <span
                                class="fw-bold text-decoration-underline">{{ $application->created_at->format('Y-m-d') ?? '' }}</span>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <label class="me-2 text-nowrap">Campus:</label>
                            <span
                                class="fw-bold text-decoration-underline">{{ $application->appliedcampus->campus_name ?? $application->campus }}</span>
                        </div>
                    </div>
                </div>

                <!-- FORM BODY -->
                <div class="p-0">
                    <form id="form_sample_1">

                        <!-- SECTION: PROGRAM APPLYING FOR -->
                        <h6 class="bg-dark text-white px-4 py-2 fw-bold text-uppercase m-0 border-bottom"
                            style="font-size: 11px; letter-spacing: 0.1em;">
                            Program Applying For
                        </h6>
                        <div class="px-4 py-2">
                            <div class="row g-2">
                                <div class="col-6 col-md-3">
                                    <label class="d-block text-muted small mb-0">Program 1:</label>
                                    <p class="fw-normal m-0">
                                        {{ strtoupper($application->preferenceOne->program_name ?? $application->program) }}
                                    </p>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="d-block text-muted small mb-0">Program 2:</label>
                                    <p class="m-0" style="min-height: 1.2em;">
                                        {{ strtoupper($application->preferenceTwo->program_name ?? '-') }}</p>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="d-block text-muted small mb-0">Program 3:</label>
                                    <p class="m-0" style="min-height: 1.2em;">
                                        {{ strtoupper($application->preferenceThree->program_name ?? '-') }}</p>
                                </div>
                                <div class="col-6 col-md-3">
                                    <label class="d-block text-muted small mb-0">Program 4:</label>
                                    <p class="m-0" style="min-height: 1.2em;">
                                        {{ strtoupper($application->preferenceFour->program_name ?? '-') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION: CANDIDATE DETAIL -->
                        <h6 class="bg-dark text-white px-4 py-2 fw-bold text-uppercase m-0 border-bottom border-top"
                            style="font-size: 11px; letter-spacing: 0.1em;">
                            Candidate Detail
                        </h6>
                        <div class="px-4 py-2">
                            <div class="row gx-5 gy-1">
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">FirstName:</label>
                                    <span class="w-50">{{ $application->first_name }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">LastName:</label>
                                    <span class="w-50">{{ $application->last_name }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">CNIC/B.Form No:</label>
                                    <span class="w-50">{{ $application->cnic }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Passport No:</label>
                                    <span class="w-50">{{ $application->passport_no ?? '---' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Gender:</label>
                                    <span
                                        class="w-50">{{ $application->gender == 1 ? 'Male' : 'Female' ?? 'Not specified' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Date of Birth:</label>
                                    <span class="w-50">{{ $application->dob ?? 'Not specified' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Nationality:</label>
                                    <span class="w-50">{{ $application->nationality ?? 'Not specified' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Applying On:</label>
                                    <span class="w-50">{{ $application->created_at->format('Y-m-d') ?? '' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Father Name:</label>
                                    <span class="w-50">{{ $application->father_name ?? 'Not specified' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Father CNIC:</label>
                                    <span class="w-50">{{ $application->father_cnic ?? 'Not specified' }}</span>
                                </div>
                                <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                                    <label class="w-50">Father Occupation:</label>
                                    <span class="w-50">{{ $application->father_occupation ?? 'Not specified' }}</span>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- SECTION: CONTACT INFORMATION -->
                <h6 class="bg-dark text-white px-4 py-2 fw-bold text-uppercase m-0 border-bottom border-top"
                    style="font-size: 11px; letter-spacing: 0.1em;">
                    Contact Information
                </h6>
                <div class="px-4 py-2">
                    <div class="row gx-5 gy-1">
                        <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">Email:</label>
                            <span class="w-50">{{ $application->email ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-6 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">Mobile #:</label>
                            <span class="w-50">{{ $application->mobile ?? 'Not specified' }}</span>
                        </div>
                    </div>
                </div>

                <!-- SECTION: PRESENT MAILING ADDRESS -->
                <h6 class="bg-dark text-white px-4 py-2 fw-bold text-uppercase m-0 border-bottom border-top"
                    style="font-size: 11px; letter-spacing: 0.1em;">
                    Present Mailing Address
                </h6>
                <div class="px-4 py-2">
                    <div class="border-bottom border-light border-dotted py-0.5 d-flex mb-1">
                        <label style="width: 15%;">Address:</label>
                        <span style="width: 85%;">{{ $application->address ?? 'Not specified' }}</span>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-4 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">City:</label>
                            <span class="w-50">{{ $application->city ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-4 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">Country:</label>
                            <span class="w-50">{{ $application->country ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-4 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">Phone No:</label>
                            <span class="w-50">{{ $application->phone ?? 'Not specified' }}</span>
                        </div>
                    </div>
                </div>

                <!-- SECTION: EMERGENCY CONTACT -->
                <h6 class="bg-dark text-white px-4 py-2 fw-bold text-uppercase m-0 border-bottom border-top"
                    style="font-size: 11px; letter-spacing: 0.1em;">
                    Person to notify in case of emergency
                </h6>
                <div class="px-4 py-2 mb-3">
                    <div class="row g-2">
                        <div class="col-md-4 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">FullName:</label>
                            <span class="w-50">{{ $application->emergency_contact_name ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-4 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">Relationship:</label>
                            <span class="w-50">{{ $application->emergency_contact_relation ?? 'Not specified' }}</span>
                        </div>
                        <div class="col-md-4 border-bottom border-light border-dotted py-0.5 d-flex">
                            <label class="w-50">Phone No:</label>
                            <span class="w-50">{{ $application->emergency_contact_phone ?? 'Not specified' }}</span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-fluid {
            font-size: 12px;
            color: #333;
        }

        label {
            font-weight: 600;
            color: #555;
            font-size: 11px;
        }

        .border-dotted {
            border-style: dotted !important;
        }

        /* Specific helper for tight rows */
        .py-0.5 {
            padding-top: 0.125rem !important;
            padding-bottom: 0.125rem !important;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printable-content,
            #printable-content * {
                visibility: visible;
            }

            #printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                border: none !important;
                box-shadow: none !important;
            }

            .d-print-none {
                display: none !important;
            }

            /* Maintain dark background for printing headers */
            .bg-dark {
                background-color: #212529 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .text-white {
                color: #fff !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            body {
                background-color: white !important;
                color: #000 !important;
            }

            label {
                color: #000 !important;
            }
        }
    </style>
@endsection
