<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login TORANG</title>
    <link rel="icon" href="{{ asset('logo/logo-torang.png') }}">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('template/dist/css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="/login" method="POST">
            @csrf
            <img class="mb-4" src="{{ asset('logo/logo-torang.png') }}" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">T O R A N G</h1>

            @if (session()->has('loginError'))
                <div class="alert alert-danger" role="alert">
                    <strong>{{ session('loginError') }}</strong>
                </div>
            @endif

            <div class="form-floating">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" autofocus
                    required>
                <label for="username">Username</label>
            </div>
            
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password" required>
                <label for="floatingPassword">Password</label>
            </div>

            {{-- <div class="form-floating">
                <select id="tahun" class="form-control" name="tahun" required>
                    @foreach ($daftar_tahun as $tahun)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endforeach
                </select>
                <label for="tahun">Tahun</label>
            </div> --}}

            <div class="checkbox mb-3">
                {{-- <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label> --}}
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>


</body>

</html>
