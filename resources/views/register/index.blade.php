@extends("layout/core")

@section("container")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-registration">
                <form class="mb-3" method="POST" action="/register">
                    @csrf

                    <h4 class="mb-3 fw-normal text-center">Registration Form</h4>
                
                    <div class="form-floating">
                        <input type="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email"
                        required value="{{ old('email') }}">
                        <label for="email" class="text-muted">Email address</label>
                        @error("email")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ex : Melinda Clover" name="name"
                        required value="{{ old('name') }}">
                        <label for="name" class="text-muted">Full Name</label>
                        @error("name")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password"
                        required>
                        <label for="password" class="text-muted">Password</label>
                        @error("password")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center">Already registered ? <a href="/login">Login here.</a></small>
        </main>
        </div>
    </div>

</div>
@endsection