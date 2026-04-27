@extends('layouts.dashboard')
@section('title', 'Application Form')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Dashboard</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Apply</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger alert-dismissible"
                            style="background-color: #EBF8A4; border-color:#EBF8A4; color:#721c24; margin-bottom: 0px;">
                            <strong>Note!</strong>
                            <li style="margin: 0 0 0 16px;">All Fields with * mark are compulsory.</li>
                            <li style="margin: 0 0 0 16px;">Documents must be uploaded in PDF format only.</li>
                        </div>
                        <form method="POST" action="{{ route('application.application_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                <h5 class="mb-3">Campus & Level</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Campus <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="campus_id" id="campus_id"
                                                    class="form-select form-control-primary" name="select" required
                                                    autofocus>
                                                    <option value="" selected disabled>- Select Campus -</option>
                                                    @foreach ($campus as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ old('campus_id') == $c->id ? 'selected' : '' }}>
                                                            {{ $c->campus_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('campus_id') }}</span>
                                            </div>
                                            {{-- <label class="col-sm-2 col-form-label">Session <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select id="session_id" name="session_id"
                                                    class="form-select form-control-primary" name="select" required>
                                                    <option value="" selected disabled>
                                                        - Select Session -
                                                    </option>
                                                    @foreach ($sessions as $session)
                                                        <option value="{{ $session->id }}"
                                                            {{ old('session_id') == $session->id ? 'selected' : '' }}>
                                                            {{ $session->session_type }} - {{ $session->session_year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('session_id') }}</span>
                                            </div> --}}
                                            {{-- </div>
                                        <div class="mb-3 row"> --}}
                                            <label class="col-sm-2 col-form-label">Select Level<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="level" id="level" class="form-control" required>
                                                    <option value="" selected disabled>- Select Level -</option>
                                                    <option value="UG">
                                                        Undergraduate</option>
                                                    <option value="PG">
                                                        Postgraduate</option>
                                                    <option value="D">
                                                        Diploma/Certificate
                                                    </option>
                                                    <option value="Ph.D">
                                                        Doctoral</option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('level') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mb-3 mt-2">Program Preference</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">

                                            <label class="col-sm-2 col-form-label">Program Preference 1 <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select id="program_id" name="program_id"
                                                    class="form-select form-control-primary" required>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('program_id') }}</span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Preference 2</label>
                                            <div class="col-sm-4">
                                                <select id="program_id_2" name="program_id_2"
                                                    class="form-select form-control-primary">
                                                </select>
                                                <span class="text-danger">{{ $errors->first('program_id_2') }}</span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Preference 3</label>
                                            <div class="col-sm-4">
                                                <select id="program_id_3" name="program_id_3"
                                                    class="form-select form-control-primary">
                                                </select>
                                                <span class="text-danger">{{ $errors->first('program_id_3') }}</span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Preference 4</label>
                                            <div class="col-sm-4">
                                                <select id="program_id_4" name="program_id_4"
                                                    class="form-select form-control-primary">
                                                </select>
                                                <span class="text-danger">{{ $errors->first('program_id_4') }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-2 mb-3">Personal Information</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">First Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('firstname') }}"
                                                    name="firstname" autofocus required>
                                                <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Middle Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('middlename') }}"
                                                    name="middlename" autofocus>
                                                <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Last Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('lastname') }}"
                                                    name="lastname" autofocus required>
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Nationality<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('nationality') ?? 'Pakistani' }}" name="nationality"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('nationality') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">CNIC/B.Form No<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="cnic"
                                                    data-inputmask="'mask': '99999-9999999-9'"
                                                    value="{{ old('cnic') }}" class="form-control" name="cnic"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('cnic') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Gender<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="gender" class="form-select form-control-primary" required>
                                                    <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="2" {{ old('gender') == '2' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Date of Birth<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="datepicker-here form-control digits"
                                                    data-language="en" value="{{ old('dob') }}" name="dob"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            </div>
                                            {{-- <label class="col-sm-2 col-form-label">Religion<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('religion') }}"
                                                    name="religion" autofocus required>
                                                <span class="text-danger">{{ $errors->first('religion') }}</span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row"> --}}
                                            <label class="col-sm-2 col-form-label">Father Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('father_name') }}" name="father_name" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">College/Last Institute<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('college') }}"
                                                    name="college" autofocus required>
                                                <span class="text-danger">{{ $errors->first('college') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">How did you hear about us?<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="hear_aboutus" class="form-select form-control-primary"
                                                    required>
                                                    <option value="">Select Source</option>
                                                    <option value="jang_newspaper"
                                                        {{ old('hear_aboutus') == 'jang_newspaper' ? 'selected' : '' }}>
                                                        Jang Newspaper</option>
                                                    <option value="the_news_newspaper"
                                                        {{ old('hear_aboutus') == 'the_news_newspaper' ? 'selected' : '' }}>
                                                        The News Newspaper</option>
                                                    <option value="dawn_newspaper"
                                                        {{ old('hear_aboutus') == 'dawn_newspaper' ? 'selected' : '' }}>
                                                        Dawn Newspaper</option>
                                                    <option value="express_newspaper"
                                                        {{ old('hear_aboutus') == 'express_newspaper' ? 'selected' : '' }}>
                                                        Express Newspaper</option>
                                                    <option value="other_newspaper"
                                                        {{ old('hear_aboutus') == 'other_newspaper' ? 'selected' : '' }}>
                                                        Other Newspaper</option>
                                                    <option value="riphah_website"
                                                        {{ old('hear_aboutus') == 'riphah_website' ? 'selected' : '' }}>
                                                        Riphah Website</option>
                                                    <option value="riphah_fm_102.2"
                                                        {{ old('hear_aboutus') == 'riphah_fm_102.2' ? 'selected' : '' }}>
                                                        Riphah FM 102.2</option>
                                                    <option value="other_fm_radio"
                                                        {{ old('hear_aboutus') == 'other_fm_radio' ? 'selected' : '' }}>
                                                        Other FM Radio</option>
                                                    <option value="email_advertisement"
                                                        {{ old('hear_aboutus') == 'email_advertisement' ? 'selected' : '' }}>
                                                        Email Advertisement</option>
                                                    <option value="online_banner"
                                                        {{ old('hear_aboutus') == 'online_banner' ? 'selected' : '' }}>
                                                        Online Banner</option>
                                                    <option value="from_a_friend_word_of_mouth"
                                                        {{ old('hear_aboutus') == 'from_a_friend_word_of_mouth' ? 'selected' : '' }}>
                                                        From a friend/Word of Mouth</option>
                                                    <option value="expo_exhibition_seminar"
                                                        {{ old('hear_aboutus') == 'expo_exhibition_seminar' ? 'selected' : '' }}>
                                                        Expo/Exhibition/Seminar</option>
                                                    <option value="career_counseling_seminar_in_my_college"
                                                        {{ old('hear_aboutus') == 'career_counseling_seminar_in_my_college' ? 'selected' : '' }}>
                                                        Career Counseling Seminar in my college</option>
                                                    <option value="billboard"
                                                        {{ old('hear_aboutus') == 'billboard' ? 'selected' : '' }}>
                                                        Billboard</option>
                                                    <option value="walkin"
                                                        {{ old('hear_aboutus') == 'walkin' ? 'selected' : '' }}>Walkin
                                                    </option>
                                                    <option value="facebook"
                                                        {{ old('hear_aboutus') == 'facebook' ? 'selected' : '' }}>Facebook
                                                    </option>
                                                    <option value="radio"
                                                        {{ old('hear_aboutus') == 'radio' ? 'selected' : '' }}>Radio Ad
                                                    </option>
                                                    <option value="sms"
                                                        {{ old('hear_aboutus') == 'sms' ? 'selected' : '' }}>SMS</option>
                                                    <option value="cable"
                                                        {{ old('hear_aboutus') == 'cable' ? 'selected' : '' }}>Cable Ad
                                                    </option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('hear_aboutus') }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <h5>Contact Information</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Email<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="email" class="form-control" value="{{ old('email') }}"
                                                    name="email" autofocus required>
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Mobile No.<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="phone_number"
                                                    data-inputmask="'mask': '0399-99999999'"
                                                    value="{{ old('phone_number') }}" class="form-control"
                                                    name="phone_number" autofocus required>
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            </div>
                                        </div>
                                        <!-- <div class="card-header pb-0"> -->
                                        <h6>Present Mailing Address</h6>
                                        <!-- </div> -->
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Current Residential Address<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('address_line') }}" name="address_line" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('address_line') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Alternate Phone No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="phone_number1" class="form-control"
                                                    value="{{ old('phone_number1') }}"
                                                    data-inputmask="'mask': '0399-99999999'" name="phone_number1" autofocus>
                                                <span class="text-danger">{{ $errors->first('phone_number1') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Country<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="country"
                                                    value="{{ old('country') }}" value="Pakistan" autofocus required>
                                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">City<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('city') }}"
                                                    name="city" autofocus required>
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            </div>
                                        </div>


                                        {{-- <h6>Person to notify in case of emergency</h6>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Full Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('emergency_full_name') }}" name="emergency_full_name"
                                                    autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('emergency_full_name') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Relationship<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('emergency_relationship') }}"
                                                    name="emergency_relationship" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('emergency_relationship') }}</span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Phone<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="phone_number2"
                                                    value="{{ old('emergency_phone_no') }}"
                                                    data-inputmask="'mask': '0399-99999999'" class="form-control"
                                                    name="emergency_phone_no" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('emergency_phone_no') }}</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <h5>Academic Record</h5>
                                <div class="row">
                                    <div class="col">
                                        <h6>Matric</h6>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Degree<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('matric_degree') }}" name="matric_degree" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('matric_degree') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Obtained Marks <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('matric_obt_mark') }}" name="matric_obt_mark" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('matric_obt_mark') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Total Marks <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('matric_total_mark') }}" name="matric_total_mark"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('matric_total_mark') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Passing Year <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('matric_passing_year') }}" name="matric_passing_year"
                                                    autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('matric_passing_year') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">College/School <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('matric_college') }}" name="matric_college" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('matric_college') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Board <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('matric_board') }}" name="matric_board" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('matric_board') }}</span>
                                            </div>
                                        </div>
                                        <!-- <div class="card-header pb-0"> -->
                                        <h6>Intermediate</h6>
                                        <!-- </div> -->
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Degree<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('inter_degree') }}" name="inter_degree" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('inter_degree') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Obtained Marks <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('inter_obt_mark') }}" name="inter_obt_mark" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('inter_obt_mark') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Total Marks <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('inter_total_mark') }}" name="inter_total_mark"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('inter_total_mark') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Passing Year <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <!-- <input class="datepicker-here form-control digits"  value="{{ old('inter_passing_year') }}" name="inter_passing_year"  type="text" data-language="en" data-min-view="months" data-view="months" data-date-format="yyyy"> -->
                                                <input type="number" class="form-control"
                                                    value="{{ old('inter_passing_year') }}" name="inter_passing_year"
                                                    autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('inter_passing_year') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">College/School <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('inter_college') }}" name="inter_college" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('inter_college') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Board <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('inter_board') }}" name="inter_board" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('inter_board') }}</span>
                                            </div>
                                        </div>
                                        <!-- <div class="card-header pb-0"> -->
                                        <h6>Bachelor</h6>
                                        <!-- </div> -->
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Degree</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('bachelor_degree') }}" name="bachelor_degree"
                                                    autofocus>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Obtained Marks/CGPA</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('bachelor_obt_mark') }}" name="bachelor_obt_mark"
                                                    autofocus step="any">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Total Marks/CGPA</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('bachelor_total_mark') }}" name="bachelor_total_mark"
                                                    autofocus step="any">
                                            </div>
                                            <label class="col-sm-2 col-form-label">Passing Year </label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('bachelor_passing_year') }}"
                                                    name="bachelor_passing_year" autofocus>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">College/School </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('bachelor_college') }}" name="bachelor_college"
                                                    autofocus>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Board / Universty</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('bachelor_board') }}" name="bachelor_board" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Upload Document</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">HSSC(Intermediate/0-Level)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="hssc"
                                                    accept="application/pdf" autofocus required>
                                                <span class="text-danger">{{ $errors->first('hssc') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">CNIC<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="f_cnic"
                                                    accept="application/pdf" autofocus required>
                                                <span class="text-danger">{{ $errors->first('f_cnic') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">SSC(Matric)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="ssc"
                                                    accept="application/pdf" autofocus required>
                                                <span class="text-danger">{{ $errors->first('ssc') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                            </div>


                            <div class="card-footer text-start">
                                <div class="col-sm-12 text-end">
                                    <button class="btn btn-primary" type="submit">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            function loadPrograms() {
                let campus_id = $('#campus_id').val();
                let level = $('#level').val();
                let session = $('#session_id').val();

                if (campus_id && level) {
                    $.ajax({
                        url: "{{ route('application.getPrograms') }}",
                        type: "GET",
                        data: {
                            campus_id: campus_id,
                            level: level,
                            session: session
                        },
                        dataType: "json",
                        success: function(data) {

                            let dropdowns = [
                                '#program_id',
                                '#program_id_2',
                                '#program_id_3',
                                '#program_id_4'
                            ];

                            dropdowns.forEach(function(id) {

                                let $el = $(id);
                                $el.empty();

                                // Always select default option
                                $el.append(
                                    '<option value="" selected>- Select Program -</option>');

                                $.each(data, function(key, program) {
                                    $el.append(
                                        '<option value="' + program.id + '">' +
                                        program.program_name +
                                        '</option>'
                                    );
                                });

                            });

                        }
                    });
                }
            }

            $('#campus_id, #level').on('change', loadPrograms);

        });
    </script>


@endsection
