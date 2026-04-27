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
                        <form method="POST" action="{{ route('application.german_course_application_store') }}"
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
                                                    <option value="Islamabad/Rawalpindi">
                                                        Islamabad/Rawalpindi</option>
                                                    </option>

                                                </select>
                                                <span class="text-danger">{{ $errors->first('campus_id') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">Select Level<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="level" id="level" class="form-control" required>
                                                    <option value="" selected disabled>- Select Level -</option>

                                                    <option value="D">
                                                        Diploma/Certificate
                                                    </option>

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
                                                    <option value="" selected disabled>- Select Program -</option>

                                                    @foreach ($programs as $key => $program)
                                                        <option value="{{ $program->id }}">{{ $program->program_name }}
                                                        </option>
                                                    @endforeach
                                                    {{-- <option value="A2">German Language - A2 (Elementary Level)</option>
                                                    <option value="B1">German Language - B1 (Beginner Level)</option>
                                                    <option value="B2">German Language - B2 (Elementary Level)</option> --}}
                                                </select>
                                                <span class="text-danger">{{ $errors->first('program_id') }}</span>
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
                                            <label class="col-sm-2 col-form-label">Last Institute/College<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('institute_college') }}" name="institute_college"
                                                    autofocus required>
                                                <span class="text-danger">{{ $errors->first('institute_college') }}</span>
                                            </div>
                                            <label class="col-sm-2 col-form-label">How did you hear about us?<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select name="hear_aboutus" class="form-select form-control-primary"
                                                    required>
                                                    <option value="">Select Source</option>
                                                    <option value="facebook"
                                                        {{ old('hear_aboutus') == 'facebook' ? 'selected' : '' }}>Facebook
                                                    </option>
                                                    <option value="instagram"
                                                        {{ old('hear_aboutus') == 'instagram' ? 'selected' : '' }}>
                                                        Instagram
                                                    </option>
                                                    <option value="other_newspaper"
                                                        {{ old('hear_aboutus') == 'newspaper' ? 'selected' : '' }}>
                                                        Newspaper</option>
                                                    <option value="from_a_friend_word_of_mouth"
                                                        {{ old('hear_aboutus') == 'from_a_friend_family' ? 'selected' : '' }}>
                                                        From a friend/Family</option>
                                                    <option value="billboard"
                                                        {{ old('hear_aboutus') == 'billboard' ? 'selected' : '' }}>
                                                        Billboard</option>

                                                </select>
                                                <span class="text-danger">{{ $errors->first('hear_aboutus') }}</span>
                                            </div>
                                        </div>
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

                                    </div>
                                </div>
                                <h5>Present Mailing Address</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label">Current Residential Address<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control"
                                                    value="{{ old('address_line') }}" name="address_line" autofocus
                                                    required>
                                                <span class="text-danger">{{ $errors->first('address_line') }}</span>
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
