@extends('user_panel.master')
@section('title','My Portfolio')
@section('content')

    <!--Home Section-->
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

    <!--Skills Section-->
    <section id="skill-sec">
        <h2>My Skills</h2>
        <div class="skill">
        @foreach ($skills as $skill )
            <div>
                <div class="skill_con">
                    <span class="skill_name">{{$skill->name}}</span>
                    <!-- <span>90%</span> -->
                </div>
                <div class="bar" style="width : {{$skill->percent}}%;"></div>
                {{-- <div class="html_bar bar" ></div> --}}
            </div>
        @endforeach
        {{-- {{$skills->links('pagination::bootstrap-4')}} --}}
        </div>
    </section>

    <!--Services Section-->
    <section id="service-sec">
        <h2>My Services</h2>
        <hr>
        <div class="service">
            <div class="service-box">
                <i class="fas fa-home"></i>
                <span>Frontend Development</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam autem neque molestiae illo
                    inventore aut accusantium, maxime recusandae earum?</p>
            </div>
            <div class="service-box">
                <i class="fas fa-home"></i>
                <span>Backend Development</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam autem neque molestiae illo
                    inventore aut accusantium, maxime recusandae earum?</p>
            </div>
            <div class="service-box service-box3">
                <i class="fas fa-home"></i>
                <span>Responsive Wen Design</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam autem neque molestiae illo
                    inventore aut accusantium, maxime recusandae earum?</p>
            </div>
        </div>
        <div class="service">
            <div class="service-box">
                <i class="fas fa-home"></i>
                <span>App Development</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam autem neque molestiae illo
                    inventore aut accusantium, maxime recusandae earum?</p>
            </div>
            <div class="service-box">
                <i class="fas fa-home"></i>
                <span>Web Application</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam autem neque molestiae illo
                    inventore aut accusantium, maxime recusandae earum?</p>
            </div>
            <div class="service-box service-box3 last-box">
                <i class="fas fa-home"></i>
                <span>Web Design</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In magnam autem neque molestiae illo
                    inventore aut accusantium, maxime recusandae earum?</p>
            </div>
        </div>
    </section>

    {{-- latest Post Section --}}
    <div class="latest-post ">
        <h2 class="text-center pt-2">Latest Post</h2>
        <hr>
            <div class="row card-container">
                @foreach ($post as $post )

                <div class="col-md-4">
                    <a href="">
                        <div class="container mt-3" >
                            <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" class="img-fluid pb-3" alt="" style=" width:100%; height:300px;
                        }">
                        </div>
                        <small >{{ date('d-M-Y',strtotime($post->created_at))}}</small><br>
                        <h4>{{$post->title}}</h4>
                        <p>{{Str::limit($post->content,400, '...')}}</p>
                    </a>
                </div>
                @endforeach
            </div>
    </div>



    <!--About Section-->
    <section id="aboutme-sec">
        <h2>About Me</h2>
        <hr>
        <div class="p-wrapper">
            <p>We are a building company based in the beautiful Holme Valley near Holmfirth in Huddersfield, Yorkshire.
            </p>
            <p>Proud of our roots, we try to be very Yorkshire like in the way we go about our business. Friendly,
                honest, sticklers for good value and with an appreciation for how stunning the Huddersfield countryside
                is. As a business, we would like to
                contribute to that beauty by creating amazing buildings constructed with great craftsmanship.</p>
            <p>Having a wealth of experience in building and construction management, we can tackle small extensions to
                large new build projects. We are happy working with both traditional building materials and new
                construction methods. The quality of our
                workmanship and customer service is without compromise. In addition to our in-house skills, we have a
                network of first-rate contractors and professionals. If required, we can provide you with assistance
                with architects, planning, structural
                engineers, costings and project management.</p>
            <p>You’ll find us easy to work with, honest, proactive in our approach and forthcoming with information.
                Together we’ll create a finished building to be proud of.</p>
        </div>
    </section>

    <!--Projects Section-->

            <section id="project-sec" >
                <h2>My Recent Projects</h2>
                <div class="brand">
                    <div class="ALl active">All({{$projects->count()}})<span>/</span></div>
                    <div class="Real-World">Real-World<span>/</span></div>
                    <div class="Static">Static<span>/</span></div>
                    <div class="Mini-Project">Mini-Project</div>
                </div>

                {{-- <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4"> --}}
                    <div class="row card-post g-2">
                    @foreach ($projects as $projects )
                        <div class="col-md-4 ">
                            <div class="card">
                                <img src="img/myimg.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$projects->name}}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                            card's content.</p>
                                        <a href="{{$projects->url}}" class="btn btn-primary">View more</a>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>



    <!--Contact Section-->
    <section id="contact-sec">
        <h2>Contact Me</h2>
        <div class="contact_con">
            <div class="contact1">
                <h3 style="margin-bottom: 0;">What’s your story?</h3>
                <h3 style="margin-top: 0;">Get in touch</h3>
                <p>Always available for freelancing if the right project comes along, Feel free to contact me.</p>
                <div>
                    <i class="fas fa-map-marked-alt"></i>
                    <span>〒272-0826</span><br>
                    <p class="add">千葉県市川市真間一丁目1番１８号アフェールJ真間２０５号室</p>
                </div>
                <div>
                    <i class="fas fa-envelope"></i>
                    <span>it21084003@tsb-yyg.ac.jp</span>
                </div>
                <div>
                    <i class="fas fa-phone"></i>
                    <span>08096452889</span>
                </div>
            </div>
            <div class="contact2">
                <input type="text" placeholder="Name">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Subject">
                <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
                <button type="button" class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </section>
    {{-- this is StudentCount --}}
    {{-- <strong>{{$studentCount->count}}</strong> --}}

@endsection
