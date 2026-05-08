<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIPHAH INTERNATIONAL UNIVERSITY</title>
    <style>
        /* Base styles for email clients */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Georgia', serif;
            /* Serif font for a more academic, professional feel */
            background-color: #f8f9fa;
            color: #2d3436;
            -webkit-font-smoothing: antialiased;
        }

        table {
            border-spacing: 0;
            width: 100%;
        }

        td {
            padding: 0;
        }

        /* Responsive container */
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f8f9fa;
            padding: 40px 0;
        }

        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            border: 1px solid #e1e8ed;
        }

        /* Header / Logo section */
        .header {
            padding: 40px 0;
            text-align: center;
            border-bottom: 3px solid #002147;
            /* Oxford Blue */
        }

        .logo-placeholder img {
            max-width: 180px;
            height: auto;
        }

        /* Content area */
        .content {
            padding: 50px 40px;
        }

        h1 {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #002147;
            font-size: 24px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        p {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .formal-details {
            margin: 30px 0;
            border-top: 1px solid #eeeeee;
            border-bottom: 1px solid #eeeeee;
            padding: 20px 0;
        }

        .detail-row {
            padding: 5px 0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-size: 14px;
        }

        .label {
            font-weight: bold;
            color: #002147;
            width: 120px;
            display: inline-block;
            text-transform: uppercase;
            font-size: 12px;
        }

        /* Call to Action Button */
        .button-container {
            text-align: left;
            padding: 20px 0;
        }

        .btn {
            background-color: #002147;
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 2px;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-weight: bold;
            display: inline-block;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        /* Signature Section */
        .signature {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
        }

        .signature-text {
            font-style: italic;
            color: #636e72;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-size: 11px;
            color: #b2bec3;
            padding: 30px 40px;
            line-height: 1.6;
        }

        .footer a {
            color: #002147;
            text-decoration: underline;
        }

        /* Mobile adjustments */
        @media screen and (max-width: 600px) {
            .content {
                padding: 30px 20px;
            }

            h1 {
                font-size: 20px;
            }

            .label {
                width: 100%;
                display: block;
                margin-bottom: 2px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <table class="main" align="center">
            <!-- Official Header -->
            <tr>
                <td class="header">
                    <div class="logo-placeholder">
                        <!-- Standardized height for professional logos -->
                        <img src="{{ $message->embed(public_path('assets/images/offer-letter.png')) }}">
                    </div>
                </td>
            </tr>

            <!-- Letter Body -->
            <tr>
                <td class="content">
                    <p style="text-align: right; font-size: 14px; color: #636e72;">{{ $data['date'] }}</p>

                    <h1>Offer of Admission</h1>

                    <p>Dear {{ $data['application']->first_name . ' ' . $data['application']->last_name }},</p>

                    <p>On behalf of the Admissions Committee, it is my distinct honor to offer you admission to the
                        <strong>{{ $data['program']->program_name }}</strong> at RIPHAH INTERNATIONAL UNIVERSITY -
                        {{ $data['program']->campus->campus_name ?? '' }} for the
                        {{ $data['session']->session_type . ' ' . $data['session']->session_year }} term.
                    </p>

                    <p>Our review process is exceptionally rigorous, and your selection is a testament to your
                        outstanding academic record, demonstrated leadership, and the unique contributions we believe
                        you will bring to our scholarly community. We are confident that you will thrive within our
                        challenging and supportive environment.</p>

                    {{-- <div class="formal-details">
                        <div class="detail-row"><span class="label">Application ID:</span> {{$application->oas_id}}</div>
                        <div class="detail-row"><span class="label">Academic Unit:</span> [Department/School Name]</div>
                        <div class="detail-row"><span class="label">Term:</span> [Enrollment Term]</div>
                        <div class="detail-row"><span class="label">Classification:</span> Full-time Undergraduate</div>
                    </div> --}}

                    <p>Your official admission letter, which includes detailed information regarding your financial aid
                        package and residency requirements, is now available for review via the Secure Applicant Portal.
                    </p>

                    <div class="button-container">
                        <a href="#" class="btn">ACCESS ADMISSION PORTAL</a>
                    </div>

                    <p>Please note that your formal response and enrollment deposit must be submitted by
                        <strong>{{ $data['due_date'] }}</strong> to reserve your place in the class. Should you have any
                        inquiries, please contact the Office of Admissions.
                    </p>

                    <div class="signature">
                        <p style="margin-bottom: 5px;">Respectfully,</p>
                        <p style="font-weight: bold; margin: 0; color: #002147;">Admission Head</p>
                        <p style="margin: 0; font-size: 14px; color: #636e72;">Dean of Admissions and Enrollment
                            Management</p>
                    </div>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td class="footer">
                    <p>
                        <strong>RIPHAH INTERNATIONAL UNIVERSITY</strong><br>
                        Office of Admissions | G7-Islamabad<br>
                        T: +1 (555) 012-3456 | E: <a href="#">admissions@riphah.edu.pk</a>
                    </p>
                    <p style="margin-top: 20px; font-size: 10px; color: #dfe6e9;">
                        This communication is intended solely for the addressee and may contain confidential
                        information.
                        © {{ date('Y') }} RIPHAH INTERNATIONAL UNIVERSITY. All Rights Reserved.
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
