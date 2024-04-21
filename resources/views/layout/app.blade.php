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

<body class="bg-dark text-white">

    <div class="container">
        <header style="
            height: 70px;
            width:100%;
            padding:10px;
            display:flex;
             align-items:center;
             justify-content:space-between;
            background-color:black;
            ">
            <div class="d-flex gap-2">
                <a href="{{route('home')}}" class="btn btn-primary">Permission</a>
                <a href="{{route('roles.home')}}" class="btn btn-warning">Role</a>
                <a href="{{route('user.index')}}" class="btn btn-success">All users</a>
            </div>
            <div class="bg-warninig d-flex gap-1">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlciUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D"
                    style="height:50px;width:50px;border-radius:50%;object-fit:cover;" alt="">
                <div class="" style="height:40px;line-height:20px">
                    <h5 class="" style="font-size: 15px;color:rgb(158, 153, 153);line-height:20px">
                        {{auth()->user()->name}}</h5>
                    <span class="mb-3" style="font-size: 12px;color:gray;">{{auth()->user()->email}}</span>
                </div>
            </div>

        </header>
        <div class="row my-2">
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
