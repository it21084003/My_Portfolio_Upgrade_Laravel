@extends('user_panel.master')
@section('title','My Portfolio')
@section('content')


<section id="home-sec">
    <div class="img">
        <img src="img/myimg.jpg" alt="" width="180" height="180">
    </div>
    <h1>Antt Min Paing</h1>
    <h2>Web Developer</h2>
    <div class="social">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-github"></i>
    </div>
    <!-- <button type="button" class="btn btn-primary">Download CV</button> -->
</section>
    <div class="container">
    <div class="row" >

        {{-- side bar --}}

        <div class="col-md-3 p-3" style="background-color: #e8e9ea;">
            <div class="side-bar">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn btn-success"><i class="fa-solid fa-magnifying-glass-plus"></i> Search</button>
                    </div>
                </form>
                <hr>
                <h5>Categories</h5>
                <ul>
                    @foreach ($categories as $categories)
                    <li class="pb-2">
                        <a href="">{{$categories->name}}</a>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
        {{-- <div class="col-md-8">
            <h6 class="pb-3">blog</h6>
            <img src="img/ountain.jpg" class="img-fluid" alt="">

        </div> --}}
        <div class="col-md-9   pt-3" style=" background-color: #F8F9FA;">
        @foreach ($posts as $post )
            <div class="col">
            <img src="{{asset('storage/post-images/'.$post->image)}}" class="img-fluid pb-3" alt="" style=" width:50%; height:300px;
            }">
            <h3>{{$post->title}}</h3>
            <p>{{Str::limit($post->content,400, '...')}}</p>

            <a href="{{url('/post/'.$post->id.'/details')}}">
                <button class="btn btn-info btn-sm mb-3">Read More <i class="fa-solid fa-angles-right"></i></button>
            </a>
            </div>

        @endforeach
        </div>

    </div>
</div>
@endsection
