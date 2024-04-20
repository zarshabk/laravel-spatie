@extends('layout.app')

@section('title','create Role')



@section('content')

<div class="row my-5">
    <div class="col-8 m-auto">
        <div class="card">
            <div class="card-title bg-light border-b-1 d-flex justify-content-between p-2 align-items-center">
                <h4>Add Permission to ({{$role->name}})</h4>
                <a class="btn btn-outline-dark" href="">Go Back</a>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('role.update-permission',$role->id)}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="d-flex gap-5 flex-wrap">
                            @foreach ($permission as $item)
                            <div class="d-flex gap-1">
                                <input type="checkbox" value="{{$item->name}}" name="permission[]" class="form-checkbox"
                                    {{in_array($item->id,$rolePermissions) ? 'checked':''}}
                                >
                                <label for="">{{$item->name}}</label>
                            </div>
                            @endforeach
                        </div>
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