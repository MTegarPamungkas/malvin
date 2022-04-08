@extends("dashboard.layouts.core")

@section("container")
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8">
                <h2>{{ $title }}</h2>
                
                <div class="my-3">
                    <a href="/dashboard/blogs" class="btn btn-success">Back to my blogs</a>
                    <a href="/dashboard/blogs/{{ $blog_slug }}/edit" class="btn btn-warning text-white">Edit</a>
                    <form action="/dashboard/blogs/{{ $blog_slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?');">Delete</button>
                    </form>
                </div>
                    
                <div class="mt-4">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-bottom-right-radius: 10px;">
                        <a href='/blogs?category={{ $category_slug }}' class="text-white text-decoration-none">{{ $category_name }}</a>
                    </div>
                    {{-- {{ dd(asset('storage/' . $blogs[0]->image)) }} --}}

                    @if($blogs_image != NULL)
                        <img src="{{ asset('storage/' . $blogs_image) }}" class="img-fluid" alt="inet_err">
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $category_name }}" class="img-fluid" alt="inet_err" style="height: 300px;">
                    @endif
                </div>
                
                <article class="my-4">
                    {!! $body !!}
                </article>
            </div>
        </div>
    </div>
@endsection