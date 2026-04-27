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
                            {{-- <li style="margin: 0 0 0 16px;">Documents must be uploaded in PDF format only.</li> --}}
                        </div>
                        <form method="POST" action="{{ route('application.mbbs_bds_application_store') }}"
                            enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            <div class="card-body">
                                {{-- <h5 class="mb-3">Campus & Level</h5> --}}
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Program<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="program" id="program" class="form-control" required>
                                                    <option value="" selected disabled>- Select Program -</option>
                                                    @foreach($programs as $program)
                                                        <option value="{{ $program->id }}"
                                                            {{ old('program') == $program->id ? 'selected' : '' }}>
                                                            {{ $program->program_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{ $errors->first('program') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">First Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('firstname') }}"
                                                    name="firstname" autofocus required>
                                                    </option>

                                                </select>
                                                <span class="text-danger">{{ $errors->first('program') }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Middle Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('middlename') }}"
                                                    name="middlename" autofocus>
                                                <span class="text-danger">{{ $errors->first('middlename') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Last Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('lastname') }}"
                                                    name="lastname" autofocus required>
                                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Father Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" value="{{ old('father_name') }}"
                                                    name="father_name" autofocus required>
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">CNIC/B.Form No<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="cnic"
                                                    data-inputmask="'mask': '99999-9999999-9'" value="{{ old('cnic') }}"
                                                    class="form-control" name="cnic" autofocus required>
                                                <span class="text-danger">{{ $errors->first('cnic') }}</span>
                                            </div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Hafiz E Quran<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="hafiz_e_quran" id="hafiz_e_quran" class="form-control"
                                                    required>
                                                    <option value="" selected disabled>- Select One -</option>

                                                    <option value="0"
                                                        {{ old('hafiz_e_quran') == '0' ? 'selected' : '' }}>
                                                        No</option>
                                                    </option>
                                                    <option value="1"
                                                        {{ old('hafiz_e_quran') == '1' ? 'selected' : '' }}>
                                                        Yes</option>
                                                    </option>

                                                </select>
                                                <span class="text-danger">{{ $errors->first('hafiz_e_quran') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Quota<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="quota" id="quota" class="form-control" required>
                                                    <option value="" selected disabled>- Select One -</option>

                                                    <option value="Local"
                                                        {{ old('quota') == 'Local' ? 'selected' : '' }}>
                                                        Local</option>
                                                    </option>
                                                    <option value="International"
                                                        {{ old('quota') == 'International' ? 'selected' : '' }}>
                                                        International/Overseas</option>
                                                    </option>

                                                </select>
                                                <span class="text-danger">{{ $errors->first('quota') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Mobile No.<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="phone_number"
                                                    data-inputmask="'mask': '0399-99999999'"
                                                    value="{{ old('phone_number') }}" class="form-control"
                                                    name="phone_number" autofocus required>
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Alternate No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="phone_number1" class="form-control"
                                                    value="{{ old('alternate_phone') }}"
                                                    data-inputmask="'mask': '0399-99999999'" name="alternate_phone"
                                                    autofocus>
                                                <span class="text-danger">{{ $errors->first('alternate_phone') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
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
                                            <label class="col-sm-2 col-form-label">Date of Birth<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="datepicker-here form-control digits"
                                                    data-language="en" value="{{ old('dob') }}" name="dob"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
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

                                            <label class="col-sm-2 col-form-label">Address<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('address_line') }}" name="address_line" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('address_line') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">CNIC/Passport(front image)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="file" class="form-control" name="cnic_passport_front"
                                                    accept="image/png, image/jpeg, image/jpg" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('cnic_passport_front') }}</span>
                                            </div>
                                            <label class="col-sm-3 col-form-label">CNIC/Passport(back image)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="file" class="form-control" name="cnic_passport_back"
                                                    accept="image/png, image/jpeg, image/jpg" autofocus requird>
                                                <span
                                                    class="text-danger">{{ $errors->first('cnic_passport_back') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Academic Information</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Please Select<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="education_level_1" id="matric" value="Matric" required>
                                                    <label class="form-check-label" for="matric">Matric</label>
                                                </div>
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="education_level_1" id="o_level" value="O-Level" required>
                                                    <label class="form-check-label" for="o_level">O-Level</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <span class="text-danger">{{ $errors->first('education_level_1') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Total Marks<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('education_level_1_total_marks') }}" name="education_level_1_total_marks" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('education_level_1_total_marks') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Obtained Marks<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('education_level_1_obtained_marks') }}" name="education_level_1_obtained_marks"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('education_level_1_obtained_marks') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Result Card(PDF)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control"
                                                    value="{{ old('education_level_1_result_card') }}" name="education_level_1_result_card" autofocus
                                                    required accept="application/pdf">
                                                <span class="text-danger">{{ $errors->first('education_level_1_result_card') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Please Select<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="education_level_2" id="Intermediate" value="Intermediate"
                                                        required>
                                                    <label class="form-check-label"
                                                        for="Intermediate">Intermediate</label>
                                                </div>
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="education_level_2" id="a_level" value="A-Level" required>
                                                    <label class="form-check-label" for="a_level">A-Level</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <span class="text-danger">{{ $errors->first('education_level_2') }}</span>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3 row">
                                            <label class="col-sm-2 col-form-label">Total Marks<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control"
                                                    value="{{ old('education_level_2_total_marks') }}" name="education_level_2_total_marks" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('education_level_2_total_marks') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Obtained Marks<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('education_level_2_obtained_marks') }}" name="education_level_2_obtained_marks"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('education_level_2_obtained_marks') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Result Card(PDF)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control"
                                                    value="{{ old('education_level_2_result_card') }}" name="education_level_2_result_card" autofocus
                                                    required accept="application/pdf">
                                                <span class="text-danger">{{ $errors->first('education_level_2_result_card') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5>Please note: These MCAT, UCAT, and SAT-II scores are applicable for
                                    international/overseas students only.</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">MDCAT/MCAT/UCAT/SAT-II Total Score<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"
                                                    name="entrance_total_marks" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('entrance_total_marks') }}</span>
                                            </div>
                                            <label class="col-sm-3 col-form-label">MDCAT/MCAT/UCAT/SAT-II Obtained
                                                Score<span class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"
                                                    name="entrance_obtained_marks" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('entrance_obtained_marks') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">MDCAT/MCAT/UCAT/SAT-II Result Year<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"
                                                    name="entrance_year" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('entrance_year') }}</span>
                                            </div>
                                            <label class="col-sm-3 col-form-label">MDCAT/MCAT/UCAT/SAT-II Roll Number<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"
                                                    name="entrance_roll_number" autofocus required>
                                                <span
                                                    class="text-danger">{{ $errors->first('entrance_roll_number') }}</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">MDCAT/MCAT/UCAT/SAT-II Passed From<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <select name="entrance_passed_from" id=""
                                                    class="form-control" autofocus required>
                                                    <option value="" selected disabled>Please Select</option>
                                                    <option value="Federal">Federal</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Sindh">Sindh</option>
                                                    <option value="KPK">Khyber Pakhtunkhwa</option>
                                                    <option value="Balochistan">Balochistan</option>
                                                    <option value="International">International</option>
                                                </select>
                                                <span
                                                    class="text-danger">{{ $errors->first('entrance_passed_from') }}</span>
                                            </div>
                                            <label class="col-sm-3 col-form-label">MDCAT/MCAT/UCAT/SAT-II Result Card(PDF)<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-3">
                                                <input type="file" class="form-control"
                                                    name="entrance_result_card" autofocus required
                                                    accept="application/pdf">
                                                <span
                                                    class="text-danger">{{ $errors->first('entrance_result_card') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
