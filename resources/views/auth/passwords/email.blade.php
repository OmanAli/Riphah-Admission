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

    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/select2/css/select2.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/plugins/select2/css/select2-bootstrap.min.css"
        rel="stylesheet" type="text/css" />

    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/css/components.min.css"
        rel="stylesheet" id="style_components" type="text/css" />
    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/global/css/plugins.min.css" rel="stylesheet"
        type="text/css" />

    <link href="https://admission.riphah.edu.pk/riphah_demo/public/assets/pages/css/login.min.css" rel="stylesheet"
        type="text/css" />

    <link rel="shortcut icon" href="favicon.ico" />


</head>
<!-- END HEAD -->

<body class=" login" style="background-color:#fff;">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLN4KQJ8" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
                style="background-color: #f8d7da; border-color:#f5c6cb; color:#721c24; margin-bottom: 17px;width: 101%;">

                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach

            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible"
                style="background-color:#d4edda; border-color:#c3e6cb; color:#155724; margin-bottom:17px; width:101%;">

                {{ session('success') }}

            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <h3>Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="row">
                <div class="col-md-12">



                </div>
            </div>

            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>

                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                        name="email" />
                </div>
            </div>
            <div class="form-actions">
                <a href="{{ route('login') }}" id="back-btn" class="btn red btn-outline">Back </a>
                <button type="submit" class="btn green pull-right"> Submit </button>
            </div>
        </form>

        <!-- END LOGIN FORM -->

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
