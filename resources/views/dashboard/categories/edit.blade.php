@extends("dashboard.layouts.core")

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/categories/{{ $category_slug }}">
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Category's Name</label>
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="name" name="name" autofocus
                value="{{ old('category_name', $category_name) }}">
                @error("category_name")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug', $category_slug) }}">
                @error("slug")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Confirm</button>
        </form>
    </div>

    <script>
        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        name.addEventListener("keyup", function() {
            slug.value = name.value;
            slug.value = name.value.toLowerCase().replace(/ /g,"-");
        });
    </script>
@endsection

