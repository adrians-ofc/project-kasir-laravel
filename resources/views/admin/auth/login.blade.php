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
    <link rel="stylesheet" href="vendor/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="vendor/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vendor/admin/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/vendor/admin/dist/css/custom.css">
    <link rel="shortcut icon" href="/vendor/admin/dist/img/Logo Setubruk-removebg-preview.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    
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
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);  */
            /* Semi-transparent white background for the form */
            /* padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); */
        }
    </style>
</head>

<body class="hold-transition login-page" style="overflow: hidden;">
    <video autoplay muted loop id="bgVideo" style="position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%;">
        <source src="{{ asset('vendor/admin/dist/video/bg_main_website.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary" style="border-color: #003C2A; background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
            <div class="text-center mt-2">
                <img src="/vendor/admin/dist/img/Logo Setubruk-removebg-preview.png" alt="" width="70px">
            </div>
            <div class="card-header text-center">
                <a href="vendor/admin/index2.html" class="h2" style="color: #003C2A"><b>Setubruk</b> Coffee</a>
            </div>
            <div class="card-body" >
                <p class="login-box-msg">Sign in to start your session</p>
                
                @if (session()->has('loginError'))
                    <div class="alert alert-danger">{{ session('loginError') }}</div>
                @endif

                <form action="/login/do" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-block"
                        style="background-color: #003C2A; color: #fff;">Login</button>
                </form>
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="vendor/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vendor/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vendor/admin/dist/js/adminlte.min.js"></script>

    <script>
        setTimeout(function(){
          document.getElementById('alert').style.display = 'none';
      }, 3000); // Mengatur waktu tampilan alert dalam milidetik (3000 milidetik = 3 detik)
      </script>
</body>

</html>
