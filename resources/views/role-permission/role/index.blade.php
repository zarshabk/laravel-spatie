@extends('layout.app')

@section('title','roles')



@section('content')
<div class="row my-5">
    <div class="col-12">

        <div class="card">
            <div class="card-title bg-light border-b-1 d-flex justify-content-between p-2 align-items-center">
                <h4>Roles</h4>
                <a class="btn btn-primary" href="{{route('role.create')}}">Create Role</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td class="d-flex gap-2">
                            <a href="{{route('role.edit',$d->id)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('role.delete',$d->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{route('role.give-permission',$d->id)}}" class="btn btn-warning">Edit
                                Permission</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
@endsection