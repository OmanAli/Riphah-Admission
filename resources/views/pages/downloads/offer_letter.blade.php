<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Offer Letter - Riphah International University</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11px;
            color: #111;
            background: #fff;
            padding: 30px 40px;
            line-height: 1.5;
        }

        /* ── Header ── */
        .header {
            display: flex;
            align-items: center;
            border-bottom: 3px double #003366;
            padding-bottom: 10px;
            margin-bottom: 14px;
        }

        .header-logo {
            width: 80px;
            margin-right: 16px;
        }

        .header-logo img {
            width: 100%;
        }

        .header-text {
            flex: 1;
            text-align: center;
        }

        .header-text .university-name {
            font-size: 16px;
            font-weight: bold;
            color: #003366;
            letter-spacing: 0.5px;
        }

        .header-text .university-sub {
            font-size: 10px;
            color: #444;
            margin-top: 2px;
        }

        .header-text .tagline {
            font-size: 9px;
            color: #777;
            font-style: italic;
            margin-top: 2px;
        }

        .header-right {
            width: 100px;
            /* text-align: right; */
            margin-left: 600px;
            font-size: 9px;
            color: #555;
        }

        /* ── Meta info ── */
        .meta-block {
            margin-bottom: 10px;
            font-size: 9px;
        }

        .meta-block p {
            margin-bottom: 2px;
        }

        /* ── Subject ── */
        .subject-line {
            font-size: 10px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 8px;
        }

        /* ── Body text ── */
        .body-para {
            font-size: 9px;
            margin-bottom: 8px;
        }

        /* ── Fee table ── */
        .section-label {
            font-size: 9px;
            margin-bottom: 4px;
            font-weight: bold;
        }

        table.fee-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
            margin-bottom: 8px;
        }

        table.fee-table th,
        table.fee-table td {
            border: 1px solid #333;
            padding: 3px 5px;
        }

        table.fee-table th {
            background-color: #003366;
            color: #fff;
            font-weight: bold;
            text-align: left;
        }

        table.fee-table td {
            background-color: #fff;
        }

        table.fee-table td.right,
        table.fee-table th.right {
            text-align: right;
        }

        table.fee-table tr.subtotal th,
        table.fee-table tr.subtotal td {
            background-color: #e8f0fb;
            font-weight: bold;
        }

        table.fee-table tr.grand-total th,
        table.fee-table tr.grand-total td {
            background-color: #003366;
            color: #fff;
            font-weight: bold;
        }

        table.fee-table tr.tax-row td {
            background-color: #fafafa;
            font-style: italic;
        }

        /* ── Notes below table ── */
        table.notes-table {
            width: 100%;
            font-size: 9px;
            margin-bottom: 10px;
            border-collapse: collapse;
        }

        table.notes-table td {
            padding: 2px 0;
        }

        /* ── Instructions ── */
        .instructions {
            font-size: 9px;
            margin-top: 8px;
            padding: 8px;
            border: 1px solid #aac;
            background: #f7f9ff;
            line-height: 1.6;
        }

        .instructions p {
            margin-bottom: 4px;
        }

        /* ── Signature block ── */
        /* .signature-block {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
      font-size: 9px;
    }
    .sig-item {
      text-align: center;
      width: 180px;
    }
    .sig-item .sig-line {
      border-top: 1px solid #333;
      margin-bottom: 4px;
    } */

        /* Robust Layout for PDF Compatibility */
        .signature-block {
            margin-top: 50px;
            width: 100%;
            /* Clearfix for float layout */
            display: block;
            content: "";
            clear: both;
        }

        .sig-item {
            /* Using inline-block or float for maximum PDF compatibility */
            display: inline-block;
            vertical-align: top;
            width: 30%;
            /* Using percentages for better scaling */
            margin-right: 3%;
            text-align: center;
            font-size: 9px;
            font-family: sans-serif;
        }

        /* Remove margin from the last item to prevent wrapping */
        .sig-item:last-child {
            margin-right: 0;
        }

        .sig-item .sig-line {
            border-top: 1px solid #333;
            margin-bottom: 4px;
            width: 100%;
        }

        /* Optional: Table-based approach if inline-block still fails in your specific PDF engine */
        .sig-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .sig-table td {
            width: 33.33%;
            text-align: center;
            font-size: 9px;
            font-family: sans-serif;
            padding: 0 10px;
            vertical-align: top;
        }

        /* ── Footer ── */
        .footer {
            margin-top: 20px;
            border-top: 1px solid #aaa;
            padding-top: 6px;
            font-size: 8px;
            color: #666;
            text-align: center;
        }

        @media print {
            body {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- ══════════════ HEADER ══════════════ -->
    <div class="header">
        <div class="header-logo">
            <!-- Replace src with actual logo path -->
            {{-- <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/5b/Riphah_International_University_logo.png/200px-Riphah_International_University_logo.png"
           alt="Riphah Logo" onerror="this.style.display='none'"> --}}
        </div>
        <div class="header-text">
            <div class="university-name">RIPHAH INTERNATIONAL UNIVERSITY</div>
            <div class="university-sub">Islamic International Medical College Trust</div>
            <div class="tagline">Al-Mizan Campus · 274, Peshawar Road, Rawalpindi, Pakistan</div>
        </div>
        <div class="header-right">
            Admissions Office<br>
            Tel: +92-51-111-000-111
        </div>
    </div>

    <!-- ══════════════ META BLOCK ══════════════ -->
    <div class="meta-block">
        <p><strong>Ref:</strong> Riphah-ADM-{{ $session->session_type }} {{ $session->session_year }}</p>
        <p><strong>Issue Date:</strong> {{ \Carbon\Carbon::now()->format('d F, Y') }}</p>
        <p><strong>Candidate's Name:</strong> <strong>{{ $application->first_name }}
                {{ $application->last_name }}</strong></p>
        <p><strong>Father Name:</strong> <strong>{{ $application->father_name }}</strong></p>
        <p><strong>Online Application ID:</strong> <strong>{{ $application->oas_id }}</strong></p>
    </div>

    <!-- ══════════════ SUBJECT ══════════════ -->
    <p class="subject-line">
        Subject: Provisional Admission In {{ $offer_letter->name }} First Semester Session
        {{ $session->session_type }}-{{ $session->session_year }}
    </p>

    <!-- ══════════════ SALUTATION & BODY ══════════════ -->
    <p class="body-para">Assalam-o-Alaikum!</p>
    <p class="body-para">
        Congratulations! I am pleased to inform you that you have been selected provisionally for admission in
        <strong>First Semester</strong> <strong>of subject degree program</strong>.
        Detail of your dues is given below:
    </p>

    <!-- ══════════════ FEE TABLE ══════════════ -->
    <table class="fee-table">
        <thead>
            <tr>
                <th width="22%">Particulars</th>
                <th width="56%">Account Heads</th>
                <th width="22%" class="right">Amount (Pak Rs.)</th>
            </tr>
        </thead>
        <tbody>
            <!-- ONE TIME CHARGES -->
            <tr>
                <th rowspan="6">One Time Charges</th>
                <td>Admission Fee</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->admissionFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>University Registration Fee</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->registrationFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>Council Fee</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->pharmCouncilFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>College Security</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->collegeSecurityFee, 0, '.', ',') }}
                </td>
            </tr>
            <tr>
                <td>Student Service Charges</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->service_charge, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>University ID Card</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->idCardFee, 0, '.', ',') }}</td>
            </tr>

            <!-- SEMESTER DUES -->
            <tr>
                <th rowspan="3">Semester Dues</th>
                <td>Tuition Fee (for {{ $offer_letter->oas_prg->final_program_fee->credit_hour }} credit hours @
                    {{ number_format($offer_letter->oas_prg->final_program_fee->per_credit_hour, 0, '.', ',') }} per
                    Cr. Hr.)</td>
                <td class="right">
                    {{ number_format(
                        $offer_letter->oas_prg->final_program_fee->credit_hour * $offer_letter->oas_prg->final_program_fee->per_credit_hour,
                        0,
                        '.',
                        ',',
                    ) }}
                </td>
            </tr>
            <tr>
                <td>Examination Fee</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->examinationFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>Semester Enrollment Fee</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->semesterEnrollFee, 0, '.', ',') }}</td>
            </tr>
            @php
                $fee = $offer_letter->oas_prg->final_program_fee;

                // One Time Charges
                $oneTime =
                    $fee->admissionFee +
                    $fee->registrationFee +
                    $fee->pharmCouncilFee +
                    $fee->collegeSecurityFee +
                    $fee->service_charge +
                    $fee->idCardFee;

                // Semester Dues
                $tuition = $fee->credit_hour * $fee->per_credit_hour;

                $semester = $tuition + $fee->examinationFee + $fee->semesterEnrollFee;

                // Grand Total
                $total = $oneTime + $semester;
            @endphp
            <!-- SUBTOTAL -->
            <tr class="subtotal">
                <th colspan="2">Total Fee &amp; Dues for First Semester</th>
                <th class="right">
                    {{ number_format($total, 0, '.', ',') }}
                </th>
            </tr>

            <!-- TAX -->
            <tr class="tax-row">
                <td colspan="2">Withholding Tax u/s 236(i) of Income Tax Act of Pakistan</td>
                <td class="right">
                    {{ number_format($offer_letter->oas_prg->final_program_fee->income_tax, 0, '.', ',') }}</td>
            </tr>

            <!-- GRAND TOTAL -->
            <tr class="grand-total">
                <th colspan="2">Total Amount Payable</th>
                <th class="right">
                    {{ number_format($total + $offer_letter->oas_prg->final_program_fee->income_tax, 0, '.', ',') }}
                </th>
            </tr>
        </tbody>
    </table>

    <!-- ══════════════ NOTES ══════════════ -->
    <table class="notes-table">
        <tr>
            <td>** Above fee may vary subject to change in credit hours/courses.</td>
        </tr>
        <tr>
            <td>
                *** Last date for payment of dues and documents verification is
                <strong><u>{{ \Carbon\Carbon::parse($due_date)->format('F jS, Y') }}</u></strong>
            </td>
        </tr>
    </table>

    <!-- ══════════════ INSTRUCTIONS ══════════════ -->
    <div class="instructions">
        <p><strong>Instructions / Terms &amp; Conditions:</strong></p>
        <p>{!! $offer_letter->instructions !!}</p>
    </div>

    <!-- ══════════════ SIGNATURE ══════════════ -->
    {{-- <div class="signature-block">
    <div class="sig-item">
      <div class="sig-line"></div>
      <strong>Director Admissions</strong><br>
      Riphah International University
    </div>
    <div class="sig-item">
      <div class="sig-line"></div>
      <strong>Registrar's Office</strong><br>
      Riphah International University
    </div>
    <div class="sig-item">
      <div class="sig-line"></div>
      <strong>Student Signature</strong><br>
      Acknowledgement Copy
    </div>
  </div> --}}
    <div class="signature-block">
        <div class="sig-item">
            <div class="sig-line"></div>
            <strong>Director Admissions</strong><br>
            Riphah International University
        </div>
        <div class="sig-item">
            <div class="sig-line"></div>
            <strong>Registrar's Office</strong><br>
            Riphah International University
        </div>
        <div class="sig-item">
            <div class="sig-line"></div>
            <strong>Student Signature</strong><br>
            Acknowledgement Copy
        </div>
    </div>

    <!-- ══════════════ FOOTER ══════════════ -->
    <div class="footer">
        Riphah International University · Al-Mizan Campus · 274 Peshawar Road, Rawalpindi ·
        www.riphah.edu.pk · admissions@riphah.edu.pk
    </div>

</body>

</html>
