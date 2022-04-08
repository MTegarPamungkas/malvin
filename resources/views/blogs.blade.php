@extends("layout/core")
@section("container")

    <div class="container mb-4 text-center mt-5">
        <h3>All blogs {{ $title }}</h3>
    </div>

    <div class="row container justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/blogs" method="GET">
                @if (request(["category"]))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request(["user"]))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search a blog..." name="search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($blogs->count())
        <div class="container">
            <div class="card mb-3">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-bottom-right-radius: 10px;">
                    <a href='/blogs?category={{ $blogs[0]->category->slug }}' class="text-white text-decoration-none">{{ $blogs[0]->category->name }}</a>
                </div>
                @if($blogs[0]->image)
                    <div style="max-height: 500px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $blogs[0]->image) }}" class="img-fluid" alt="inet_err">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $blogs[0]->category->name }}" class="img-fluid" alt="inet_err" style="height: 300px;">
                @endif
                <div class="card-body">
                    <h4 class="card-title"><a href="/blogs/{{ $blogs[0]->slug }}" class="text-decoration-none text-dark">{{ $blogs[0]->title }}</a></h4>
                    <p class="card-text">by <strong><a href="/blogs?user={{ $blogs[0]->user->name }}" class="author-name">{{ $blogs[0]->user->name }}</a></strong></p>
                    <span class="badge text-secondary bg-transparent mb-2 px-0 d-flex">
                        <h6 class="mx-1"><i class='bi bi-heart-fill'></i> {{ $blogs[0]->likes }}</h6>
                        <h6 class="mx-1"><i class='bi bi-chat-right-dots-fill'></i> {{ $blogs[0]->comments }}</h6>
                    </span>
                    
                    <div class="buttons-group">
                        <a href="/blogs/{{ $blogs[0]->slug }}" class="text-decoration-none btn btn-primary mb-2">Visit Blog</a>
                    </div>
                    
                    <p class="card-text"><small class="text-muted">Last updated {{ $blogs[0]->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                @foreach($blogs->skip(1) as $b)
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-bottom-right-radius: 10px;">
                            <a href='/blogs?category={{ $b->category->slug }}' class="text-white text-decoration-none">{{ $b->category->name }}</a>
                        </div>
                        @if($b->image)
                            <div style="max-height: 400px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $b->image) }}" class="img-fluid" alt="inet_err">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/1200x400?{{ $b->category->name }}" class="img-fluid" alt="inet_err" style="height: 300px;">
                        @endif
                        
                        <div class="card-body">
                            <h6 class="card-title">{{ $b->title }}</h6>
                            <p class="card-text">by <strong><a href="/blogs?user={{ $b->user->name }}" class="author-name">{{ $b->user->name }}</a></strong></p>
                            <span class="badge text-secondary bg-transparent mb-2 px-0 d-flex">
                                <h6 class="mx-1"><i class='bi bi-heart-fill'></i> {{ $b->likes }}</h6>
                                <h6 class="mx-1"><i class='bi bi-chat-right-dots-fill'></i> {{ $b->comments }}</h6>
                            </span>
                            <div class="buttons-group">
                                <a href="/blogs/{{ $b->slug }}" class="text-decoration-none btn btn-primary mb-2">Visit Blog</a>                       
                                <p class="card-text"><small class="text-muted">Last updated {{ $b->created_at->diffForHumans() }}</small></p> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">There is no blogs !</p>
    @endif
    
    <div class="container paginator-btn mt-5 d-flex justify-content-center mb-5">
        {{ $blogs->links() }}
    </div>
@endsection