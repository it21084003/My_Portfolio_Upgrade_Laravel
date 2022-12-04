@extends('admin_panel.master')
@section('title','post')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit</div>
                </div>
                {{-- image pr te form so yin enctype="multipart/form-data" --}}
                <form action="{{url('admin/posts/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                <div class="card-body">
                    <div class="form-group pb-2">
                        <label for="" class="pb-1">Category</label>
                        <select id="" name="category_id" class="form-control  @error('category_id')
                            is-invalid
                        @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category )
                            <option value="{{$category->id}}"
                                {{$post->category_id == $category->id ? 'selected' : '' }}
                                >{{$category->name}}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group pb-2">
                        <label for="" class="pb-1" >Image</label>
                        <input type="file" name="image"  value="{{old('image')}}" class="form-control mb-2 @error('name')
                            is-invalid
                        @enderror">
                        <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" style="width: 100px; height:100px; border:1px solid black" >
                        @error('image')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group pb-2">
                        <label for="" class="pb-1" >Title</label>
                        <input type="text" name="title" placeholder="Post Title" value="{{old('title') ?? $post->title}}" class="form-control @error('title')
                            is-invalid
                        @enderror">
                        @error('title')
                            <span class="text-danger"><small>{{($message)}}</small></span>
                        @enderror
                    </div>
                    <div class="form-group pb-2">
                        <label for="" class="pb-1" >Content</label>
                        <textarea name="content" id="" cols="10" rows="5" class="form-control" @error('content')
                        is-invalid @enderror placeholder="Post Content">{{old('content') ?? $post->content}}
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
