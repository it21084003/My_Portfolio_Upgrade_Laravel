@extends('admin_panel.master')
@section('title','Post_Comment')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Post Comments</div>
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

                        <tbody>
                            @if ($comments->count() < 1)
                                No Comment
                            @else
                            @foreach ($comments as $index => $comment )
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$comment->text}}</td>
                                <td>
                                    <form action="{{url('admin/comment/'.$comment->id.'/show_hide')}}" method="POST">
                                        @csrf
                                        @if ($comment->status == 'show' )
                                        <button type="submit" class="btn btn-danger btn-sm mt-2"><i class="fa-regular fa-pen-to-square"></i> Hide</button>
                                        @else
                                        <button type="submit" class="btn btn-info btn-sm mt-2"><i class="fa fa-comment"></i> Show
                                        </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
