<div style="width:100%; max-width:750px; margin:0 auto;">
<table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
    <tbody>
        <tr>
            <td valign="top" style="text-align:center;">
                <p><b style="font-size:23px;">Riphah International University</b></p>
                <p>(A project of IIMCT Trust)</p>
            </td>
        </tr>
    </tbody>
</table>

<br>

<table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
    <tbody>
        <tr>
            <td style="text-align:center;">
                <p><b style="text-decoration:underline;">CASH RECEIPT</b></p>
            </td>
        </tr>
    </tbody>
</table>

<table border="0" cellspacing="5" cellpadding="4" style="width:100%;">
    <tbody>
        <tr>
            <td style="width:120px;"><b>Session:</b></td>
            <td style="width:160px;"><span style="text-decoration:underline;">{{ $application->session ?? 'N/A' }}</span></td>
            <td style="width:100px;"><b>Reciept:</b></td>
            <td><span style="text-decoration:underline;">{{ $receipt->id ?? 'N/A' }}</span></td>
        </tr>
        <tr>
            <td><b>OAS Number:</b></td>
            <td><span style="text-decoration:underline;">{{ $receipt->oas_id ?? 'N/A' }}</span></td>
            <td><b>Date:</b></td>
            <td><span style="text-decoration:underline;">{{ $receipt->created_at ?? 'N/A' }}</span></td>
        </tr>
        <tr>
            <td><b>Campus:</b></td>
            <td><span style="text-decoration:underline;">{{ $receipt->campus }}</span></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

<br>

<table border="0" cellspacing="0" cellpadding="4">
    <tbody>
        <tr>
            <td><p style="font-size:11px;">Received an amount of Rupees: Rs. {{$receipt->cash_received}}</p></td>
        </tr>
        <tr>
            <td><p style="font-size:11px;">In cash/PO&amp;&amp; DD: ___________ PO/DD #: ___________ Dated:{{ date('d-m-Y') }} Drawn On: ___________</p></td>
        </tr>
    </tbody>
</table>

<br>

<p><b style="text-decoration:underline;">With Thanks From</b></p>

<br>

<table border="0" cellspacing="5" cellpadding="4">
    <tbody>
        <tr>
            <td style="width:190px;">Mr. /Ms. (Candidate's Name):</td>
            <td style="width:160px;"><span style="text-decoration:underline;">{{$receipt->name}}</span></td>
            <td style="width:80px;">Contact #:</td>
            <td><span style="text-decoration:underline;">{{$application->mobile}}</span></td>
        </tr>
    </tbody>
</table>

<table border="0" cellspacing="5" cellpadding="4">
    <tbody>
        <tr>
            <td style="width:190px;">For admission to Program (s):</td>
            <td>1 - {{$receipt->program1_name}}</td>
        </tr>
    </tbody>
</table>

<br>

<p><b style="text-decoration:underline;">&nbsp;&nbsp;On account of following heads:</b></p>

<table border="1" cellspacing="0" cellpadding="8" style="width:100%;">
    <tbody>
        <tr>
            <td style="width:75%;"><p>Particulars</p></td>
            <td><p>Amount (Pak Rupees)</p></td>
        </tr>
        <tr>
            <td><p>Admission Processing Fee</p></td>
            <td><p>{{ $receipt->applicable_fee }}</p></td>
        </tr>
    </tbody>
</table>

<br><br>

<table border="1" cellspacing="0" cellpadding="5">
    <tbody>
        <tr>
            <td>
                <p><b>Admission Officer (Sign):</b>_____________</p>
                <p><b>Name:</b> _____________________________</p>
            </td>
        </tr>
    </tbody>
</table>

<br>

<p>Printed by: </p>

<p><b>*Receipt without signatures and stamp is considered FAKE*</b></p>
</div>
