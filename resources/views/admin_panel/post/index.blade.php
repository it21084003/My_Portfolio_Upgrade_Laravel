@extends('admin_panel.master')
@section('title','Post')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Post</div>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm float-end mb-3">
                                <i class="fa-solid fa-plus-circle"></i>
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session('successMsg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey! </strong> {{Session('successMsg')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                            <tr>
                                <td>{{$post->id}}</td>
                                {{-- notice category --}}
                                <td>{{$post->category->name}}</td>
                                <td>
                                    {{-- link connect storage ko public to --}}
                                    {{-- php artisan storage:link --}}

                                    <div class="box">
                                        <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" width="100px" height="100px" >
                                    </div>

                                </td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <p>{{Str::limit($post->content,700, '...')}}</p>
                                </td>
                                {{-- <td>{{$post->content}}</td> --}}
                                <td>

                                    {{-- {{url('admin/project/'.$projects->id)}} --}}
                                    {{-- {{route('projects.edit',$project->id)}} --}}
                                    <form action="{{url('admin/posts/'.$post->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-info btn-sm mt-2"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                        <button class="btn btn-danger btn-sm mt-2" type="submit" onclick="return confirm('Are you sure you wanted to delete?')"><i class="fa-solid fa-trash-can"></i>Delete</button>
                                        <a href="{{url('admin/posts/'.$post->id)}}" class="btn btn-info btn-sm mt-2">
                                            <i class="fa fa-comment"></i>Comments
                                        </a>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-fotter">
                    {{-- {{$categories->links()}} --}}
                </div>
            </div>






            {{-- {{$skills->links()}} --}}
        </div>
    </div>
</div>

@endsection
