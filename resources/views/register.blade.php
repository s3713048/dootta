@extends('layout.app')

@section('title', 'Register')

@section('content')
    <div class="text-center">
        <h1 class="h3 mb-3 fw-normal">
            Create Account
        </h1>
        <div class="card">
            <form class="card-body" method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input name="user_name" type="text" class="form-control" id="user_name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                @isset($error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
                @endisset
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection