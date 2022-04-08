@extends('layout/core')
@section('container')
    <div class="container mt-5">
        <h2>All Categories</h2>
    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach($categories as $c)
            <div class="col-md-4">
                <div class="card mb-2">
                    <img src="https://source.unsplash.com/500x400/?{{ $c->name }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4><a href="/blogs?category={{ $c->name }}" style="text-decoration: none">{{ $c->name }}</a></h4>  
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection