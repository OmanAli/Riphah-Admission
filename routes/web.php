<?php

use App\Http\Controllers\AdmissionManagementController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FinalFeeController;
use App\Http\Controllers\FeeManagementController;
use App\Http\Controllers\OASProgramController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SAPProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfferLetterController;
use App\Http\Controllers\SystemConfigController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');
Route::post('/update-password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update_password');

// <!--Student Dashboard--!>

// Applications
Route::prefix('application')->name('application.')->middleware('auth')->group(function () {
    // BS/MS
    Route::get('/form', [ApplicationController::class, 'form'])->name('form');
    Route::get('/form/{id}', [ApplicationController::class, 'edit_form'])->name('form_edit');
    Route::put('/form/{id}', [ApplicationController::class, 'application_update'])->name('form_update');
    Route::get('/get-programs', [ApplicationController::class, 'getPrograms'])->name('getPrograms');
    Route::post('/application-store', [ApplicationController::class, 'application_store'])->name('application_store');

    // German Language Course
    Route::get('/german-course-application', [ApplicationController::class, 'german_course_form'])->name('german_course_form');
    Route::post('/german-course-application-store', [ApplicationController::class, 'german_course_application_store'])->name('german_course_application_store');

    // MBBS/BDS
    Route::get('/mbbs-bds-application', [ApplicationController::class, 'mbbs_bds_form'])->name('mbbs_bds_form');
    Route::post('/mbbs-bds-application-store', [ApplicationController::class, 'mbbs_bds_application_store'])->name('mbbs_bds_application_store');

    //Fee Challan
    Route::get('/download/challan/{oasID}', [ApplicationController::class, 'download_challan'])->name('download_challan');
    Route::get('/upload-fee-challan', [ApplicationController::class, 'upload_challan'])->name('upload_challan');
    Route::post('/upload-fee-challan', [ApplicationController::class, 'save_challan'])->name('save_challan');
    Route::get('/offer-letter', [ApplicationController::class, 'offer_letter'])->name('offer_letter');
});
// <!--Admin Dashboard--!>
// System Config
Route::prefix('configuration')->name('configuration.')->middleware('auth')->group(function () {
    // fee structure
    Route::get('/fee-structure', [SystemConfigController::class, 'fee_structure'])->name('fee_structure');
    Route::post('/fee-structure-store', [SystemConfigController::class, 'fee_structure_store'])->name('fee_structure_store');
    Route::get('/fee-structure-delete/{ID}', [SystemConfigController::class, 'fee_structure_delete'])->name('fee_structure_delete');
    // campus
    Route::get('/campus', [SystemConfigController::class, 'campus'])->name('campus');
    Route::post('/campus-store', [SystemConfigController::class, 'campus_store'])->name('campus_store');
    Route::post('/campus-update', [SystemConfigController::class, 'campus_update'])->name('campus_update');
    // Department
    Route::get('/department', [SystemConfigController::class, 'departments'])->name('departments');
    Route::post('/department-store', [SystemConfigController::class, 'department_store'])->name('departments_store');
    Route::post('/department-update', [SystemConfigController::class, 'department_update'])->name('departments_update');

    // Programs
    Route::get('/campus/programs', [SystemConfigController::class, 'programs'])->name('programs');
    Route::get('/campus/program/add', [SystemConfigController::class, 'program_add'])->name('program_add');
    Route::get('/get-departments/{campus_id}', [SystemConfigController::class, 'getDepartments']);
    Route::post('/campus/program-store', [SystemConfigController::class, 'program_store'])->name('program_store');
    Route::post('/campus/program-update', [SystemConfigController::class, 'program_update'])->name('program_update');

    // Sessions
    Route::get('/sessions', [SystemConfigController::class, 'sessions'])->name('sessions');
    Route::post('/sessions-store', [SystemConfigController::class, 'sessions_store'])->name('sessions_store');
    Route::post('/sessions-update', [SystemConfigController::class, 'sessions_update'])->name('sessions_update');
});

Route::prefix('offer-letter')->name('offer_letter.')->middleware('auth')->group(function () {
    Route::get('/', [OfferLetterController::class, 'index'])->name('index');
    Route::get('/create', [OfferLetterController::class, 'create'])->name('create');
    Route::post('/store', [OfferLetterController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [OfferLetterController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [OfferLetterController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [OfferLetterController::class, 'destroy'])->name('destroy');
});
// <!--Admission/Finance Dashboard--!>
// Dashboard routes
Route::name('oas.')->middleware('auth')->group(function () {
    Route::any('/view-submitted-application/{oasID?}', [DashboardController::class, 'view_submitted_application'])->name('view_submitted_application');
    Route::get('/preview-submitted-application/{oasID}', [DashboardController::class, 'preview_submitted_application'])->name('preview_submitted_application');
    Route::get('/print-submitted-application/{oasID}', [DashboardController::class, 'print_submitted_application'])->name('print_submitted_application');
    Route::any('/approve-submitted-application/{oasID?}', [DashboardController::class, 'approve_submitted_application'])->name('approve_submitted_application');
    Route::post('/approve-application', [DashboardController::class, 'approve_application'])->name('approve_application');
    Route::any('/set-eligibility/{oasID?}', [DashboardController::class, 'set_eligibility'])->name('set_eligibility');
    Route::post('/save-eligibility', [DashboardController::class, 'save_eligibility'])->name('save_eligibility');
    Route::any('/edit-application/{oasID?}', [DashboardController::class, 'edit_application'])->name('edit_application');
});

Route::prefix('analysis')->name('analysis.')->middleware('auth')->group(function () {
    Route::any('/overview', [AnalysisController::class, 'overview'])->name('overview');
    Route::get('/session/spring', [AnalysisController::class, 'session_spring'])->name('session_spring');
    Route::get('/session/fall', [AnalysisController::class, 'session_fall'])->name('session_fall');
});

Route::middleware('auth')->group(function () {
    Route::any('/eligibility-check', [AdmissionManagementController::class, 'eligibility_check'])->name('eligibility_check');
    Route::get('/eligibility-update/{oasID}/{value}', [AdmissionManagementController::class, 'eligibility_update'])->name('eligibility_update');
    Route::get('/approve-admission', [AdmissionManagementController::class, 'approve_admission'])->name('approve_admission');
    Route::get('/approve-application', [AdmissionManagementController::class, 'approve_application'])->name('approve_application');
    Route::post('/publish-offer-letter', [AdmissionManagementController::class, 'publish_offer_letter'])->name('publish_offer_letter');
    Route::get('/download-offer-letter/{id}', [AdmissionManagementController::class, 'download_offer_letter'])->name('download_offer_letter');
    Route::get('/un-publish-offer-letter/{id}', [AdmissionManagementController::class, 'un_publish_offer_letter'])->name('un_publish_offer_letter');
    Route::get('/mbbs/bds-application', [AdmissionManagementController::class, 'mbbs_application'])->name('mbbs_application');
    Route::get('/register-users', [AdmissionManagementController::class, 'register_users'])->name('register_users');
});
// REPORTS
Route::prefix('reports')->name('report.')->middleware('auth')->group(function () {
    Route::get('/fee-report', [ReportsController::class, 'fee_report'])->name('fee_report');
    Route::get('/get-programs/{campusId}', [ReportsController::class, 'getPrograms']);
    Route::post('/fee-report', [ReportsController::class, 'fee_report_accountant'])->name('fee_report_accountant');
    Route::get('/application-report', [ReportsController::class, 'application_report'])->name('application_report');
    Route::get('/application-fee-report', [ReportsController::class, 'application_fee_report'])->name('application_fee_report');
    Route::post('/master-report', [ReportsController::class, 'master_report'])->name('master_report');

});


Route::name('fee.')->middleware('auth')->group(function () {
    Route::get('/pending-fee', [FeeManagementController::class, 'pending_fee'])->name('pending_fee');
    Route::get('/approved-fee', [FeeManagementController::class, 'approved_fee'])->name('approved_fee');
    Route::any('/receipt', [FeeManagementController::class, 'receipt'])->name('receipt');
    Route::post('/received', [FeeManagementController::class, 'received'])->name('received');
    Route::any('/download/receipt/{oasID}', [FeeManagementController::class, 'download_receipt'])->name('download_receipt');
});

Route::middleware('auth')->group(function () {
    Route::get('/program-fee-setup', [FeeManagementController::class, 'program_fee_setup'])->name('program_fee_setup');
});

Route::name('fee_report.')->middleware('auth')->group(function () {
    Route::get('/reports', [FeeManagementController::class, 'accountant'])->name('accountant');
    Route::post('/accountant/report', [FeeManagementController::class, 'accountant_report'])->name('accountant_report');
    Route::any('/receipt/report', [FeeManagementController::class, 'receipt_report'])->name('receipt_report');
});

Route::middleware('auth')->group(function () {
    Route::any('/fee-challan', [FeeManagementController::class, 'fee_challan'])->name('fee_challan');
    Route::any('/fee-refund', [FeeManagementController::class, 'fee_refund'])->name('fee_refund');
    Route::get('/get-bank-by-program/{id}', [FeeManagementController::class, 'getBankByProgram'])->name('get_bank_by_program');
    Route::any('/create-fee-challan/{oasID?}', [FeeManagementController::class, 'create_fee_challan'])->name('create_fee_challan');
    // Route::get('/download/challan/{oasID}', [FeeManagementController::class, 'download_challan'])->name('download_challan');
});

Route::prefix('final-fee')->name('finalfee.')->middleware('auth')->group(function () {
    Route::get('/add', [FinalFeeController::class, 'add'])->name('add');
    Route::post('/store', [FinalFeeController::class, 'store'])->name('store');
    Route::get('/view', [FinalFeeController::class, 'view'])->name('view');
    Route::get('/edit/{id}', [FinalFeeController::class, 'edit'])->name('edit');
    Route::put('{id}', [FinalFeeController::class, 'update'])->name('update');
});

Route::prefix('sap-program')->name('sap_program.')->middleware('auth')->group(function () {
    Route::get('/index', [SAPProgramController::class, 'index'])->name('index');
    Route::get('/add', [SAPProgramController::class, 'add'])->name('add');
    Route::post('/store', [SAPProgramController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SAPProgramController::class, 'edit'])->name('edit');
    Route::put('{id}', [SAPProgramController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [SAPProgramController::class, 'delete'])->name('delete');
});

Route::prefix('oas-program')->name('oas_program.')->middleware('auth')->group(function () {
    Route::get('/index', [OASProgramController::class, 'index'])->name('index');
});

Route::middleware('auth')->group(function () {
    Route::any('/program-change', [ApplicationController::class, 'program_change'])->name('program_change');
    Route::get('/program-details/{oas_id}', [ApplicationController::class, 'program_details'])->name('program_details');
});
