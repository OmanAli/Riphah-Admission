<?php

namespace App\Http\Controllers;

use App\Models\AdmissionSession;
use App\Models\Application;
use App\Models\Campus;
use App\Models\EducationDetail;
use App\Models\EducationDocument;
use App\Models\FeeStructure;
use App\Models\FinalFee;
use App\Models\GermanLanguageApplication;
use App\Models\MBBS_BDS;
use App\Models\MbbsBds;
use App\Models\Program;
use App\Models\SapInvoiceDetail;
use App\Models\SapProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    public function form()
    {
        $campus = Campus::all();
        $sessions = AdmissionSession::where('session_status', 1)->get();
        return view('pages.student.admission.admission_form_general', compact('campus', 'sessions'));
    }

    public function getPrograms(Request $request)
    {
        $programs = Program::where('campus_id', $request->campus_id)
            ->where('program_type', $request->level)
            // ->where('session_id', (int)$request->session)
            ->where('fee_status', 1)
            ->where('sap_status', 1)
            ->where('active', 1)
            ->orderBy('program_name', 'asc')
            ->get();
        return response()->json($programs);
    }

    public function application_store(Request $request)
    {
        $request->validate([
            'campus_id'    => 'required',
            // 'session_id'      => 'required',
            'level'        => 'required',
            'program_id'   => 'required',
            'firstname'    => 'required',
            'lastname'     => 'required',
            'nationality'  => 'required',
            'cnic'         => 'required',
            'gender'       => 'required',
            'dob'          => 'required',
            // 'religion'     => 'required',
            'father_name'  => 'required',
            'college' => 'required',
            'hear_aboutus' => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required',
            'address_line' => 'required',
            'country'      => 'required',
            'city'      => 'required',
            // 'matric_degree' => 'required',
            // 'matric_obt_mark' => 'required',
            // 'matric_total_mark' => 'required',
            // 'matric_passing_year' => 'required',
            // 'matric_college' => 'required',
            // 'matric_board' => 'required',
            // 'inter_degree' => 'required',
            // 'inter_obt_mark' => 'required',
            // 'inter_total_mark' => 'required',
            // 'inter_passing_year' => 'required',
            // 'inter_college' => 'required',
            // 'inter_board' => 'required',
            // 'hssc'  => 'required|mimes:pdf|max:2048',
            // 'ssc'   => 'required|mimes:pdf|max:2048',
            // 'f_cnic' => 'required|mimes:pdf|max:2048',
        ]);
        try {

            DB::beginTransaction();
            do {
                $oas_id = random_int(100000, 999999);
            } while (Application::where('oas_id', $oas_id)->exists());
            $session = AdmissionSession::where('session_status', 1)->first();
            $application = Application::create([
                'oas_id' => $oas_id,
                'user_id' => Auth::id(),
                'campus_id' => $request->campus_id,
                'session' => $session->session_type . ' ' . $session->session_year,
                'level' => $request->level,
                'program_preference_1' => $request->program_id,
                'program_preference_2' => $request->program_id_1 ?? null,
                'program_preference_3' => $request->program_id_2 ?? null,
                'program_preference_4' => $request->program_id_3 ?? null,
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename ?? null,
                'last_name' => $request->lastname,
                'nationality' => $request->nationality,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'religion' => $request->religion ?? null,
                'father_name' => $request->father_name,
                'father_occupation' => $request->father_occuption ?? null,
                'email' => $request->email,
                'mobile' => $request->phone_number,
                'phone' => $request->phone_number1 ?? null,
                'address' => $request->address_line,
                'city' => $request->city,
                'country' => $request->country,
                'last_institute' => $request->college,
                'hear_aboutus' => $request->hear_aboutus,
                // 'emergency_contact_name' => $request->emergency_full_name,
                // 'emergency_contact_relation' => $request->emergency_relationship,
                // 'emergency_contact_phone' => $request->emergency_phone_no,
            ]);
            // EducationDetail::create([
            //     'application_id' => $application->id,
            //     'matric_degree' => $request->matric_degree,
            //     'matric_passing_year' => $request->matric_passing_year,
            //     'matric_total_marks' => $request->matric_total_mark,
            //     'matric_obtained_marks' => $request->matric_obt_mark,
            //     'matric_institute' => $request->matric_college,
            //     'matric_board_university' => $request->matric_board,
            //     'intermediate_degree' => $request->inter_degree,
            //     'intermediate_passing_year' => $request->inter_passing_year,
            //     'intermediate_total_marks' => $request->inter_total_mark,
            //     'intermediate_obtained_marks' => $request->inter_obt_mark,
            //     'intermediate_institute' => $request->inter_college,
            //     'intermediate_board_university' => $request->inter_board,
            //     'bachelor_degree' => $request->bachelor_degree,
            //     'bachelor_passing_year' => $request->bachelor_passing_year,
            //     'bachelor_total_marks' => $request->bachelor_total_mark,
            //     'bachelor_obtained_marks' => $request->bachelor_obt_mark,
            //     'bachelor_institute' => $request->bachelor_college,
            //     'bachelor_board_university' => $request->bachelor_board,
            // ]);
            // $uploadPath = public_path('uploads/applications');

            // if (!file_exists($uploadPath)) {
            //     mkdir($uploadPath, 0755, true);
            // }

            // $timestamp = time();
            // $unique = uniqid();
            // $firstName = strtolower(str_replace(' ', '_', $request->firstname));
            // $hsscName = $firstName . '_hssc_' . $timestamp . '_' . $unique . '.pdf';
            // $sscName  = $firstName . '_ssc_' . $timestamp . '_' . $unique . '.pdf';
            // $cnicName = $firstName . '_cnic_' . $timestamp . '_' . $unique . '.pdf';
            // $request->file('hssc')->move($uploadPath, $hsscName);
            // $request->file('ssc')->move($uploadPath, $sscName);
            // $request->file('f_cnic')->move($uploadPath, $cnicName);

            // EducationDocument::create([
            //     'application_id' => $application->id,
            //     'hssc_degree' => $hsscName,
            //     'ssc_degree' => $sscName,
            //     'cnic' => $cnicName,
            // ]);

            DB::commit();

            return redirect()->route('home')->with('message', 'Application Submitted Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit_form($id)
    {
        $application = Application::where('oas_id', $id)->first();
        if (!$application) {
            return back()->with('error', 'Application not found');
        }
        $campus = Campus::all();
        $sessions = AdmissionSession::where('session_status', 1)->get();
        return view('pages.student.admission.edit_admission_form_general', compact('campus', 'sessions', 'application'));
    }

    public function application_update(Request $request, $id)
    {
        $request->validate([
            'campus_id'    => 'required',
            'level'        => 'required',
            'program_id'   => 'required',
            'firstname'    => 'required',
            'lastname'     => 'required',
            'nationality'  => 'required',
            'cnic'         => 'required',
            'gender'       => 'required',
            'dob'          => 'required',
            'father_name'  => 'required',
            'college' => 'required',
            'hear_aboutus' => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required',
            'address_line' => 'required',
            'country'      => 'required',
            'city'      => 'required',
        ]);
        try {

            DB::beginTransaction();
            $application = Application::where('id', $id)->first();
            if (!$application) {
                return back()->with('error', 'Application not found');
            }
            $application->update([
                'campus_id' => $request->campus_id,
                'level' => $request->level,
                'program_preference_1' => $request->program_id,
                'program_preference_2' => $request->program_id_1 ?? null,
                'program_preference_3' => $request->program_id_2 ?? null,
                'program_preference_4' => $request->program_id_3 ?? null,
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename ?? null,
                'last_name' => $request->lastname,
                'nationality' => $request->nationality,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'religion' => $request->religion ?? null,
                'father_name' => $request->father_name,
                'father_occupation' => $request->father_occuption ?? null,
                'email' => $request->email,
                'mobile' => $request->phone_number,
                'phone' => $request->phone_number1 ?? null,
                'address' => $request->address_line,
                'city' => $request->city,
                'country' => $request->country,
                'last_institute' => $request->college,
                'hear_aboutus' => $request->hear_aboutus,
            ]);
            DB::commit();
            return redirect()->route('home')->with('message', 'Application Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // German Course
    public function german_course_form()
    {
        $programs = Program::where('program_type', 'Lang')->where('active', 1)->where('fee_status', 1)->where('sap_status', 1)->get();
        return view('pages.student.admission.admission_form_german_language', compact('programs'));
    }

    public function german_course_application_store(Request $request)
    {
        $request->validate([
            'campus_id'    => 'required',
            'level'        => 'required',
            'program_id'   => 'required',
            'firstname'    => 'required',
            'lastname'     => 'required',
            'nationality'  => 'required',
            'cnic'         => 'required',
            'gender'       => 'required',
            'dob'          => 'required',
            'father_name'  => 'required',
            'hear_aboutus' => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required',
            'alternate_phone' => 'required',
            'address_line' => 'required',
            'country'      => 'required',
            'city'         => 'required',
            'institute_college'     => 'required',
        ]);
        try {
            DB::beginTransaction();
            do {
                $oas_id = random_int(100000, 999999);
            } while (Application::where('oas_id', $oas_id)->exists());
            $session = AdmissionSession::where('session_status', 1)->first();
            $program = Program::where('id', $request->program_id)->first();
            $application = Application::create([
                'oas_id' => $oas_id,
                'user_id' => Auth::id(),
                'campus' => $request->campus_id,
                'level' => $request->level,
                'session' => $session->session_type . ' ' . $session->session_year,
                'program_preference_1' => $request->program_id,
                'program' => $program->program_name,
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename ?? null,
                'last_name' => $request->lastname,
                'nationality' => $request->nationality,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'father_name' => $request->father_name,
                'email' => $request->email,
                'mobile' => $request->phone_number,
                'phone' => $request->alternate_phone ?? null,
                'address' => $request->address_line,
                'city' => $request->city,
                'country' => $request->country,
                'hear_aboutus' => $request->hear_aboutus,
                'application_type' => 'German Language Course',
            ]);
            GermanLanguageApplication::create([
                'oas_id' => $oas_id,
                'user_id' => Auth::id(),
                'campus' => $request->campus_id,
                'level' => $request->level,
                'program' => $program->program_name,
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename ?? null,
                'last_name' => $request->lastname,
                'nationality' => $request->nationality,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'father_name' => $request->father_name,
                'email' => $request->email,
                'mobile' => $request->phone_number,
                'phone' => $request->alternate_phone ?? null,
                'address' => $request->address_line,
                'city' => $request->city,
                'country' => $request->country,
                'hear_aboutus' => $request->hear_aboutus,
                'institute' => $request->institute_college,
            ]);

            DB::commit();

            return redirect()->route('home')->with('message', 'Application Submitted Successfully!');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    // MBBS/BDS
    public function mbbs_bds_form()
    {
        $programs = Program::where('program_type', 'MBBS')->orwhere('program_type', 'BDS')->where('active', 1)->where('fee_status', 1)->where('sap_status', 1)->get();
        return view('pages.student.admission.admission_form_mbbs', compact('programs'));
    }


    public function mbbs_bds_application_store(Request $request)
    {
        $request->validate([
            'program'    => 'required',
            'firstname'    => 'required',
            'lastname'     => 'required',
            'father_name'  => 'required',
            'cnic'         => 'required',
            'hafiz_e_quran'         => 'required',
            'quota'         => 'required',
            'gender'       => 'required',
            'dob'          => 'required',
            'phone_number' => 'required',
            'alternate_phone' => 'required',
            'address_line' => 'required',
            'country'      => 'required',
            'education_level_1' => 'required',
            'education_level_2' => 'required',
            'education_level_1_total_marks' => 'required',
            'education_level_1_obtained_marks' => 'required',
            'education_level_2_total_marks' => 'required',
            'education_level_2_obtained_marks' => 'required',
            'entrance_total_marks' => 'required',
            'entrance_obtained_marks' => 'required',
            'entrance_year' => 'required',
            'entrance_roll_number' => 'required',
            'entrance_passed_from' => 'required',
            'cnic_passport_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cnic_passport_back'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'education_level_1_result_card' => 'required|mimes:pdf|max:2048',
            'education_level_2_result_card' => 'required|mimes:pdf|max:2048',
            'entrance_result_card' => 'required|mimes:pdf|max:2048',
        ]);

        try {

            DB::beginTransaction();
            do {
                $oas_id = random_int(100000, 999999);
            } while (Application::where('oas_id', $oas_id)->exists());
            $program = Program::where('id', $request->program)->first();
            $session = AdmissionSession::where('session_status', 1)->first();
            $application = Application::create([
                'oas_id' => $oas_id,
                'user_id' => Auth::id(),
                'level' => $program->program_type,
                'campus' => 'Islamabad/Rawalpindi',
                'program' => $program->program_name,
                'session' => $session->session_type . ' ' . $session->session_year,
                'program_preference_1' => $request->program,
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename ?? null,
                'last_name' => $request->lastname,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'father_name' => $request->father_name,
                'mobile' => $request->phone_number,
                'phone' => $request->alternate_phone ?? null,
                'address' => $request->address_line,
                'country' => $request->country,
                'application_type' => 'MBBS/BDS',
            ]);

            $uploadPath = public_path('uploads/applications');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $timestamp = time();
            $unique = uniqid();
            $firstName = strtolower(str_replace(' ', '_', $request->firstname));
            $cnicFront = $firstName . '_cnic_front_' . $timestamp . '_' . $unique . '.' . $request->file('cnic_passport_front')->extension();
            $cnicBack  = $firstName . '_cnic_back_' . $timestamp . '_' . $unique . '.' . $request->file('cnic_passport_back')->extension();
            $edu1 = $firstName . '_edu1_' . $timestamp . '_' . $unique . '.pdf';
            $edu2 = $firstName . '_edu2_' . $timestamp . '_' . $unique . '.pdf';
            $entrance = $firstName . '_entrance_' . $timestamp . '_' . $unique . '.pdf';
            $request->file('cnic_passport_front')->move($uploadPath, $cnicFront);
            $request->file('cnic_passport_back')->move($uploadPath, $cnicBack);
            $request->file('education_level_1_result_card')->move($uploadPath, $edu1);
            $request->file('education_level_2_result_card')->move($uploadPath, $edu2);
            $request->file('entrance_result_card')->move($uploadPath, $entrance);

            MbbsBds::create([
                'oas_id' => $oas_id,
                'user_id' => Auth::id(),
                'program' => $program->program_name,
                'first_name' => $request->firstname,
                'middle_name' => $request->middlename ?? null,
                'last_name' => $request->lastname,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'father_name' => $request->father_name,
                'haifz_quran' => $request->hafiz_e_quran,
                'mobile' => $request->phone_number,
                'phone' => $request->alternate_phone ?? null,
                'quota' => $request->quota,
                'address' => $request->address_line,
                'country' => $request->country,
                'education_level_1' => $request->education_level_1,
                'education_level_2' => $request->education_level_2,
                'education_level_1_total_marks' => $request->education_level_1_total_marks,
                'education_level_1_obtained_marks' => $request->education_level_1_obtained_marks,
                'education_level_2_total_marks' => $request->education_level_2_total_marks,
                'education_level_2_obtained_marks' => $request->education_level_2_obtained_marks,
                'entrance_total_marks' => $request->entrance_total_marks,
                'entrance_obtained_marks' => $request->entrance_obtained_marks,
                'entrance_year' => $request->entrance_year,
                'entrance_roll_number' => $request->entrance_roll_number,
                'entrance_passed_from' => $request->entrance_passed_from,
                'cnic_front' => $cnicFront,
                'cnic_back' => $cnicBack,
                'education_level_1_result_card' => $edu1,
                'education_level_2_result_card' => $edu2,
                'entrance_result_card' => $entrance
            ]);

            DB::commit();

            return redirect()->route('home')->with('message', 'Application Submitted Successfully!');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function download_challan($oasID)
    {
        $application = Application::where('oas_id', $oasID)->first();
        $SapDetails = SapProgram::where('oas_prg_id', $application->program_preference_1)->first();
        $doc_no = '20' . $oasID . '-0';
        $conID = '7319020' . $oasID . '0';

        $programIds = [
            $application->program_preference_1,
            $application->program_preference_2,
            $application->program_preference_3,
            $application->program_preference_4,
        ];
        $programIds = array_filter($programIds);
        $maxFeeRecord = FinalFee::whereIn('oas_program_id', $programIds)
            ->orderByDesc('processingFee')
            ->first();
        $processingFee = $maxFeeRecord->processingFee ?? 0;
        $amount_words = ucwords(trim($this->numberToWords($processingFee)));
        $drawnSession = AdmissionSession::where('session_status', 1)->first();

        $current_date = date("d-m-Y");
        $valid_date = date("d-m-Y", strtotime("+3 days"));
        $data = [
            'application' => $application,
            'doc_no' => $doc_no,
            'processingFee' => $processingFee,
            'amount_words' => $amount_words,
            'SapDetails' => $SapDetails,
            'conID' => $conID,
            'drawnSession' => $drawnSession,
            'valid_date' => $valid_date,
        ];
        //
        $sap_invoice = SapInvoiceDetail::where('doc_no', $doc_no)->first();
        $invoiceData = [
            'oas_id' => $oasID,
            'doc_no' => $doc_no,
            'program_id' => $application->program_preference_1,
            'total_amount' => $processingFee,
            'installments' => 0,
            'amount_due' => round($processingFee),
            'remaining' => 0,
            'due_date' => date("Y-m-d", strtotime($valid_date)),
            'created_by' => auth()->user()->id,
            'hk_tid' => $maxFeeRecord->house_bank_id,
        ];
        if (!$sap_invoice) {
            SapInvoiceDetail::create($invoiceData);
        } else {
            $sap_invoice->update($invoiceData);
        }
        $pdf = Pdf::loadView('pages.downloads.challan_pdf', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('Fee-Challan.pdf');
    }
    private function numberToWords($number)
    {
         $number = (int) $number;
        $ones = [
            0 => '',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen'
        ];

        $tens = [
            2 => 'twenty',
            3 => 'thirty',
            4 => 'forty',
            5 => 'fifty',
            6 => 'sixty',
            7 => 'seventy',
            8 => 'eighty',
            9 => 'ninety'
        ];

        if ($number == 0) return '';

        if ($number < 20) return $ones[$number];

        if ($number < 100) {
            $rem = $number % 10;
            return trim($tens[floor($number / 10)] . ($rem ? ' ' . $ones[$rem] : ''));
        }

        if ($number < 1000) {
            $rem = $number % 100;
            return trim(
                $ones[floor($number / 100)] . ' hundred' .
                    ($rem ? ' ' . $this->numberToWords($rem) : '')
            );
        }

        if ($number < 100000) {
            $rem = $number % 1000;
            return trim(
                $this->numberToWords(floor($number / 1000)) . ' thousand' .
                    ($rem ? ' ' . $this->numberToWords($rem) : '')
            );
        }

        if ($number < 10000000) {
            $rem = $number % 100000;
            return trim(
                $this->numberToWords(floor($number / 100000)) . ' lakh' .
                    ($rem ? ' ' . $this->numberToWords($rem) : '')
            );
        }

        $rem = $number % 10000000;
        return trim(
            $this->numberToWords(floor($number / 10000000)) . ' crore' .
                ($rem ? ' ' . $this->numberToWords($rem) : '')
        );
    }


    public function program_change(Request $request)
    {
        if ($request->isMethod('post')) {
            $application = Application::where('oas_id', $request->oas_id)->first();
            return view('pages.change_program', ['application' => $application]);
        } else {
            return view('pages.change_program');
        }
    }

    public function program_details($oas_id)
    {
        $application = Application::where('oas_id', $oas_id)->first();
        return view('pages.change_program_details', compact('application'));
    }

    public function upload_challan()
    {
        $applications = Application::where('user_id', Auth::id())->get();
        return view('pages.student.upload_fee_challan', compact('applications'));
    }
    public function save_challan(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'oas_id' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $timestamp = time();
            $unique = uniqid();
            $name = strtolower(str_replace(' ', '_', $request->oas_id));
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $challanName = $name . '_challan_' . $timestamp . '_' . $unique . '.' . $extension;
            $uploadPath = public_path('uploads/challan');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $file->move($uploadPath, $challanName);
            $challan = $challanName;
            return back()->with('message', 'File uploaded successfully');
        }

        return back()->with('error', 'Upload failed');
    }
}
