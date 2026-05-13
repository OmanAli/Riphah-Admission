<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provisional Admission Letter - Riphah International University</title>
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.jpg') }}" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                background-color: white;
            }

            .no-print {
                display: none;
            }

            .page-break {
                page-break-before: always;
            }
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #1a1a1a;
            line-height: 1.4;
        }

        .letterhead-container {
            max-width: 850px;
            margin: 0 auto;
            padding: 40px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Exact Table Styling from Image */
        .exact-table {
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 13px;
        }

        .exact-table th,
        .exact-table td {
            border: 1px solid black;
            padding: 2px 6px;
            text-align: left;
            vertical-align: top;
        }

        .exact-table .amount-col {
            text-align: right;
            width: 180px;
        }

        .exact-table .header-row {
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-gray-100 py-10">
    <!-- PAGE 1 -->
    <div class="letterhead-container">
        <div class="flex justify-between items-start mb-8">
            <div class="text-xs">
                <p><strong>Ref:</strong> Riphah-ADM-{{ $session->session_type }} {{ $session->session_year }}</p>
                <p><strong>Issue Date:</strong> {{ \Carbon\Carbon::now()->format('d F, Y') }}</p>
            </div>
        </div>
        <div class="mb-4 text-sm">
            <p><strong>Candidate's Name:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
            <p><strong>Father Name:</strong>{{ $application->father_name }}</p>
            <p><strong>Online Application ID:</strong>{{ $application->oas_id }}</p>
        </div>

        <div class="mb-4">
            <p class="text-sm"><strong>Subject: <span class="underline">Provisional Admission In {{ $program->program_name }} First Semester Session {{ $session->session_type }}-{{ $session->session_year }}</span></strong></p>
        </div>

        <div class="mb-4 text-sm">
            <p>Assalam-o-Alaikum!</p>
            <p class="mt-2 text-justify">Congratulations! I am pleased to inform you that you have been selected
                provisionally for admission in First Semester of subject degree program.</p>
        </div>

        <p class="text-sm mb-1">Detail of your dues is given below:</p>

        <table class="exact-table">
            <tr class="header-row">
                <td style="width: 200px;">Particulars</td>
                <td>Account Heads</td>
                <td class="amount-col">Amount (Pak Rs.)</td>
            </tr>
            <!-- One Time Charges Section -->
            <tr>
                <td rowspan="3" class="font-bold">One Time Charges</td>
                <td>Admission Fee</td>
                <td class="amount-col">{{ number_format($program->final_program_fee->admissionFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>University Registration Fee</td>
                <td class="amount-col">{{ number_format($program->final_program_fee->registrationFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>University ID Card</td>
                <td class="amount-col">{{ number_format($program->final_program_fee->idCardFee, 0, '.', ',') }}</td>
            </tr>
            <!-- Semester Dues Section -->
            <tr>
                <td rowspan="3" class="font-bold">Semester Dues</td>
                <td>Tuition Fee (for {{ $program->final_program_fee->credit_hour }} credit hours @ {{ number_format($program->final_program_fee->per_credit_hour, 0, '.', ',') }} per Cr. Hr.)</td>
                <td class="amount-col">{{ number_format(
                        $program->final_program_fee->credit_hour * $program->final_program_fee->per_credit_hour,
                        0,
                        '.',
                        ',',
                    ) }}</td>
            </tr>
            <tr>
                <td>Examination Fee</td>
                <td class="amount-col">{{ number_format($program->final_program_fee->examinationFee, 0, '.', ',') }}</td>
            </tr>
            <tr>
                <td>Semester Enrollment Fee</td>
                <td class="amount-col">{{ number_format($program->final_program_fee->semesterEnrollFee, 0, '.', ',') }}</td>
            </tr>
             @php
                $fee = $program->final_program_fee;
                // One Time Charges
                $oneTime =
                    $fee->admissionFee +
                    $fee->registrationFee +
                    $fee->idCardFee;
                // Semester Dues
                $tuition = $fee->credit_hour * $fee->per_credit_hour;
                $semester = $tuition + $fee->examinationFee + $fee->semesterEnrollFee;
                // Grand Total
                $total = $oneTime + $semester;

                $IstInstallment = round($total / 2);
            @endphp
            <!-- Footer Totals -->
            <tr class="font-bold">
                <td colspan="2">Total Fee & Dues for First Semester</td>
                <td class="amount-col">{{ number_format($total, 0, '.', ',') }}</td>
            </tr>
            <tr class="font-bold">
                <td colspan="2">Total Amount Payable</td>
                <td class="amount-col">{{ number_format($total, 0, '.', ',') }}</td>
            </tr>
        </table>

        <div class="text-xs mt-1 mb-4">
            <p>**Above fee may vary subject to change in credit hours/courses.</p>
            <p>***Last date for payment of dues and documents verification is <strong>{{ \Carbon\Carbon::parse($due_date)->format('F jS, Y') }}</strong></p>
        </div>

        <div class="text-sm space-y-3">
            <p><strong>Please note that:</strong></p>
            <ul class="list-disc ml-6">
                <li>Fee and course offerings are under revision and expected to be decided soon and shall be
                    communicated to you at your given email address well before the commencement of classes.</li>
                <li>Admission is subjected to the clearance of admission test.</li>
                <li>You are required to deposit an upfront amount of <strong>Rs.{{ number_format($IstInstallment , 0, '.', ',') }}/-</strong> as first installment
                    by <strong>May 20, 2026</strong> failing which on due date the admission will be offered to next
                    candidate. Classes are expected to commence by September 15, 2026 therefore please be prepared
                    accordingly. Submit the attested copies of certificates of past qualifications and provide these
                    certificates in their original form for verification before the commencement of classes. You will be
                    issued updated admission offer letter along with fee details by July 2026 therefore please visit the
                    concerned admission office for its collection.</li>
                <li>Fee can be deposited to an authorized bank account on a specified fee voucher. Specified fee
                    vouchers can be acquired from the Fee and Dues office of your concerned Riphah campus. Cash and
                    cheques are not acceptable.</li><br><br>
                <li>
                    <p><strong>Refund Policy:</strong></p>
                    <div class="text-sm space-y-4">
                        <div class="text-justify leading-tight">
                            1. Admission processing fee, Admission fee and University Registration fee are
                            non-refundable. 2. Examination fee and enrollment fee are refundable incase the refund
                            application is submitted within the respective semester. 3. "Tuition Fee" is refundable at
                            the rate of 100%, 80%, 60% or 50% if refund application is submitted by the 10th, 15th, 20th
                            or 30th day of commencement of classes respectively as the case may be. 4. No refund of
                            tuition fee shall be applicable after the 30th day of commencement of classes. 5. Fee refund
                            shall be applicable subject to the submission of a specified refund application form to the
                            concerned Fee and Dues department of respective Riphah campus. 6. Timelines (i.e. number of
                            days) shall include holidays and be counted from the first day of commencement of classes as
                            announced by the university for respective program and applicable to all candidates
                            depositing dues even before or after the commencement of classes. 7. Refer to the above fee
                            for calculations of the deductible amount. 8. Refund is applicable maximum up to the
                            deposited amount. Eligibility of scholarship or financial assistance (if any) is subject to
                            continuation of your study with Riphah, and the amount of allowed scholarship or financial
                            assistance is non-refundable if candidate leaves admitted program before appearing the end
                            term examination of respective semester/term. 9. Priority of deduction shall apply in the
                            sequence of admission processing fee, admission fee, university registration fee and the
                            tuition fee to the candidates allowed to make fee payments in multiple installments for the
                            respective semester. 10. Semester freezing is not allowed for the first semester. Candidates
                            leaving the program without prior written approval from the head of the department concerned
                            are not allowed for a refund or deferment of dues.
                        </div>
                    </div>
                </li>
                <li>
                    <p class="text-justify">University has discretion to revise fee & dues as deemed necessary by
                        the authorities 'time to time. University reserves the right to impose fine(s) to students
                        incase of breach of university rules to keep them disciplined. The amount of these fines is
                        donated as charity (Sadaqa) to deserving persons on behalf of concerned student(s).
                        Submission of fee means you agree to the University Rules.</p>
                </li>
                <li>
                    <p class="text-justify">Admission of results awaiting students is conditional. They need to
                        provide a hope certificate from a recently attended college. Submit attested copies of
                        DMC/Transcript within 20 days of declaration of result.</p>
                </li>
                <li>
                    <p class="text-justify">University reserves the right to cancel your admission any time if any
                        information you provided, or documents you submitted within the given time, are found fake.
                    </p>
                </li>

            </ul>
            <p class="font-bold italic mt-10">We welcome you to the prestigious degree program of Riphah
                International University.</p>
        </div>
    </div>

</body>

</html>
