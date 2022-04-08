@extends("dashboard.layouts.core")

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Blogs</h1>
    </div>

    @if (session()->has("success"))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session("success") }}
      </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/blogs/create" class="btn btn-success mb-2">New</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th></th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Created at</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($blogs as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->category->name }}</td>
                    <td>{{ $b->created_at }}</td>
                    <td>
                        
                        <a href="/dashboard/blogs/{{ $b->slug }}" class="badge bg-primary">
                            <span data-feather="eye"></span>
                        </a>
                        <a href="/dashboard/blogs/{{ $b->slug }}/edit" class="badge bg-warning">
                            <span data-feather="edit-3"></span>
                        </a>
                        <form action="/dashboard/blogs/{{ $b->slug }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want to delete ?');"><span data-feather="trash-2"></span></button>
                        </form>                      
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection