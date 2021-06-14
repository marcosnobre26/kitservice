<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vendas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background: -webkit-linear-gradient(left, #e53935, #e35d5b)
        }

        .card {
            margin-top: 7rem !important
        }

        .contact-image {
            text-align: center
        }

        .contact-image img {
            border-radius: 6rem;
            margin-top: -4%;
            transform: rotate(29deg);
            max-height: 100px
        }

        form {
            padding: 0 1rem
        }

        .card_text {
            text-align: center;
            color: #e35d5b;
            margin-bottom: 3rem
        }

        .btn-send {
            color: #fff;
            background-color: #e35d5b;
            border-color: #e35d5b
        }

        .btn-send:hover {
            color: #fff;
            background-color: #e53935;
            border-color: #e53935
        }

        .isDisabled {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.5;
            text-decoration: none;
        }

        img,
        .logo {
            width: 150px;
            float: right;
            margin-top: 50px;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <input type="hidden" id="baseurl" name="baseurl" value="{{ config('app.url') }}" />
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12">
                <a href="{{ route('logout') }}" class=" mt-5 float-right text-white"
                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Sair</a>

                @include('alerts.success')
                @include('alerts.error')
                <div class="card">
                    <div class="card-body">
                        <h1 class="card_text mt-5">Desejos de Natal Palmas Shopping</h1>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <div class="logo">
            <img src="{{ asset('img/logoDix.png') }}" alt="">
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script>
    @stack('js')
</body>

</html>
