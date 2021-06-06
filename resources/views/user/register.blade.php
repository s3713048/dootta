@extends('layout.app')

@section('title', 'Register')

@section('content')
    <div class="text-center">
        <form class="form-signin" method="POST" action="/user/register">
            @csrf
            <h1 class="h3 mb-3 fw-normal">
                Create Account
            </h1>
            <div class="form-floating">
                <input name="email" type="text" class="form-control" id="email" placeholder="s3######0@student.rmit.com.au">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input name="user_name" type="text" class="form-control" id="user_name">
                <label for="user_name">Username</label>
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
                <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection