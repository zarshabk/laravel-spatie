@extends('layout.app')

@section('title','create Role')



@section('content')
<div class="row my-5">
    <div class="col-12">
        <div class="card">
            <div class="card-title bg-light border-b-1 d-flex justify-content-between p-2 align-items-center">
                <h4>Create Role</h4>
                <a class="btn btn-outline-dark" href="">Go Back</a>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('role.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Role Type</label>
                        <input type="text" name="name" class="form-control p-2">
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
