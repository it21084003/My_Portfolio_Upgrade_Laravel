@extends('admin_panel.master')
@section('title','post')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create</div>
                </div>
                <form action="{{url('admin/posts')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group pb-2">
                        <label for="" class="pb-1">Category</label>
                        <select id="" name="category_id"  value="{{old('category_id')}}" class="form-control  @error('category_id')
                            is-invalid
                        @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{($category->id)}}">{{($category->name)}}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group pb-2">
                        <label for="" class="pb-1" >Image</label>
                        <input type="file" name="image"  value="{{old('image')}}" class="form-control @error('name')
                            is-invalid
                        @enderror">
                        @error('image')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group pb-2">
                        <label for="" class="pb-1" >Title</label>
                        <input type="text" name="title" placeholder="Post Title" value="{{old('title')}}" class="form-control @error('title')
                            is-invalid
                        @enderror">
                        @error('title')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group pb-2">
                        <label for="" class="pb-1" >Content</label>
                        <textarea name="content" id="" rows="5" class="form-control @error('content')
                            is-invalid
                        @enderror" placeholder="Post Content">{{old('content')}}
                        </textarea>
                        @error('content')
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
