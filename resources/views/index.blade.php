<!DOCTYPE html>
<html>
<head>
    <title>Blogs</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-dark bg-dark py-3">

    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand fw-bold" href="/">
            JobYaari Blog
        </a>

        <div>

            <a href="/admin/create" class="btn btn-light btn-sm me-2">
                Add Blog
            </a>

            <a href="/logout" class="btn btn-danger btn-sm">
                Logout
            </a>

        </div>

    </div>

</nav>
<div class="container py-3" style="max-width: 1100px;">
    <div class="text-center mb-5 animate__animated animate__fadeInDown">
         <h1 class="fw-bold" main-heading>Latest Blog Updates</h1>
        <p class="text-muted



<div class="row mb-4">

    <div class="col-md-6">
        <input type="text" id="searchInput" class="form-control" placeholder="Search blogs...">
    </div>

    <div class="col-md-6">
        <select id="categoryFilter" class="form-select">
            <option value="">All Categories</option>
            <option value="Latest Jobs">Latest Jobs</option>
            <option value="Admit Card">Admit Card</option>
            <option value="Results">Results</option>
        </select>
    </div>

</div>

<br><br>

<div class="card blog-card animate__animated animate__fadeInUp">

@foreach($blogs as $blog)

    <div class="card shadow-sm mb-4">
    <div class="card-body">
        <h2>{{ $blog->title }}</h2>

        <p>{{ $blog->short_description }}</p>

        <span class="badge bg-dark">
         {{ $blog->category }}
        </span>

        @if($blog->image)

   <img src="{{ asset('uploads/' . $blog->image) }}"
     class="blog-image rounded mt-3">

    @endif

        <br><br>

          <div class="mt-3">

            <a href="/admin/edit/{{ $blog->id }}" class="btn btn-primary">
             Edit
            </a>

           <a href="/admin/delete/{{ $blog->id }}"
            class="btn btn-danger"
              onclick="return confirm('Are you sure you want to delete this blog?')">
               Delete
            </a>

       
        </div>
    </div>

@endforeach
               

</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

function fetchBlogs() {

    let category = $('#categoryFilter').val();
    let search = $('#searchInput').val();

    $.ajax({
        url: '/filter',
        type: 'GET',
        data: {
            category: category,
            search: search
        },
        success: function(response) {
            $('#blogContainer').html(response);
        }
    });
}

$('#categoryFilter').change(function() {
    fetchBlogs();
});

$('#searchInput').keyup(function() {
    fetchBlogs();
});

</script>
</div>
</body>
</html>