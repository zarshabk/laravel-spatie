@extends('layout.app')

@section('title','edit user')



@section('content')

<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-title p-2 bg-light">
                <h4>Update User</h4>
            </div>
            <div class="card-body">
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control p-2" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control p-2" name="email" value="{{$user->email}}">
                    </div>
                    <div class=" form-group mb-2">
                        <label for="" class="form-label">Roles</label>
                        <select name="roles[]" class="form-control p-2" id="" multiple>
                            <option value="" @disabled(true) selected>--select role</option>
                            @foreach ($roles as $item)
                            <option value="{{$item}}" {{in_array($item,$userRoles) ? "selected" :""}}>
                                {{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control p-2" name="password">
                    </div>
                    <div class=" mb-2">
                        <button class="btn btn-primary" type="submit">Update and save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
