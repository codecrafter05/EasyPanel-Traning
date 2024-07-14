<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>Meyawo Landing page | Free Bootstrap 4.3.x landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Meyawo main styles -->
	<link rel="stylesheet" href="css/meyawo.css">
    <!-- Livewire Styles -->
    <link rel="stylesheet" href="path/to/aos.css">
    <script src="path/to/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
    @livewireStyles
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
                @if($logoUrl)
                <a class="logo" href="#"><img src="{{ $logoUrl }}" alt="alternative"></a>         
                @endif              
            <ul class="nav">
                <li class="item">
                    <a class="link" href="#home">Home</a>
                </li>
                <li class="item">
                    <a class="link" href="#about">About</a>
                </li>
                <li class="item">
                    <a class="link" href="#portfolio">Portfolio</a>
                </li>
                <li class="item">
                    <a class="link" href="#testmonial">Testmonial</a>
                </li>
                <li class="item">
                    <a class="link" href="#blog">Blog</a>
                </li>
                <li class="item">
                    <a class="link" href="#contact">Contact</a>
                </li>
                <li class="item ml-md-3">
                    <a href="components.html" class="btn btn-primary">Components</a>
                </li>
            </ul>
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>          
    </nav><!-- End of Page Navbar -->

    <!-- page header -->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up">HI!</span>
                <span class="down">{{ $home->title }}</span>
            </h1>
            <p class="header-subtitle">{{ $home->subtitle }}</p>            

            <button class="btn btn-primary">Visit My Works</button>
        </div>              
    </header><!-- end of page header -->

    <!-- about section -->
    <section class="section pt-0" id="about" data-aos="flip-up" data-aos-duration="1000">
    <!-- container -->
    <div class="container text-center" >
        <!-- about wrapper -->
        <div class="about">
            <div class="about-img-holder">
                @if($aboutUrl)
                    <img src="{{ $aboutUrl }}" alt="alternative">
                @endif
            </div>
            <div class="about-caption">
                <p class="section-subtitle">{{ $about->text1 }}</p>
                <h2 class="section-title mb-3">{{ $about->title }}</h2>
                <p>{{ $about->subtitle }}</p>
                <button class="btn-rounded btn btn-outline-primary mt-4">Download CV</button>
            </div>
        </div><!-- end of about wrapper -->
    </div><!-- end of container -->
</section><!-- end of about section -->


    <!-- service section -->
    <section class="section" id="service" data-aos="fade-up" data-aos-duration="1000">
    <div class="container text-center">
    <p class="section-subtitle">What I Do ?</p>
            <h6 class="section-title mb-6">Service</h6>
        <div class="row">
            @foreach($service as $s)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="service-card">
                        <div class="service-card-inner">
                            <div class="service-icon">
                                @if($s->service_url)
                                    <img class="icon" src="{{ $s->service_url }}" alt="alternative">
                                @endif  
                            </div>
                            <div class="service-content">
                                <h6 class="title">{{ $s->title }}</h6>
                                <p class="subtitle">{{ $s->subtitle }}</p>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- end of row -->
    </div>
    </section><!-- end of service section -->



    <!-- portfolio section -->
    <section class="section" id="portfolio" data-aos="fade-up" data-aos-duration="1000">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Portfolio</h6>
            <div class="row justify-content-center">
                @foreach($portfolio as $p)
                    <div class="col-md-4 mb-4">
                        
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    @if($p->portfolio_url)
                                        <img class="portfolio-card-img" src="{{ $p->portfolio_url }}" alt="alternative">
                                    @endif
                                    <div class="portfolio-title">
                                        <h6 class="title">{{ $p->title }}</h6>
                                    </div>
                                </div>
                                <div class="flip-card-back">
                                    <div class="portfolio-subtitle">
                                    <p class="subtitle">{{ $p->subtitle }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end of row -->
        </div><!-- end of container -->
    </section><!-- end of portfolio section -->


    <!-- pricing section -->
    <section class="section" id="pricing" data-aos="fade-up" data-aos-duration="1000">
        <div class="container text-center">
            <p class="section-subtitle">How Much I Charge ?</p>
            <h6 class="section-title mb-6">My Pricing</h6>
            <!-- row -->
            <div class="pricing-wrapper">
                <div class="pricing-card">
                    <div class="pricing-card-header">
                        <img class="pricing-card-icon" src="imgs/scooter.svg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="pricing-card-body">
                        <h6 class="pricing-card-title">Free</h6>
                        <div class="pricing-card-list">
                            <p>accusamus reprehenderit</p>
                            <p>provident dolorem </p>
                            <p>quos neque</p>
                            <p>fugiat quibusdam</p>
                            <p><i class="ti-close"></i></p>
                            <p><i class="ti-close"></i></p>
                        </div>
                    </div>
                    <div class="pricing-card-footer">
                        <span>$</span>
                        <span>0.00/Month</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 pricing-card-btn">Subscribe</a>
                </div>
                <div class="pricing-card">
                    <div class="pricing-card-header">
                        <img class="pricing-card-icon" src="imgs/shipped.svg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="pricing-card-body">
                        <h6 class="pricing-card-title">Basic</h6>
                        <div class="pricing-card-list">
                            <p>accusamus reprehenderit</p>
                            <p>provident dolorem </p>
                            <p>quos neque</p>
                            <p>fugiat quibusdam</p>
                            <p>accusamus laboriosam</p>
                            <p><i class="ti-close"></i></p>
                        </div>
                    </div>
                    <div class="pricing-card-footer">
                        <span>$</span>
                        <span>9.99/Month</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 pricing-card-btn">Subscribe</a>
                </div>
                <div class="pricing-card">
                    <div class="pricing-card-header">
                        <img class="pricing-card-icon" src="imgs/startup.svg" alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                    </div>
                    <div class="pricing-card-body">
                        <h6 class="pricing-card-title">Premium</h6>
                        <div class="pricing-card-list">
                            <p>accusamus reprehenderit</p>
                            <p>provident dolorem </p>
                            <p>quos neque</p>
                            <p>fugiat quibusdam</p>
                            <p>accusamus laboriosam</p>
                            <p>inventore omnis</p>
                        </div>
                    </div>
                    <div class="pricing-card-footer">
                        <span>$</span>
                        <span>99.9/Month</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-3 pricing-card-btn">Subscribe</a>
                </div>

            </div><!-- end of pricing wrapper -->
        </div> <!-- end of container -->
    </section><!-- end of pricing section -->

    <!-- section -->
    <section class="section-sm bg-primary" >
        <!-- container -->
        <div class="container text-center text-sm-left">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-sm offset-md-1 mb-4 mb-md-0">
                    <h6 class="title text-light">Want to work with me?</h6>
                    <p class="m-0 text-light">Always feel Free to Contact & Hire me</p>
                </div>
                <div class="col-sm offset-sm-2 offset-md-3">
                    <button class="btn btn-lg my-font btn-light rounded">Hire Me</button>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of section -->

   
   <!-- testimonial section -->
    <section class="section" id="testmonial" data-aos="fade-up" data-aos-duration="1000">
        <div class="container text-center">
            <p class="section-subtitle">What Think Client About Me?</p>
            <h6 class="section-title mb-6">Testimonial</h6>
            <!-- testimonial carousel -->
            <div class="testimonial-carousel">
                @foreach($testmonial as $t)
                    <div>
                        <div class="testimonial-card">
                            <div class="testimonial-card-img-holder">
                            @if($t->testmonial_url)
                                <img class="testimonial-card-img" src="{{ $t->testmonial_url }}" alt="alternative">
                            @endif
                            </div>
                            <div class="testimonial-card-body">
                                <p class="testimonial-card-subtitle">{{ $t->comment }}</p>
                                <h6 class="testimonial-card-title">{{ $t->name }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end of testimonial carousel -->
        </div><!-- end of container -->
    </section><!-- end of testimonial section -->

    
    <!-- blog section -->
    <section class="section" id="blog" data-aos="fade-up" data-aos-duration="1000">
    <div class="container" >
        <p class="section-subtitle text-center">Recent Posts</p>
        <h6 class="section-title text-center mb-6">Blog</h6>
        <div class="row justify-content-center" id="blog-container">
            @foreach($blog as $b)
            <div class="col-lg-4 col-md-6 mb-4" >
                <div class="blog-card">
                    <div class="blog-card-header">
                        @if($b->blog_url)
                            <img class="blog-card-img" src="{{ $b->blog_url }}" alt="Blog Image">
                        @endif
                    </div>
                    <div class="blog-card-body">
                        <h5 class="blog-card-title">{{ $b->title }}</h5>
                        <p class="blog-card-caption">
                            <span>By: {{ $b->creator }}</span>
                            <span><i class="ti-heart text-danger"></i> {{ $b->like }}</span>
                            <span><i class="ti-comment"></i> {{ $b->comment }}</span>
                        </p>
                        <p class="blog-card-text">{{ $b->subtitle }}</p>
                        <a href="#" class="btn btn-primary btn-sm blog-card-link">Read more <i class="ti-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of blog section -->



    <!-- contact section -->
    <section class="section" id="contact" >
    <div class="container text-center">
        <p class="section-subtitle">How can you communicate?</p>
        <h6 class="section-title mb-5">Contact Me</h6>
        <!-- contact form -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('form.submit') }}" method="POST" class="contact-form col-md-10 col-lg-8 m-auto">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>                 
                </div>
                <div class="form-group col-sm-6">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>                 
                </div>
                <div class="form-group col-sm-12">
                    <textarea name="comment" id="comment" rows="6" class="form-control" placeholder="Write Something"></textarea>
                </div>
                <div class="form-group col-sm-12 mt-3">
                    <input type="submit" value="Send Message" class="btn btn-outline-primary rounded">                  
                </div>
            </div>  
        </form><!-- end of contact form -->
    </div><!-- end of container -->
</section><!-- end of contact section -->


    <!-- footer -->
    <div class="container">
        <footer class="footer">       
            <p class="mb-0">Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="http://www.devcrud.com">DevCRUD</a></p>
            <div class="social-links text-right m-auto ml-sm-auto">
                <a href="javascript:void(0)" class="link"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-twitter-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-google"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-rss"></i></a>
            </div>
        </footer>
    </div> <!-- end of page footer -->
	
	<!-- core  -->
    <script src="vendors/jquery/jquery-3.4.1.js"></script>
    <script src="vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Meyawo js -->
    <script src="js/meyawo.js"></script>
   
    <!-- Slick Carousel JavaScript -->
    <script src="{{ asset('slick/slick.min.js') }}"></script>
    <!-- Meyawo JavaScript -->
    <script src="{{ asset('js/meyawo.js') }}"></script>

    <script>
    AOS.init();
    </script>


    <!-- Initialize Slick Carousel -->
    <script>
        $(document).ready(function(){
            $('.testimonial-carousel').slick({
                dots: true,
                infinite: true,
                speed: 1000,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 6000,
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
    $(window).scroll(function() {
        var windowHeight = $(window).height();
        var scrollPos = $(window).scrollTop();

        $('.about').each(function() {
            var offset = $(this).offset().top;

            // Check if the element is in the viewport
            if (scrollPos > offset - windowHeight + 200) { // Adjust 200 based on when you want the animation to trigger
                $(this).addClass('fadeInAnimation');
            } else {
                $(this).removeClass('fadeInAnimation'); // Remove class if not in viewport
            }
        });
    });

    // Trigger scroll event on page load to check initial state
    $(window).scroll();
});

    </script>

</body>
</html>
