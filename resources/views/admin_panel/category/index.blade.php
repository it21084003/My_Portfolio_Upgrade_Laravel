@extends('admin_panel.master')
@section('title','Category')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Category</div>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-end mb-3">
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
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categories )
                            <tr>
                                <td>{{$categories->id}}</td>
                                <td>{{$categories->name}}</td>
                                <td>

                                    {{-- {{url('admin/project/'.$projects->id)}} --}}
                                    {{-- {{route('projects.edit',$project->id)}} --}}
                                    <form action="{{url('admin/category/'.$categories->id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="{{url('admin/category/'.$categories->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you wanted to delete?')"><i class="fa-solid fa-trash-can"></i>Delete</button>

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
