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
                        <form method="POST" action="{{ route('application.form_update', $application->id) }}" enctype="multipart/form-data" class="form theme-form">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <h5 class="mb-3">Campus & Level</h5>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">

                                            <label class="col-sm-2 col-form-label">Campus *</label>
                                            <div class="col-sm-4">
                                                <select name="campus_id" id="campus_id"
                                                    class="form-select form-control-primary" required>
                                                    <option value="" disabled>- Select Campus -</option>
                                                    @foreach ($campus as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ old('campus_id', $application->campus_id) == $c->id ? 'selected' : '' }}>
                                                            {{ $c->campus_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Level *</label>
                                            <div class="col-sm-4">
                                                <select name="level" id="level" class="form-control" required>
                                                    <option value="" disabled>- Select Level -</option>
                                                    <option value="UG"
                                                        {{ old('level', $application->level) == 'UG' ? 'selected' : '' }}>
                                                        Undergraduate</option>
                                                    <option value="PG"
                                                        {{ old('level', $application->level) == 'PG' ? 'selected' : '' }}>
                                                        Postgraduate</option>
                                                    <option value="D"
                                                        {{ old('level', $application->level) == 'D' ? 'selected' : '' }}>
                                                        Diploma/Certificate</option>
                                                    <option value="Ph.D"
                                                        {{ old('level', $application->level) == 'Ph.D' ? 'selected' : '' }}>
                                                        Doctoral</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-3 mt-2">Program Preference</h5>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">

                                            <label class="col-sm-2 col-form-label">Program Preference 1 *</label>
                                            <div class="col-sm-4">
                                                <select id="program_id" name="program_id"
                                                    data-selected="{{ old('program_id', $application->program_preference_1) }}"
                                                    class="form-select form-control-primary" required>
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Preference 2</label>
                                            <div class="col-sm-4">
                                                <select id="program_id_2" name="program_id_2"
                                                    data-selected="{{ old('program_id_2', $application->program_preference_2) }}"
                                                    class="form-select form-control-primary">
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Preference 3</label>
                                            <div class="col-sm-4">
                                                <select id="program_id_3" name="program_id_3"
                                                    data-selected="{{ old('program_id_3', $application->program_preference_3) }}"
                                                    class="form-select form-control-primary">
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Program Preference 4</label>
                                            <div class="col-sm-4">
                                                <select id="program_id_4" name="program_id_4"
                                                    data-selected="{{ old('program_id_4', $application->program_preference_4) }}"
                                                    class="form-select form-control-primary">
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h5 class="mt-2 mb-3">Personal Information</h5>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">First Name*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="firstname"
                                            value="{{ old('firstname', $application->first_name) }}" required>
                                    </div>

                                    <label class="col-sm-2 col-form-label">Middle Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="middlename"
                                            value="{{ old('middlename', $application->middle_name) }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Last Name*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="lastname"
                                            value="{{ old('lastname', $application->last_name) }}" required>
                                    </div>

                                    <label class="col-sm-2 col-form-label">Nationality*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nationality"
                                            value="{{ old('nationality', $application->nationality) }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">CNIC*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="cnic"
                                            value="{{ old('cnic', $application->cnic) }}" required>
                                    </div>

                                    <label class="col-sm-2 col-form-label">Gender*</label>
                                    <div class="col-sm-4">
                                        <select name="gender" class="form-select" required>
                                            <option value="1"
                                                {{ old('gender', $application->gender) == '1' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="2"
                                                {{ old('gender', $application->gender) == '2' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Date of Birth*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="dob"
                                            value="{{ old('dob', $application->dob) }}" required>
                                    </div>

                                    <label class="col-sm-2 col-form-label">Father Name*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="father_name"
                                            value="{{ old('father_name', $application->father_name) }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">College/Last Institute<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control"
                                            value="{{ $application->last_institute }}"
                                            data-inputmask="'mask': '9999-9999999-9'" name="college" autofocus required>
                                        <span class="text-danger">{{ $errors->first('college') }}</span>
                                    </div>

                                    <label class="col-sm-2 col-form-label">How did you hear about us?<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="hear_aboutus" class="form-select form-control-primary" required>
                                            <option value="">Select Source</option>

                                            <option value="jang_newspaper"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'jang_newspaper' ? 'selected' : '' }}>
                                                Jang Newspaper
                                            </option>

                                            <option value="the_news_newspaper"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'the_news_newspaper' ? 'selected' : '' }}>
                                                The News Newspaper
                                            </option>

                                            <option value="dawn_newspaper"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'dawn_newspaper' ? 'selected' : '' }}>
                                                Dawn Newspaper
                                            </option>

                                            <option value="express_newspaper"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'express_newspaper' ? 'selected' : '' }}>
                                                Express Newspaper
                                            </option>

                                            <option value="other_newspaper"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'other_newspaper' ? 'selected' : '' }}>
                                                Other Newspaper
                                            </option>

                                            <option value="riphah_website"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'riphah_website' ? 'selected' : '' }}>
                                                Riphah Website
                                            </option>

                                            <option value="riphah_fm_102.2"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'riphah_fm_102.2' ? 'selected' : '' }}>
                                                Riphah FM 102.2
                                            </option>

                                            <option value="other_fm_radio"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'other_fm_radio' ? 'selected' : '' }}>
                                                Other FM Radio
                                            </option>

                                            <option value="email_advertisement"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'email_advertisement' ? 'selected' : '' }}>
                                                Email Advertisement
                                            </option>

                                            <option value="online_banner"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'online_banner' ? 'selected' : '' }}>
                                                Online Banner
                                            </option>

                                            <option value="from_a_friend_word_of_mouth"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'from_a_friend_word_of_mouth' ? 'selected' : '' }}>
                                                From a friend/Word of Mouth
                                            </option>

                                            <option value="expo_exhibition_seminar"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'expo_exhibition_seminar' ? 'selected' : '' }}>
                                                Expo/Exhibition/Seminar
                                            </option>

                                            <option value="career_counseling_seminar_in_my_college"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'career_counseling_seminar_in_my_college' ? 'selected' : '' }}>
                                                Career Counseling Seminar in my college
                                            </option>

                                            <option value="billboard"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'billboard' ? 'selected' : '' }}>
                                                Billboard
                                            </option>

                                            <option value="walkin"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'walkin' ? 'selected' : '' }}>
                                                Walkin
                                            </option>

                                            <option value="facebook"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'facebook' ? 'selected' : '' }}>
                                                Facebook
                                            </option>

                                            <option value="radio"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'radio' ? 'selected' : '' }}>
                                                Radio Ad
                                            </option>

                                            <option value="sms"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'sms' ? 'selected' : '' }}>
                                                SMS
                                            </option>

                                            <option value="cable"
                                                {{ old('hear_aboutus', $application->hear_aboutus) == 'cable' ? 'selected' : '' }}>
                                                Cable Ad
                                            </option>

                                        </select>

                                        <span class="text-danger">{{ $errors->first('hear_aboutus') }}</span>
                                    </div>
                                </div>

                                <h5>Contact Information</h5>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Email*</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email', $application->email) }}" required>
                                    </div>

                                    <label class="col-sm-2 col-form-label">Mobile No.*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="phone_number"
                                            value="{{ old('phone_number', $application->mobile) }}" required>
                                    </div>
                                </div>
                                <h6>Present Mailing Address</h6>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Current Residential Address*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="address_line"
                                            value="{{ old('address_line', $application->address) }}" required>
                                    </div>

                                    <label class="col-sm-2 col-form-label">Alternate Phone No.</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="phone_number1" class="form-control"
                                            value="{{ $application->phone }}" data-inputmask="'mask': '0399-99999999'"
                                            name="phone_number1" autofocus>
                                        <span class="text-danger">{{ $errors->first('phone_number1') }}</span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Country<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="country"
                                            value="{{ $application->country }}" value="Pakistan" autofocus required>
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    </div>

                                    <label class="col-sm-2 col-form-label">City*</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="city"
                                            value="{{ old('city', $application->city) }}" required>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-end">
                                <button class="btn btn-primary">Update</button>
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
                            campus_id,
                            level,
                            session
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

                                let selected = $(id).data('selected');

                                let $el = $(id);
                                $el.empty();
                                $el.append('<option value="">- Select Program -</option>');

                                $.each(data, function(key, program) {

                                    let isSelected = selected == program.id ?
                                        'selected' : '';

                                    $el.append(
                                        '<option value="' + program.id + '" ' +
                                        isSelected + '>' +
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

            loadPrograms();

        });
    </script>
@endsection
