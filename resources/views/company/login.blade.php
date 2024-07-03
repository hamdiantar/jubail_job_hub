<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Jubail Job HUB | Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('admin/img/icon.ico') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset('admin/css/fonts.css') }}']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/azzara.min.css') }}">
    <style>
        .login .wrapper.wrapper-login .container-login, .login .wrapper.wrapper-login .container-signup {
            width: 400px;
            background: #112546;
            padding: 60px 25px;
            border-radius: 5px;
             border: none;
        }
        .form-floating-label .input-border-bottom+.placeholder {
            padding: 9px !important;
            font-size: 12px !important;
        }
        .input-border-bottom {
            border-width: 0 0 1px 0;
            border-radius: 5px;
            padding: 10px 7px;
        }
        .form-floating-label .form-control.filled+.placeholder, .form-floating-label .form-control:focus+.placeholder, .form-floating-label .form-control:valid+.placeholder {
            top: -8px;
        }
    </style>
</head>
<body style="background-color: #112546;" class="login">
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <img style="width: 100%;" src="{{asset('logo.png')}}">
        <h2 class="text-center text-white mt-4">Sign In To Your Company</h2>

        <div class="login-form">
            <form style="margin:29px 0;" method="POST" action="{{ route('company.login') }}">
                @csrf
                <div class="form-group form-floating-label">
                    <input id="username_or_email" value="{{old('username')}}" name="username" type="text" class="form-control input-border-bottom" required>
                    <label for="username_or_email" class="placeholder text-primary">Username or Email</label>
                </div>
                <div class="form-group form-floating-label">
                    <input id="password" name="password" type="password" class="form-control input-border-bottom" required>
                    <label for="password" class="placeholder text-primary">Password</label>
                    <div class="show-password">
                        <i class="flaticon-interface"></i>
                    </div>
                </div>
                <div class="row form-sub m-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme" name="">
                        <label class="custom-control-label text-primary" for="rememberme">Remember Me</label>
                    </div>

                    <a href="#" class="link float-right">Forget Password ?</a>
                </div>
                <div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-login">Sign In</button>
                </div>


            </form>
        </div>
    </div>
</div>

<script src="{{ asset('admin/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/ready.js') }}"></script>
<script src="{{ asset('admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

@if (session('error'))
    <script>
        $.notify({
            message: '{{ session('error') }}',
            title: 'Error',
            icon: 'fa fa-exclamation-triangle',
            url: '',
            target: '_self'
        },{
            type: 'danger',
            placement: {
                from: 'top',
                align: 'center'
            },
            time: 1000,
            delay: 5000,
        });
    </script>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            $.notify({
                message: '{{ $error }}',
                title: 'Error',
                icon: 'fa fa-exclamation-triangle',
                url: '',
                target: '_self'
            },{
                type: 'danger',
                placement: {
                    from: 'top',
                    align: 'center'
                },
                time: 1000,
                delay: 5000,
            });
        </script>
    @endforeach
@endif
</body>
</html>
