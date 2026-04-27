<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-signin-client_id" content="924878551867-i7cnadpjmki0thmkl534s529icsr5s1g.apps.googleusercontent.com">
    <!-- <meta name="description" content="Enzo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities."/> -->
    <!-- <meta name="keywords" content="admin template, Enzo admin template, dashboard template, flat admin template, responsive admin template, web app"/> -->
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.jpg')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.jpg')}}" type="image/x-icon"/>
    <title>Admission Portal | Riphah International University</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}" />
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css')}}"/>
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader"></div>
    </div>
    <!-- Loader ends-->

    @yield('content')

      <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
      function onSignIn(googleUser) {
        // Get user information
        var profile = googleUser.getBasicProfile();
        var userId = profile.getId(); // Unique user ID
        var userName = profile.getName(); // User's name
        var userEmail = profile.getEmail(); // User's email

        // You can now use this information as needed, e.g., send it to your server
        // for user registration or authentication.

        // Example: Sending user data to the server using AJAX
        // $.ajax({
        //   url: 'your-server-endpoint',
        //   type: 'POST',
        //   data: { userId: userId, userName: userName, userEmail: userEmail },
        //   success: function(response) {
        //     // Handle the server's response here
        //   },
        //   error: function(xhr, status, error) {
        //     // Handle errors
        //   }
        // });
      }
    </script>

    </div>
  </body>
</html>
