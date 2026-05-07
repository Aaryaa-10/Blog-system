<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/">
            JobYaari Blog
        </a>

        <div>

            <a href="/" class="btn btn-light me-2">
                Home
            </a>

            <a href="/logout" class="btn btn-danger">
                Logout
            </a>

        </div>

    </div>
</nav>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow animate__animated animate__fadeInUp">

                <div class="card-body">

                    <h2 class="mb-4">
                        Edit Blog
                    </h2>

                    <form action="/admin/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="text" name="title" class="form-control mb-3" placeholder="Title">

                        <input type="text" name="short_description" class="form-control mb-3" placeholder="Short Description">

                        <textarea name="content" class="form-control mb-3" rows="5" placeholder="Content"></textarea>

                        <select name="category" class="form-select mb-3">
                            <option value="Latest Jobs">Latest Jobs</option>
                            <option value="Admit Card">Admit Card</option>
                            <option value="Results">Results</option>
                        </select>

                        <input type="file" name="image" class="form-control mb-3">

                        <button class="btn btn-dark">
                            Add Blog
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>