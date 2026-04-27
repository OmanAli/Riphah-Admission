<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://admissions.riphah.edu.pk/riphah_demo/public/assets/css/bootstrap.min.css">
    <meta name="facebook-domain-verification" content="regfny8yt9ugwwie5fsicq45g0z9ps" />
    <link rel="stylesheet" type="text/css" href="https://admissions.riphah.edu.pk/riphah_demo/public/assets/css/login.css?v=62924">
    <link rel="shortcut icon" href="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Admissions Portal | Riphah International University</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body class="over-hidden">
    <div class="login-wrapper">
        <div class="row pt-4">
            <div class="col-lg-6">
                <div class="heading">
                    <h1 class="text-white text-center">ADMISSIONS PORTAL</h1>
                </div>
                <p class="fst-italic secondary-heading">LOOKING TO JOIN RIPHAH?</p>
            </div>
            <div class="col-lg-6">
                <img class="my-right"
                    src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/admissions portal-logo.png"
                    id="logo">
            </div>
        </div>
        <div class="v-align-center">
            <div class="container-fluid">
                <div class="row login-form">
                    <div class="col-md-5 col-lg-5">
                        <div class="mt-form">

                            <div class="d-flex">

                                <h1 class="main-heading my-blue">Login</h1>

                                <p class="text-secondary" id="login-extra-text"> &nbsp;(Already have an account)</p>


                            </div>

                            <form action="{{ route('login') }}" method="post">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible"
                                        style="background-color: #f8d7da; border-color:#f5c6cb; color:#721c24; margin-bottom: 17px;width: 82%;">

                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach

                                    </div>
                                @endif
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-10">
                                        <input type="email" class="form-control border-0 bg-light shadow-none"
                                            placeholder="Email" value="" name="email" autofocus required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 col-lg-10">
                                        <input type="password" class="form-control border-0 bg-light shadow-none"
                                            placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <div class="d-flex pb-4">
                                    <button type="submit"
                                        class="fw-bold shadow-none padding-login text-white border-0 hover-none text-decoration-none rounded-2">
                                        Login
                                    </button>
                                    <a href="{{ route('password.request') }}"
                                        class="forgot-pass text-primary pt-2 mx-2">Forgot your Password ? </a>
                                </div>
                                <div class="d-flex">
                                    <div class="bottom-button">
                                        <a href="{{ route('register') }}"
                                            class="bottom-button btn btn-none  border border-primary rounded-4">Create
                                            an
                                            Account</a>
                                    </div>
                                </div>
                                <div style="margin:6px 8px 4px 8px;">
                                    <span>OR</span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div id="g_id_onload"
                                            data-client_id="313188220530-q1qdibo66hs9lkvjfok7sd52og42r8e2.apps.googleusercontent.com"
                                            data-callback="handleCredentialResponse">
                                        </div>
                                        <div class="g_id_signin" data-width="250" data-type="standard"></div>
                                    </div>
                                    <!--<div class="col-sm-12 col-lg-6 mt-2 mt-xl-0 mt-lg-0 mt-xxl-0">
                                    <div class="fb-login-button" data-onlogin="login()" data-width="250px" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false"></div>
                                </div>-->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--------------first part end-------------------->

                    <div class="col-md-7 col-lg-7">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">

                                <div class="text-center margin-auto">
                                    <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/Awards-01.jpg"
                                        title="Canadian Accreditation Award" class="img-fluid" width="150px">
                                    <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/Awards-02.jpg"
                                        title="Aspire Award" class="img-fluid" width="150px">
                                </div>
                                <!------------second part
                            <div class="text-center">
                                <p class="text-center side-heading faculties">Our Campuses</p>
                            </div>
                            first row of images--------------->

                                <div class="d-flex justify-content-center">
                                    <div class="fac">
                                        <a target="_blank" href="https://www.riphah.edu.pk">
                                            <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/loc1.png"
                                                class="images">
                                            <div class="overlay p-one">
                                                Islamabad
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fac">
                                        <a target="_blank" href="https://riphah.edu.pk">
                                            <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/loc2.png"
                                                class="images">
                                            <div class="overlay p-one">
                                                Lahore
                                            </div>
                                        </a>
                                    </div>
                                    <div class="fac">
                                        <a target="_blank" href="https://riphah.edu.pk">
                                            <img src="https://admissions.riphah.edu.pk/riphah_demo/public/assets/images/loc3.png"
                                                class="images">
                                            <div class="overlay p-one">
                                                Malakand
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>


                        <!-----------End second row of images-------------->
                        <!--<div class="row pb-5 pt-2">-->
                        <!--    <div class="col-lg-12">-->
                        <!--        <div class="my-d-flex justify-content-center">-->
                        <!--            <a target="_blank" href="https://www.riphah.edu.pk/list-of-programs/">-->
                        <!--                <button class="btn my-btn">List of Programs</button>-->
                        <!--            </a>-->

                        <!--            <a target="_blank" href="https://www.riphah.edu.pk/fee-structure-2021/">-->
                        <!--                <button class="btn my-btn">Fee Structure</button>-->
                        <!--            </a>-->

                        <!--            <a target="_blank" href="https://www.riphah.edu.pk/scholarships/">-->
                        <!--                <button class="btn my-btn">Scholarships</button>-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="mystickyelements-fixed mystickyelements-position-right mystickyelements-position-screen-center mystickyelements-position-mobile-bottom mystickyelements-on-click mystickyelements-size-medium mystickyelements-mobile-size-small mystickyelements-entry-effect-slide-in mystickyelements-templates-default mystickyelements-bottom-social-channel-0 entry-effect"
            style="transition: all 0s ease 0s;">
            <div class="mystickyelement-lists-wrap">
                <ul class="mystickyelements-lists mystickyno-minimize">


                    <li id="mystickyelements-social-facebook_messenger"
                        class="mystickyelements-social-icon-li mystickyelements-social-facebook_messenger element-desktop-on element-mobile-on">


                        <span class="mystickyelements-social-icon social-facebook_messenger social-custom"
                            data-tab-setting="click" data-click="0" data-mobile-behavior="disable"
                            data-flyout="enable" style="background: #007FF7">

                            <span class="fab fa-facebook-messenger snipcss0-1-1-2"></span>

                        </span>
                        <span class="mystickyelements-social-text " style="background: #007FF7;">
                            <a target="_blank" href="https://m.me/RiphahUniversity" data-tab-setting="click"
                                data-flyout="enable">
                                Facebook Messenger </a>
                        </span>
                    </li>
                    <li id="mystickyelements-social-whatsapp"
                        class="mystickyelements-social-icon-li mystickyelements-social-whatsapp element-desktop-on element-mobile-on">


                        <span class="mystickyelements-social-icon social-whatsapp social-custom"
                            data-tab-setting="click" data-click="0" data-mobile-behavior="disable"
                            data-flyout="enable"
                            style="background: rgb(38, 211, 103); border-bottom-left-radius: 10px;">

                            <span class="fab fa-whatsapp"></span>

                        </span>
                        <!--923257864999-->
                        <span class="mystickyelements-social-text " style="background: #26D367;">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=923225757394"
                                data-tab-setting="click" data-flyout="enable">
                                WhatsApp </a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).click(function() {
            $('#mystickyelements-social-facebook_messenger').removeClass('elements-active');
            $('#mystickyelements-social-whatsapp').removeClass('elements-active');
        });

        $('#mystickyelements-social-whatsapp').on('click', function(e) {
            e.stopPropagation();
            $('#mystickyelements-social-whatsapp').addClass('elements-active');
            $('#mystickyelements-social-facebook_messenger').removeClass('elements-active');
        });

        $('#mystickyelements-social-facebook_messenger').on('click', function(e) {
            e.stopPropagation();
            $('#mystickyelements-social-facebook_messenger').addClass('elements-active');
            $('#mystickyelements-social-whatsapp').removeClass('elements-active');
        });
    </script>



    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="1529398804017866" theme_color="#104a78">
    </div>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '467238365291292',
                cookie: true,
                xfbml: true,
                version: 'v14.0'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


    <script>
        //RESPONSE DECODER
        function decodeJwtResponse(token) {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));

            return JSON.parse(jsonPayload);
        };
        //HANDLE GOOGLE LOGIN
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
        //HANDLE FB LOGIN
        function login() {
            FB.login(function(t) {
                t.authResponse ? (console.log("Welcome!  Fetching your information.... "),
                    FB.api("/me", {
                        locale: 'en_US',
                        fields: 'first_name,last_name,email'
                    }, function(t) {
                        // alert(t)
                        console.log("Good to see you, " + t.id + "."),
                            window.location = "sign-in/google/redirect?email=" + t.email + "&f_name=" + t
                            .first_name + "&l_name=" + t.last_name,
                            FB.logout()
                    })) : (console.log("User cancelled login or did not fully authorize."),
                    FB.logout(function(t) {}))
            }, {
                scope: "public_profile, email"
            })
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
