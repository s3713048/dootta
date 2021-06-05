<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CloudComputing Assignment 3 - @yield('title') Page</title>

        <!-- bootstrap 5.0.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }

            body {
                padding-bottom: 20px;
            }

            .navbar {
                margin-bottom: 20px;
            }

            .form-signin {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: auto;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body>
        <main>
            <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Dootta</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="/heros">Heros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/players">Players</a>
                            </li>
                        </ul>

                        @php
                            $currentUser = session('current_user');
                        @endphp

                        @if (! empty($currentUser))
                        <ul class="navbar-nav d-flex">
                            <li class="nav-item">
                                <a class="nav-link active" href="/logout">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/">{{ $currentUser['user_name'] }}</a>
                            </li>
                        </ul>
                        @endif

                    </div>
                </div>
            </nav>

            @show

            <div class="container">
                @yield('content')
            </div>
        
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>