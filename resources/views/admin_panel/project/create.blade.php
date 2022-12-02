@extends('admin_panel.master')
@section('title','skill index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create</div>
                </div>
                <form action="{{route('projects.store')}}" method="POST">
                    @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="" >Name</label>
                        <input type="text" name="name" placeholder="Project Name" value="{{old('name')}}" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" >URL</label>
                        <input type="text" name="url" placeholder="Project URL" value="{{old('url')}}" class="form-control @error('url')
                        is-invalid
                    @enderror">
                        @error('url')
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
