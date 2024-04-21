@extends('layout.app')

@section('title','users')



@section('content')

<div class="row my-5">

    <div class="col-12">

        <div class="card">
            <div class="card-title bg-light border-b-1 d-flex justify-content-between p-2 align-items-center">
                <h4>Users</h4>
                <a class="btn btn-primary" href="{{route('user.add')}}">add user</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    @if (count($users)<1) <tr>
                        <td class="text-center" colSpan="5">No User Found</td>
                        </tr> @else @foreach ($users as $d) <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->email}}</td>
                            <td>
                                @if (!empty($d->getRoleNames()))
                                @foreach ($d->getRoleNames() as $r)

                                <span class="badge bg-dark">{{$r}}</span>

                                @endforeach
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{route('user.edit',$d->id)}}" class="btn btn-success">Edit</a>
                                <form action="{{route('user.destroy',$d->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif






                </table>
            </div>
        </div>
    </div>
</div>

@endsection
