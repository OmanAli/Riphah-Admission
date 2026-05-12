<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Challan Generation - RIPHAH INTERNATIONAL UNIVERSITY</title>
    <style>
        /* Base styles for email clients */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Georgia', serif;
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
            width: 140px;
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
                        <img src="{{ $message->embed(public_path('assets/images/offer-letter.png')) }}" alt="Riphah Logo">
                    </div>
                </td>
            </tr>

            <!-- Letter Body -->
            <tr>
                <td class="content">
                    <p style="text-align: right; font-size: 14px; color: #636e72;">{{ now()->format('d-m-Y') }}</p>

                    <h1>Fee Challan Notification</h1>

                    <p>Dear {{ $data['application']->first_name . ' ' . $data['application']->last_name }},</p>

                    <p>We are writing to inform you that your fee challan for the
                        <strong>{{ $data['fee']->name }}</strong> has been generated for the
                        {{ $data['drawnSession']->session_type . ' ' . $data['drawnSession']->session_year }} academic term.
                    </p>

                    <div class="formal-details">
                        <div class="detail-row"><span class="label">Application ID:</span> {{ $data['application']->oas_id ?? 'N/A' }}</div>
                        <div class="detail-row"><span class="label">Challan Number:</span> {{ $data['doc_no'] }}</div>
                        <div class="detail-row"><span class="label">Total Amount:</span> PKR {{ number_format($data['processingFee'], 2) }}</div>
                        <div class="detail-row"><span class="label">Due Date:</span> {{ $data['valid_date'] }}</div>
                    </div>

                    <p>Please download your official fee challan using the button below. You may submit the payment at any designated bank branch or via the online payment methods mentioned on the challan document.</p>

                    <div class="button-container">
                        <!-- Direct Download Link -->
                        <a href="{{ route('create_fee_challan', $data['application']->oas_id) }}" class="btn">DOWNLOAD FEE CHALLAN (PDF)</a>

                    </div>


                    <p>Kindly ensure that the payment is settled by the due date of <strong>{{ $data['valid_date'] }}</strong> to avoid any late payment surcharges or disruptions to your enrollment process.</p>

                    <div class="signature">
                        <p style="margin-bottom: 5px;">Sincerely,</p>
                        <p style="font-weight: bold; margin: 0; color: #002147;">Finance Department</p>
                        <p style="margin: 0; font-size: 14px; color: #636e72;">Office of Admissions & Finance<br>RIPHAH INTERNATIONAL UNIVERSITY</p>
                    </div>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td class="footer">
                    <p>
                        <strong>RIPHAH INTERNATIONAL UNIVERSITY</strong><br>
                        G7-Islamabad Campus | Financial Services Division<br>
                        T: +92 (51) 111-747-424 | E: <a href="mailto:finance@riphah.edu.pk">finance@riphah.edu.pk</a>
                    </p>
                    <p style="margin-top: 20px; font-size: 10px; color: #dfe6e9;">
                        This is an automated message. Please do not reply directly to this email. For payment confirmation, please upload your paid receipt to the student portal.
                        © {{ date('Y') }} RIPHAH INTERNATIONAL UNIVERSITY. All Rights Reserved.
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
