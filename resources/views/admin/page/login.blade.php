<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('style')
    <title>Toko Online | {{ $title }}</title>
</head>

<body>

    <main class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 m-auto" style="width: 30vw;">
            <div class="card-header bg-transparent text-center">
                <h5>{{ $name }}</h5>
            </div>
            <form action="{{ route('loginProses') }}" method="POST">
                @csrf
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Oppss...!</b> {{ session('error') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="p-2 form-control-plaintext" id="email" name="email"
                                value="" autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <button type="submit" class="btn btn-success w-100 mt-2">Login Now</button>
                    <button type="submit" class="btn btn-danger w-100 mt-2">Lupa Password</button>
                </div>
            </form>
        </div>
    </main>

    @include('sweetalert::alert')
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@stack('scripts')

</html>
