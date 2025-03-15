@extends('site.layouts.layout')
@section('mainslide')
    <!-- ======= Hero Section ======= -->
    @if ($homearr['main_banner']['mediastore']->where('type','video')->first())
    <div class="banner" >
        <video autoplay muted loop controlsList="nodownload" oncontextmenu="return false" class="banner-vid">
            <source src="{{$homearr['main_banner']['mediastore']->where('type','video')->first()['image_path'] }}" type="video/mp4">
            Your browser does not support HTML5 video.
          </video>
         
    </div>

        @elseif($homearr['main_banner']['mediastore']->where('type','image')->first())
         <!-- ======= Hero Section ======= -->
    <section id="hero" style=" background: url({{$homearr['main_banner']['mediastore']->where('type','image')->first()['image_path'] }}) top left;" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            {{ Str::of($homearr['main_banner']['tr_content'])->toHtmlString()}}
            
             
        </div>
    </section>
	<!-- End Hero -->
    @else
     <!-- ======= Hero Section ======= -->
     <section id="hero"  class="d-flex align-items-center hero-o">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">            
        </div>
    </section>
	<!-- End Hero -->
    @endif
 
         

        {{-- <div class="container" data-aos="zoom-out" data-aos-delay="100">
            {{ Str::of($homearr['main_banner']['tr_content'])->toHtmlString()}}
            
            <div class="d-flex">

                <a href="#about" class="btn-get-started scrollto">Get Started1</a>
            </div>
        </div> --}}
 
    
    <!-- End Hero -->
@endsection

@section('content')

    <main id="main">
       <!-- ======= project banner Section ======= -->
       @if($homearr['project_banner'])
@if($homearr['project_banner']['mediastore']->where('type','image')->first())

       <section   class="pro-banner" style=" background: url({{$homearr['project_banner']['mediastore']->where('type','image')->first()['image_path'] }}); background-size: 100% 100%;"> 
        <div class="container"> 
          
        </div>
      </section>
      @endif
      @endif
        <!-- ======= End project banner Section ======= -->

        <!-- ======= Testimonials Section ======= -->
        @if ($homearr['references'])
            @if (count($homearr['references']['posts']) > 0)
                <section id="testimonials" class="testimonials">
                    <div class="container" data-aos="zoom-in">
                        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                          <header class="section-header">                            
                            {{ Str::of($homearr['references']['tr_content'])->toHtmlString() }} 
                          </header>
                            <div class="swiper-wrapper">
                                @if ($homearr['references'])
                                    @foreach ($homearr['references']['posts'] as $post)
                                        <!--start swiper item -->
                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <div class="member-img testimonial-member-img">
                                                    <img src="@if ($post['mediastore']->first()) {{ $post['mediastore']->first()['image_path'] }}@else assets/img/team/team-2.jpg @endif"
                                                        class="img-fluid" alt="{{$post['tr_title']}}">
                                                </div>
                                                <div class="member-info testimonial-info">
                                                    <h4>{{ Str::of($post['tr_title'])->toHtmlString() }}</h4>
                                                    @if ($post['tr_content'] == '')
                                                        <span></span>
                                                        <p></p>
                                                    @else
                                                        {{ Str::of($post['tr_content'])->toHtmlString() }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End swiper item -->
                                    @endforeach
                                @endif

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                </section><!-- End Testimonials Section -->

                <!-- ======= Team Section ======= -->
            @endif
        @endif




        <!-- ======= Featured Services Section ======= -->
        {{-- <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum {{ $defultlang->name }}</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                dolore</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Nemo Enim</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section> --}}
        <!-- End Featured Services Section -->
    </main><!-- End #main -->
@endsection
