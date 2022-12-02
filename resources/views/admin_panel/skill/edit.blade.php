@extends('admin_panel.master')
@section('title','skill index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> Skill Edit</div>
                </div>
                <form action="{{url('admin/skills/'.$skill->id)}}" method="POST">
                    @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="" >Name</label>
                        <input type="text" name="name" placeholder="Skill Name" value="{{$skill-> name ?? old('name')}}" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('name')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" >Percent</label>
                        <input type="text" name="percent" placeholder="Skill Percent" value="{{$skill-> percent ?? old('percent')}}" class="form-control @error('percent')
                        is-invalid
                    @enderror">
                        @error('percent')
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
