<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setubruk Coffee | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/admin/dist/css/adminlte.min.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('vendor/admin/dist/css/custom.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('vendor/admin/dist/img/Logo Setubruk-removebg-preview.png') }}">
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            overflow: hidden; /* Prevent scroll bars */
        }

        #bgVideo {
        position: fixed;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        z-index: -1;
        filter: brightness(0.6); /* Adjust values to make it darker */
    }


        .login-box {
            /* Your login box styles go here */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <video autoplay muted loop id="bgVideo">
        <source src="{{ asset('vendor/admin/dist/video/bg_main_website.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="login-box">
        <!-- Your login form goes here -->
        <!-- Example form -->
        <form>
            <!-- Form fields go here -->
        </form>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/admin/dist/js/adminlte.min.js') }}"></script>

    <script>
        setTimeout(function () {
            document.getElementById('alert').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>
