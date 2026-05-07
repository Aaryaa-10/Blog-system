@if(count($blogs) > 0)

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
                         class="img-fluid rounded mt-3"
                         style="max-height:300px;">
                @endif

            </div>

        </div>

    @endforeach

@else

    <div class="alert alert-warning">
        No blogs found.
    </div>

@endif