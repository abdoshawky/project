<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <title>{{ Config::get('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="">
        <link href="{{ url('/') }}/assets/backend/css/style.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/backend/css/ui.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/backend/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/backend/css/custom.css" rel="stylesheet">
    </head>
    <body class="account boxed separate-inputs" data-page="login">

        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block" style="margin-bottom:50px;">
            <div class="row">
                @if(Route::currentRouteName() == 'login')
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                @else
                <div class="col-sm-6 col-md-6 col-md-offset-3">
                @endif
                    <div class="account-wall">
                        <i class="user-img icons-faces-users-03"></i>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ url('/') }}/assets/backend/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/gsap/main-gsap.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/backstretch/backstretch.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/js/pages/login-v1.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/icheck/icheck.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/js/plugins.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/noty/jquery.noty.packaged.min.js"></script>
        <script src="{{ url('/') }}/assets/backend/js/pages/notifications.js"></script>
        <script src="{{ url('/') }}/assets/backend/js/notify.js"></script>
        <script src="{{ url('/') }}/assets/backend/plugins/bootstrap/js/jasny-bootstrap.min.js"></script> <!-- File Upload and Input Masks -->

        <!-- Start notification -->
        @if($errors->any())
        <script>
        $(document).ready(function(){
            @foreach($errors->all() as $message)
                notify("{{ $message }}","danger","bottomRight");
            @endforeach
        });
        </script>
        @endif

        @if(Session::get('error') != '')
        <script>
        $(document).ready(function(){
            notify("{{ Session::get('error') }}","danger","bottomRight");
        });
        </script>
        {{ Session::forget('error') }}
        @endif

        @if(Session::get('success') != '')
        <script>
        $(document).ready(function(){
            notify("{{ Session::get('success') }}","success","topCenter");
        });
        </script>
        {{ Session::forget('success') }}
        @endif
        <!-- End notification -->

    </body>
</html>