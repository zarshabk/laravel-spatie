@extends('layout.app')

@section('title','permissions')



@section('content')
<div class="row my-5">

    <div class="col-12">
        @if (Session::has('success'))
        <p class="alert alert-success p-2">{{Session::get('success')}}</p>
        @endif
        <div class="card">
            <div class="card-title bg-light border-b-1 d-flex justify-content-between p-2 align-items-center">
                <h4>Permissions</h4>
                <a class="btn btn-primary" href="{{route('permission.create')}}">Create Permission</a>
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
                            <a href="{{route('permission.edit',$d->id)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('permission.delete',$d->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>
@endsection