@extends("layout/core")

@section("container")
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(session()->has("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session("success") }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session()->has("loginFailed"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session("loginFailed") }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <main class="form-signin">
                    <form class="mb-3" action="/login" method="POST">
                        @csrf
                        <h4 class="mb-3 fw-normal text-center">Please Login</h4>
                    
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required
                            value="{{ old('email') }}" name="email">
                            <label for="email" class="text-muted">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required
                            name="password">
                            <label for="password" class="text-muted">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center">Not registered yet ? <a href="/register">Click here.</a></small>
              </main>
            </div>
    </div>
    </div>
@endsection