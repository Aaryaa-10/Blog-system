<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card shadow animate__animated animate__fadeInUp">

                <div class="card-body">

                    <h3 class="mb-4 text-center">Admin Login</h3>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/login-user" method="POST">

                        @csrf

                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">

                        <input type="password" name="password" class="form-control mb-3" placeholder="Password">

                        <button class="btn btn-dark w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>