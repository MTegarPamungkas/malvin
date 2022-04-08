@extends("layout/core")
@section("container")
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $pageName }}</h2>

                <h6 class="mt-3">author : <a href="/blogs?user={{ $name }}">{{ $name }}</a></h6>


                <form action="/blogs/{{ $slug }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="heart-btn btn btn-primary">
                        <i class="{{ $liker_qty == 0 ? 'bi bi-heart' : 'bi bi-heart-fill' }}"></i>
                        {{ $likes_total }}
                    </button>
                    <br>
                </form>
                
                <div class="mt-5">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7); border-bottom-right-radius: 10px;">
                        <a href='/blogs?category={{ $category->slug }}' class="text-white text-decoration-none">{{ $category->name }}</a>
                    </div>
                    @if($image)
                        <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="inet_err">
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $category->name }}" class="img-fluid" alt="inet_err" style="height: 300px;">
                    @endif
                </div>
                
                <article class="my-4">
                    {!! $body !!}
                </article>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h6 class="text-success">{{ $comments->count() }} comments</h6>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has("success"))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{ session("success") }}
                </div>
                @endif
                <form method="POST" action="/blogs/{{ $slug }}/comment">
                    @csrf
                    {{-- @method("create") --}}
                    <div class="mb-3">
                        
                        <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
                        value="{{ old('body') }}">
                        
                        <trix-editor input="body" placeholder="Add a comment..."></trix-editor>
                        @error("body")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>
        </div>    
    </div>
    
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            @foreach ($comments as $c)
                <div class="col-md-8 mb-4">
                    <div class="comments-heading d-flex align-items-center mb-2">
                        <h6 class="m-0 fw-bold">{{ $c->user->name }}</h6>
                        <span class="badge bg-transparent text-muted fw-normal">{{ $c->created_at->diffForHumans() }}</span>
                    </div>
                    {!! $c->body !!}
                </div>
            @endforeach
        </div>
    </div>
@endsection