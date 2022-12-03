@extends('user_panel.master')
@section('title','My Portfolio')
@section('content')



<div class="container pt-5">
<!-- Page Header-->
{{-- {{asset('storage/post-images/'.$post->image)}} --}}
<header class="masthead" >
    <div class="container position-relative px-4 px-lg-5 pt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{$post->title}}</h1>

                    <span class="meta">
                        Posted by
                        <a href="#!">Antt Min</a>
                        {{ date('d-M-Y',strtotime($post->created_at))}}
                    </span><br>
                    <span>
                        Category:
                        <a href="">{{$post->category->name}}</a>

                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="container mt-3" style="width:400px; height:300px;" >
                    <img src="{{asset('storage/post-images/'.$post->image)}}" class="img-fluid pb-3" alt="" style="width:100%; height:100%;}">
                </div>
                {{$post->content}}
                <hr>
                <form action="" method="POST">
                    @csrf
                    <div  class="py-2">
                        <span class="pe-3">
                            <i class="far fa-thumbs-up"></i> {{$likes->count()}}
                        </span>
                        <span class="pe-3">
                            <i class="far fa-thumbs-down"></i> {{$dislikes->count()}}
                        </span>
                        <span class="pe-3 ">
                            <i class="far fa-comment"></i>comments</span>
                    </div>
                    <button type="submit" formaction="{{url('/post/like/'.$post->id)}}" class="btn btn-sm btn-success"
                        @if($likeStatus)
                            @if($likeStatus->type == 'like')
                            disabled
                            @endif
                        @endif
                         >
                        <i class="far fa-thumbs-up"></i>
                        like
                    </button>
                    <button type="submit" formaction="{{url('/post/dislike/'.$post->id)}}" class="btn btn-sm btn-danger"
                        @if($likeStatus)
                            @if($likeStatus->type == 'dislike')
                            disabled
                            @endif
                        @endif
                        >
                        <i class="far fa-thumbs-down"></i>
                        dislike
                    </button>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="">
                        <i class="far fa-comment"></i>
                        comment
                    </button>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="">
                        <i class="far fa-comment"></i>
                        comment
                    </button>
                </form>
            </div>

        </div>
    </div>
</article>
</div>
@endsection
