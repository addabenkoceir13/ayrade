<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <title>Register | AYRADE </title>
    <style>
        .card-body {
            /* fallback for old browsers */
            background: #f7f4f4;


        }
    </style>
</head>
<body>
    <!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');height: 300px;"></div>
    <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="margin-top: -100px; backdrop-filter: blur(30px);">
        <div class="card-body py-5 px-md-5">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-5">Sign up </h2>
                <form method="POST" action="{{ route('auth.user.register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="d-flex justify-content-start mb-1" for="firstname">First name</label>
                            <input type="text" name="firstname" value="{{ old('firstname') }}" id="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter Your First name" />
                            @error('firstname')
                                <small class="text-danger d-block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="lastname">Last name</label>
                                <input type="text" name="lastname" value="{{ old('lastname') }}" id="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter Your Last name"/>
                                @error('lastname')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="email">Email address</label>
                                <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email address"/>
                                @error('email')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="phone">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" id="phone" class="form-control @error('phone') is-invalid @enderror" max="10" placeholder="Enter Your Phone"/>
                                @error('phone')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="password">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password"/>
                                @error('password')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div data-mdb-input-init class="form-outline">
                                <label class="d-flex justify-content-start mb-1" for="password_confirmation">Password Confirmation</label>
                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Your Password Confirmation"/>
                                @error('password_confirmation')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">
                        Sign up
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->
</body>
</html>
