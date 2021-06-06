@extends('layout.app')

@section('title', 'Login')

@section('content')
    <div class="text-center">
        <form class="form-signin" method="POST" action="/user/login">
            @csrf
            <h1 class="h3 mb-3 fw-normal">
                Please sign in
            </h1>
            <div class="form-floating">
                <input name="email" type="text" class="form-control" id="email" placeholder="s3######0@student.rmit.com.au">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-grid gap-2">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <a class="w-100 btn btn-lg btn-info" href="/user/register">Register</a>
            </div>
        </form>
    </div>
@endsection