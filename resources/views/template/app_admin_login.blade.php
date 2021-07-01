<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>DIGISIAP | FINAPPS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Bootstrap -->
        <link href="{{ url('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ url('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ url('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ url('assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ url('assets/build/css/custom.min.css') }}" rel="stylesheet">

        <!-- App Icons -->
        <link rel="icon" href="{{ url('assets/images/favicon.ico') }}" type="image/ico" sizes="16x16"/>

    </head>


    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            @yield('content_admin_login')

        

    </body>
</html>