<!DOCTYPE html>
<html>
<head>
    <title>Print Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            font-size:12px;
            color:#333;
            background:#fff;
        }

        label{
            font-weight:600;
            color:#555;
            font-size:11px;
        }

        .border-dotted{
            border-style:dotted !important;
        }

        .py-05{
            padding-top:2px;
            padding-bottom:2px;
        }

        .section-title{
            background:#212529;
            color:#fff;
            padding:6px 15px;
            font-size:11px;
            letter-spacing:.1em;
            font-weight:bold;
            text-transform:uppercase;
        }

        .container-box{
            max-width:1000px;
            margin:auto;
            border:1px solid #ddd;
        }

        @media print{

            body{
                margin:0;
            }

            .container-box{
                border:none;
            }

            .section-title{
                background:#212529 !important;
                color:#fff !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

        }

    </style>

</head>

<body>

<div class="container-box p-4">

    <!-- HEADER -->
    <div class="border-bottom pb-3 mb-3">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/img/RiphahLogo.png"
                 style="height:70px">

        </div>

        <div class="row small">

            <div class="col-md-4 d-flex">
                <label class="me-2">Enrollment No:</label>
                <span class="flex-grow-1 border-bottom"></span>
            </div>

            <div class="col-md-4 d-flex">
                <label class="me-2">Online Application #</label>
                <span class="fw-bold text-decoration-underline">{{ $application->oas_id }}</span>
            </div>

            <div class="col-md-4 d-flex">
                <label class="me-2">Fee Receipt #</label>
                <span class="fw-bold text-decoration-underline">
                    {{ $application->fee_status == 0 ? 'Pending' : 'Submitted' }}
                </span>
            </div>

            <div class="col-md-4 d-flex mt-2">
                <label class="me-2">Session:</label>
                <span class="fw-bold text-decoration-underline">{{ $application->session }}</span>
            </div>

            <div class="col-md-4 d-flex mt-2">
                <label class="me-2">Date of Apply:</label>
                <span class="fw-bold text-decoration-underline">
                    {{ $application->created_at->format('Y-m-d') }}
                </span>
            </div>

            <div class="col-md-4 d-flex mt-2">
                <label class="me-2">Campus:</label>
                <span class="fw-bold text-decoration-underline">
                    {{ $application->campus->campus_name ?? $application->campus }}
                </span>
            </div>

        </div>

    </div>

    <!-- PROGRAM APPLYING FOR -->
    <div class="section-title">Program Applying For</div>

    <div class="row mt-2 mb-3">

        <div class="col-md-3">
            <label>Program 1</label>
            <p>{{ strtoupper($application->preferenceOne->program_name ?? '-') }}</p>
        </div>

        <div class="col-md-3">
            <label>Program 2</label>
            <p>{{ strtoupper($application->preferenceTwo->program_name ?? '-') }}</p>
        </div>

        <div class="col-md-3">
            <label>Program 3</label>
            <p>{{ strtoupper($application->preferenceThree->program_name ?? '-') }}</p>
        </div>

        <div class="col-md-3">
            <label>Program 4</label>
            <p>{{ strtoupper($application->preferenceFour->program_name ?? '-') }}</p>
        </div>

    </div>

    <!-- CANDIDATE DETAIL -->
    <div class="section-title">Candidate Detail</div>

    <div class="row mt-2">

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">First Name:</label>
            <span>{{ $application->first_name }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Last Name:</label>
            <span>{{ $application->last_name }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">CNIC:</label>
            <span>{{ $application->cnic }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Passport No:</label>
            <span>{{ $application->passport_no ?? '---' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Gender:</label>
            <span>{{ $application->gender == 1 ? 'Male' : 'Female' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Date of Birth:</label>
            <span>{{ $application->dob ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Nationality:</label>
            <span>{{ $application->nationality ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Father Name:</label>
            <span>{{ $application->father_name ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Father CNIC:</label>
            <span>{{ $application->father_cnic ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Father Occupation:</label>
            <span>{{ $application->father_occupation ?? 'Not specified' }}</span>
        </div>

    </div>

    <!-- CONTACT INFORMATION -->
    <div class="section-title mt-3">Contact Information</div>

    <div class="row mt-2">

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Email:</label>
            <span>{{ $application->email ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-6 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Mobile:</label>
            <span>{{ $application->mobile ?? 'Not specified' }}</span>
        </div>

    </div>

    <!-- ADDRESS -->
    <div class="section-title mt-3">Present Mailing Address</div>

    <div class="border-bottom border-dotted py-05 mt-2 d-flex">
        <label style="width:15%">Address:</label>
        <span style="width:85%">{{ $application->address ?? 'Not specified' }}</span>
    </div>

    <div class="row mt-2">

        <div class="col-md-4 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">City:</label>
            <span>{{ $application->city ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-4 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Country:</label>
            <span>{{ $application->country ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-4 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Phone:</label>
            <span>{{ $application->phone ?? 'Not specified' }}</span>
        </div>

    </div>

    <!-- EMERGENCY CONTACT -->
    <div class="section-title mt-3">Emergency Contact</div>

    <div class="row mt-2">

        <div class="col-md-4 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Full Name:</label>
            <span>{{ $application->emergency_contact_name ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-4 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Relationship:</label>
            <span>{{ $application->emergency_contact_relation ?? 'Not specified' }}</span>
        </div>

        <div class="col-md-4 border-bottom border-dotted py-05 d-flex">
            <label class="w-50">Phone:</label>
            <span>{{ $application->emergency_contact_phone ?? 'Not specified' }}</span>
        </div>

    </div>

</div>


<script>

window.onload = function(){

    window.print();

    setTimeout(function(){
        window.history.back();
    },500);

}

</script>


</body>
</html>
