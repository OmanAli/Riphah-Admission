<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Admissions Portal | Riphah International University</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/bootstrap/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/uniform/css/uniform.default.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
        rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/select2/css/select2.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/select2/css/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/css/components.min.css"
        rel="stylesheet" id="style_components" type="text/css" />
    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/css/plugins.min.css" rel="stylesheet"
        type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/pages/css/login.min.css" rel="stylesheet"
        type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />

</head>
<!-- END HEAD -->

<body class=" login" style="background-color:#fff;">
    <!-- BEGIN LOGO -->
    <div class="logo" style="margin-top:1px;">
        <a href="">
            <img src="https://admission.riphah.edu.pk/riphah_demo/public/assets/pages/img/logo.png" width="150px"
                style="padding-bottom:20px;" alt="" /> </a>
    </div>
    <br />
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content" style="margin-top:-25px;">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible"
                style="background-color: #f8d7da; border-color:#f5c6cb; color:#721c24; margin-bottom: 17px;width: 100%;">

                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach

            </div>
        @endif

        <form class="register-form" action="{{ route('register') }}" method="post" style="display:block;">
            @csrf
            <h3>Sign Up</h3>
            <p> Enter your account details below: </p>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Name</label>
                <div class="input-icon">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>

                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text"
                        value="{{ old('name') }}"autocomplete="off" placeholder="Name" name="name" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Mobile #</label>
                <div class="controls">
                    <div class="input-icon">
                        <i class="fa fa-mobile"></i>
                        <input class="form-control placeholder-no-fix" type="text" value="{{ old('mobile') }}"
                            data-rule-required="true" pattern="[03][0-9]{10}" autocomplete="off"
                            placeholder="03xxxxxxxxx" name="mobile" required />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <div class="controls">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" value="{{ old('email') }}"
                            autocomplete="off" placeholder="Email" name="email" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" value="" autocomplete="off"
                        id="register_password" placeholder="Password" name="password" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                <div class="controls">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                            placeholder="Re-type Your Password" name="password_confirmation" />
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('login') }}" id="register-back-btn" type="button" class="btn red btn-outline">
                    Back </a>
                <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up </button>
            </div>
        </form>

        {{-- <div class="text-center" style="margin:10px 0px 10px 0px;">
                <span>OR Sign Up with Google</span>
            </div> --}}
        <!--<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"  data-longtitle="true" title="Click to Login with Google"></div>-->
        <div id="g_id_onload"
            data-client_id="313188220530-q1qdibo66hs9lkvjfok7sd52og42r8e2.apps.googleusercontent.com"
            data-callback="handleCredentialResponse">
        </div>
        <div class="g_id_signin" data-width="340" data-type="standard"></div>





    </div>

    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/jquery.min.js"
        type="text/javascript"></script>
    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
    <script
        src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
    <script
        src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/jquery.blockui.min.js"
        type="text/javascript"></script>
    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/uniform/jquery.uniform.min.js"
        type="text/javascript"></script>
    <script
        src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script
        src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
    <script
        src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/jquery-validation/js/additional-methods.min.js"
        type="text/javascript"></script>
    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/select2/js/select2.full.min.js"
        type="text/javascript"></script>
    <script
        src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/backstretch/jquery.backstretch.min.js"
        type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/scripts/app.min.js"
        type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="https://admission.riphah.edu.pk/riphah_demo/public/assets/pages/scripts/login-4.min.js"
        type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
    <!--Start of Google Analytics Script-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29106908-4"></script>

    <script>
        const password = document.querySelector('input[name="password"]');
        const confirmPassword = document.querySelector('input[name="password_confirmation"]');

        // Create message element
        const message = document.createElement('small');
        message.classList.add('text-danger');
        confirmPassword.parentNode.appendChild(message);

        function checkPasswordMatch() {
            if (!confirmPassword.value) {
                message.textContent = '';
                return;
            }

            if (password.value !== confirmPassword.value) {
                message.textContent = 'Passwords do not match';
            } else {
                message.textContent = '';
            }
        }

        password.addEventListener('input', checkPasswordMatch);
        confirmPassword.addEventListener('input', checkPasswordMatch);
    </script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-29106908-4');
    </script>

    <!--End of Google Analytics Script--><!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v3.3'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="1529398804017866" theme_color="#a695c7">
    </div>

    <script>
        function decodeJwtResponse(token) {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));

            return JSON.parse(jsonPayload);
        };

        window.handleCredentialResponse = (response) => {
            // decodeJwtResponse() is a custom function defined by you
            // to decode the credential response.
            const responsePayload = decodeJwtResponse(response.credential);

            console.log("ID: " + responsePayload.sub);
            console.log('Full Name: ' + responsePayload.name);
            console.log('Given Name: ' + responsePayload.given_name);
            console.log('Family Name: ' + responsePayload.family_name);
            console.log("Image URL: " + responsePayload.picture);
            console.log("Email: " + responsePayload.email);

            window.location = "sign-in/google/redirect?email=" + responsePayload.email + "&f_name=" + responsePayload
                .given_name + "&l_name=" + responsePayload.family_name;

        }
    </script>

    <!--<script>
        -- >
        <
        !-- function onSignIn(t) {
            -- >
            <
            !--
            var e = t.getBasicProfile();
            -- >
            <
            !--console.log("ID: " + e.getId()), console.log("Given Name: " + e.getGivenName()), console.log(
                    "Family Name: " + e.getFamilyName()), console.log("Email: " + e.getEmail()), window.location =
                "sign-in/google/redirect?email=" + e.getEmail() + "&f_name=" + e.getGivenName() + "&l_name=" + e
                .getFamilyName(), t.disconnect();
            -- >
            <
            !--
            var n = t.getAuthResponse().id_token;
            -- >
            <
            !--console.log("ID Token: " + n) -- >
                <
                !--
        }-- >
        <
        !--
    </script>-->


    <script type='text/javascript'>
        window.smartlook || (function(d) {

            var o = smartlook = function() {
                    o.api.push(arguments)
                },
                h = d.getElementsByTagName('head')[0];

            var c = d.createElement('script');
            o.api = new Array();
            c.async = true;
            c.type = 'text/javascript';

            c.charset = 'utf-8';
            c.src = 'https://web-sdk.smartlook.com/recorder.js';
            h.appendChild(c);

        })(document);

        smartlook('init', 'bd4ab2cddf5673fe8d89add374c20ee0a18c36b2', {
            region: 'eu'
        });
    </script>
</body>

</html>
