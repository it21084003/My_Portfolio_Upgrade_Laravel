@extends('admin_panel.master')
@section('title','skill index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> Category Edit</div>
                </div>
                <form action="{{ route('category.update',$categories->id)}}" method="POST">
                    @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="" >Name</label>
                        <input type="text" name="name" placeholder="Category Name" value="{{$categories->name}}" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mt-3" >Submit</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>

@endsection
