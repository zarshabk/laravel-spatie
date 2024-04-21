<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel-spatie login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="height:100vh;
    width:100vw;
    background:url('https://cdn.pixabay.com/photo/2018/01/14/23/12/nature-3082832_1280.jpg');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6 m-auto col-md-8">
                <div class="card">
                    <div class="card-title p-2" style="height:200px;
                    background:url('https://cdn.pixabay.com/photo/2017/05/11/11/15/workplace-2303851_1280.jpg');
                    background-size:cover;
                    background-position:center;
                    background-repeat:no-repeat;">

                    </div>
                    <div class="card-body">
                        <form action="{{route('user.register')}}" method='post'>
                            @csrf
                            <div class="form-group mb-2">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="name" class="form-control p-2">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control p-2">
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control p-2">
                            </div>
                            <div class="form-group mb-2">
                                <button class="btn btn-primary " type="submit">Submit</button>
                            </div>
                            <div class="my-2 text-center">
                                <p>already have an account <a href="{{route('login')}}">login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
