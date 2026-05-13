<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fee Challan</title>
    <style>
        /* DOMPDF specific adjustments:
           1. Flexbox replaced with floating/table for compatibility.
           2. Page margins set to 0.5cm for precise positioning.
        */
        @page {
            margin: 0.5cm;
        }

        body {
            font-family: verdana, arial, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        .challan-wrap {
            width: 1000px;
            /* Ensures space for 3 boxes horizontally */
        }

        .copy-box {
            width: 310px;
            /* Adjusted to fit A4 Landscape with margins */
            height: 560px;
            float: left;
            /* margin-right: 8px; */
            margin-right: 25px;
            box-sizing: border-box;
        }

        .copy-box table {
            width: 100%;
            font-size: 11px;
            font-family: verdana, arial, sans-serif;
        }

        .copy-box td,
        .copy-box th {
            padding: 3px 4px;
            font-size: 11px;
            color: #333;
            background: #fff;
        }

        .copy-box th {
            font-weight: bold;
        }

        .copy-header {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            padding: 4px;
            background: #f5f5f5;
        }

        .bank-name {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            padding: 3px;
        }

        .acct-block {
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            padding: 3px 5px;
            background: #eeeeee;
        }

        .no-border td {
            border: none !important;
        }

        .underline {
            text-decoration: underline;
        }

        .red {
            color: red;
        }

        /* Signature area adjustments for bottom alignment */
        .sig-container-cell {
            padding: 0 !important;
            height: 80px;
            /* Defining the area height as per original */
            vertical-align: bottom;
            /* Forces the inner table to the bottom */
        }

        .sig-table {
            width: 100%;
            margin-top: auto;
        }

        .sig-table td {
            vertical-align: bottom;
            text-align: center;
            font-size: 10px;
            padding: 2px 4px 10px 4px;
            /* Added bottom padding for spacing */
        }

        .payment-box {
            width: 310px;
            height: 500px;
            padding: 8px 15px;
            float: left;
            font-size: 10px;
            color: #333;
            box-sizing: border-box;
            overflow: hidden;
        }

        .payment-box ol {
            padding-left: 14px;
            margin: 4px 0;
        }

        .payment-box ul {
            padding-left: 12px;
            margin: 2px 0;
        }

        .payment-box li {
            margin-bottom: 5px;
        }

        .payment-title {
            text-align: center;
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 6px;
        }

        /* Clearfix for floating elements */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>

    <div class="challan-wrap clearfix">

        <!-- ===== BANK COPY ===== -->
        <div class="copy-box">
            <div class="copy-header"
                style="border-top: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;">Bank Copy
            </div>
            <div class="bank-name" style="border: 1px solid #333;">{{ $SapDetails->bank_name ?? 'N/A' }}</div>
            <div class="acct-block"
                style="border-bottom: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;"">
                A/C Title: {{ $SapDetails->bank_account_name ?? 'N/A' }}<br>
                Current Account # {{ $SapDetails->bank_account_no ?? 'N/A' }}
            </div>

            <table style="border-bottom: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;">
                <tr class="no-border">
                    <td style="width:65px;">Challan No:</td>
                    <td style="text-decoration:underline; width:80px;">{{$doc_no}}</td>
                    <td style="width:55px;">Dated</td>
                    <td style="text-decoration:underline;">{{ date('d-m-Y') }}</td>
                </tr>
                <tr class="no-border">
                    <td>Student Name</td>
                    <td colspan="3" style="text-decoration:underline;">{{$application->first_name . ' ' . $application->last_name}}</td>
                </tr>
                <tr class="no-border">
                    <td>Father Name</td>
                    <td colspan="3" style="text-decoration:underline;">{{$application->father_name}}</td>
                </tr>
                <tr class="no-border">
                    <td>Reg No:</td>
                    <td style="text-decoration:underline;">{{$application->oas_id}}</td>
                    <td>Session</td>
                    <td style="text-decoration:underline;">{{$application->session}}</td>
                </tr>
                <tr class="no-border">
                    <td>Program</td>
                    <td colspan="3" style="text-decoration:underline;">{{$application->preferenceOne->program_name ?? $application->program}}</td>
                </tr>
                <tr class="no-border">
                    <td>Dated:</td>
                    <td style="text-decoration:underline;">{{ date('d-m-Y') }}</td>
                    <td>Drawn On</td>
                    <td style="text-decoration:underline;">{{$drawnSession->session_type . ' ' . $drawnSession->session_year}}</td>

                </tr>
            </table>
            <br>
            <table style="border-collapse: collapse; width: 100%; border: 1px solid #333;margin: -14px 0 0 0;">
                <tr>
                    <th style="width:130px; border: 1px solid #333;">Particulars</th>
                    <th style="text-align:center; border: 1px solid #333;">Amount</th>
                </tr>

                <tr>
                    <td style="border: 1px solid #333;">Application Processing Fee</td>
                    <td style="text-align:center; font-weight:bold; border: 1px solid #333;">Rs. {{number_format($processingFee)}}</td>
                </tr>

                <tr>
                    <th style="border: 1px solid #333;">Total</th>
                    <th style="text-align:center; border: 1px solid #333;">Rs. {{number_format($processingFee)}}</th>
                </tr>
            </table>

            <table style="border-collapse: collapse; width: 100%; border: 1px solid #333;">

                <tr>
                    <td colspan="2" style="border: 1px solid #333;">
                        Amount In Words (Pak Rupees)<br>
                        <strong style="text-decoration:underline;">Rs. {{ $amount_words }}</strong> Only<br>
                        <span class="red">(NON-REFUNDABLE)</span>
                    </td>
                </tr>

                <tr>
                    <td style="font-size:10px; width:120px; border: 1px solid #333;">
                        <strong>Valid Upto</strong>
                    </td>
                    <td style="font-size:10px; width:120px; border: 1px solid #333;">
                        <strong>{{ date('d-m-Y', strtotime('+3 days')) }}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="border: 1px solid #333; padding:0;" class="sig-container-cell">
                        <table style="width:100%; border-collapse: collapse;" class="sig-table">
                            <tr>
                                <td style="border: 0; text-align:center;">
                                    _______________<br><strong>Riphah's F&amp;D Officer</strong>
                                </td>
                                <td style="border: 0; text-align:center;">
                                    _______________<br><strong>Bank Officer</strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="background:#eeeeee; font-size:10px; border: 1px solid #333;">
                        <strong>Please Mail Finances &amp; F&amp;D Copy To:</strong><br>
                        Islamic International Medical College Trust Al-Mizan Campus-274, Peshawar Road Rawalpindi.
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="font-size:10px; border: 1px solid #333;">
                        1. This Challan is accepted at all branches<br>
                        2. In case of online transfer fee, charges will be paid by the student.
                    </td>
                </tr>

            </table>
        </div>

        <!-- ===== STUDENT COPY ===== -->
        <div class="copy-box">
            <div class="copy-header"
                style="border-top: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;">Bank Copy
            </div>
            <div class="bank-name" style="border: 1px solid #333;">{{ $SapDetails->bank_name ?? 'N/A' }}</div>
            <div class="acct-block"
                style="border-bottom: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;"">
                A/C Title: {{ $SapDetails->bank_account_name ?? 'N/A' }}<br>
                Current Account # {{ $SapDetails->bank_account_no ?? 'N/A' }}
            </div>

            <table style="border-bottom: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;">
                <tr class="no-border">
                    <td style="width:65px;">Challan No:</td>
                    <td style="text-decoration:underline; width:80px;">{{$doc_no}}</td>
                    <td style="width:55px;">Dated</td>
                    <td style="text-decoration:underline;">{{ date('d-m-Y') }}</td>
                </tr>
                <tr class="no-border">
                    <td>Student Name</td>
                    <td colspan="3" style="text-decoration:underline;">{{$application->first_name . ' ' . $application->last_name}}</td>
                </tr>
                <tr class="no-border">
                    <td>Father Name</td>
                    <td colspan="3" style="text-decoration:underline;">{{$application->father_name}}</td>
                </tr>
                <tr class="no-border">
                    <td>Reg No:</td>
                    <td style="text-decoration:underline;">{{$application->oas_id}}</td>
                    <td>Session</td>
                    <td style="text-decoration:underline;">{{$application->session}}</td>
                </tr>
                <tr class="no-border">
                    <td>Program</td>
                    <td colspan="3" style="text-decoration:underline;">{{$application->preferenceOne->program_name ?? $application->program}}</td>
                </tr>
                <tr class="no-border">
                    <td>Dated:</td>
                    <td style="text-decoration:underline;">{{ date('d-m-Y') }}</td>
                    <td>Drawn On</td>
                    <td style="text-decoration:underline;">{{$drawnSession->session_type . ' ' . $drawnSession->session_year}}</td>
                </tr>
            </table>
            <br>
            <table style="border-collapse: collapse; width: 100%; border: 1px solid #333;margin: -14px 0 0 0;">
                <tr>
                    <th style="width:130px; border: 1px solid #333;">Particulars</th>
                    <th style="text-align:center; border: 1px solid #333;">Amount</th>
                </tr>

                <tr>
                    <td style="border: 1px solid #333;">Application Processing Fee</td>
                    <td style="text-align:center; font-weight:bold; border: 1px solid #333;">Rs. {{number_format($processingFee)}}</td>
                </tr>

                <tr>
                    <th style="border: 1px solid #333;">Total</th>
                    <th style="text-align:center; border: 1px solid #333;">Rs. {{number_format($processingFee)}}</th>
                </tr>
            </table>

            <table style="border-collapse: collapse; width: 100%; border: 1px solid #333;">

                <tr>
                    <td colspan="2" style="border: 1px solid #333;">
                        Amount In Words (Pak Rupees)<br>
                        <strong style="text-decoration:underline;">Rs. {{ $amount_words }}</strong> Only<br>
                        <span class="red">(NON-REFUNDABLE)</span>
                    </td>
                </tr>

                <tr>
                    <td style="font-size:10px; width:120px; border: 1px solid #333;">
                        <strong>Valid Upto</strong>
                    </td>
                    <td style="font-size:10px; width:120px; border: 1px solid #333;">
                        <strong>{{ date('d-m-Y', strtotime('+3 days')) }}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="border: 1px solid #333; padding:0;" class="sig-container-cell">
                        <table style="width:100%; border-collapse: collapse;" class="sig-table">
                            <tr>
                                <td style="border: 0; text-align:center;">
                                    _______________<br><strong>Riphah's F&amp;D Officer</strong>
                                </td>
                                <td style="border: 0; text-align:center;">
                                    _______________<br><strong>Bank Officer</strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="background:#eeeeee; font-size:10px; border: 1px solid #333;">
                        <strong>Please Mail Finances &amp; F&amp;D Copy To:</strong><br>
                        Islamic International Medical College Trust Al-Mizan Campus-274, Peshawar Road Rawalpindi.
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="font-size:10px; border: 1px solid #333;">
                        1. This Challan is accepted at all branches<br>
                        2. In case of online transfer fee, charges will be paid by the student.
                    </td>
                </tr>

            </table>
        </div>

        <!-- ===== PAYMENT METHODS ===== -->
        <div class="payment-box" style="border: 1px solid #333;">
            <div class="payment-title">PAYMENT METHODS</div>
            <p style="font-size:10px; margin:0 0 6px;">
                <b>YOU CAN PAY YOUR FEE USING ANY OF THE FOLLOWING METHODS:</b>
            </p>
            <ol style="margin:0; padding-left:14px;">
                 <li style="margin-bottom:6px;">CASH DEPOSIT AT ALL BRANCHES OF MENTIONED BANK.</li>
                <li style="margin-bottom:6px;">ONLINE VIA KUICKPAY PAYMENT GATEWAY USING <b>BELOW STEPS:</b>
                    <ul style="margin:5px 0; padding-left:14px;">
                        <li><b>STEP 1:</b> SIGN INTO YOUR INTERNET BANKING, MOBILE BANKING OR VISIT AN ATM MACHINE.</li>
                        <li><b>STEP 2:</b> SELECT KUICKPAY IN BILL PAYMENT / PAYMENT CATEGORIES.</li>
                        <li><b>STEP 3:</b> Enter Con ID <b><u>{{$conID}}</u></b> &amp; Continue</li>
                        <li><b>STEP 4:</b> CONFIRM YOUR VOUCHER DETAILS AND PROCEED TO PAYMENTS.
                            LIST OF BANKS PROVIDING KUICKPAY SERVICES:
                            <b><u><span style="word-break: break-all;">HTTPS://APP.KUICKPAY.COM/PAYMENTSBILLPAYMENT</span></u></b>
                        </li>
                    </ul>
                </li>
                <li><b>NIFT PAYMENTS:</b> LOGIN YOUR MOELLIM ACCOUNT AND USE # PAY NOW # OPTION AND FOLLOW THE
                    PROCEDURE.</li>
                <li><b>BANK INSTRUMENT:</b>
                    FEE CAN BE SUBMITTED THROUGH BANKING INSTRUMENT I.E. PO/DD/BC ISSUED BY YOUR CONCERNED BANK.
                    INSTRUMENT SHOULD BE DRAWN IN FAVOUR OF ACCOUNT TITLE MENTIONED AT TOP OF THIS VOUCHER.<br><br>
                    <b>* ADDITIONAL TRANSACTION CHARGES SHALL APPLY FOR PAYMENTS VIA KUICKPAY AND NIFT.<br>
                        ** PAYMENT METHODS OTHER THAN MENTIONED ABOVE ARE NOT ACCEPTABLE AND MAY LEAD YOU TO FINANCIAL
                        LOSS.<br>
                        *** KEEP TRANSACTION EVIDENCE IN YOUR SAFE CUSTODY FOR ONWARDS PROVISIONING TO RIPHAH IN CASE
                        ANY CONFIRMATION IS REQUIRED.</b>
                </li>
            </ol>
        </div>

    </div>
</body>

</html>
