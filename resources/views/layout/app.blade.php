<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','spatie')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row my-2">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="d-flex gap-2">
                    <a href="{{route('home')}}" class="btn btn-primary">Permission</a>
                    <a href="{{route('roles.home')}}" class="btn btn-warning">Role</a>
                    <a href="{{route('home')}}" class="btn btn-success">All users</a>
                </div>
            </div>
            <div class="col-6 m-auto">
                @if (Session::has('success'))
                <p class="alert alert-success p-3">{{Session::get('success')}}</p>
                @endif
            </div>
        </div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>