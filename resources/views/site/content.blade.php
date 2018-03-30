@if(isset($sliders))
<section class="slider-pro slider" id="slider">
    <div class="sp-slides">
        @foreach($sliders as $slider)
        <div class="sp-slide main-slides">
            <div class="img-overlay"></div>
            <img class="sp-image" src="{{ asset('assets') }}/images/slider/{{ $slider['img'] }}" alt="Slider 1"/>
            <h1 class="sp-layer slider-text-big"
            data-position="center" data-show-transition="left" data-hide-transition="right" data-show-delay="1500" data-hide-delay="200">
            <span class="highlight-texts">{{ $slider['title'] }}</span>
        </h1>
        <p class="sp-layer"
        data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200" data-show-transition="left" data-hide-transition="right">
        {{ $slider['text'] }}
    </p>
</div>
@endforeach
</div>
</section>
@endif

@if(isset($pages))
@foreach($pages as $k=>$value)
<section id="{{ $value['alias'] }}" class="about-sec section-wrapper description txt-color {{ (($k%2 == 0) && (count($pages) > 1 )) ? 'odd' : '' }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                <h2><span class="highlight-text">{{ $value['title'] }}</span></h2>
                <span class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">{!! $value['text'] !!}</span>
            </div>
            @if($k%2 == 0)
            <div class="col-md-6 col-sm-6 col-xs-12 custom-sec-img wow fadeInDown">
                <img src="{{ asset('assets') }}/images/{{ $value['images'] }}" alt="Custom Image">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 customized-text wow fadeInDown black-ed">
                <p>{!! $value['text2'] !!}</p>
                @foreach($value->subpages as $subpage)
                <div class="row"> 
                    <div class="col-md-11">
                        <strong>{{ $subpage['title'] }}</strong>
                        {!! $subpage['text'] !!}
                    </div>
                </div>
                @endforeach             
            </div>
            @else
            <div class="col-md-6 col-sm-6 col-xs-12 customized-text wow fadeInDown black-ed">
                <p>{!! $value['text2'] !!}</p>
                @foreach($value->subpages as $subpage)
                <div class="row"> 
                    <div class="col-md-11">
                        <strong>{{ $subpage['title'] }}</strong>
                        {!! $subpage['text'] !!}
                    </div>
                </div>
                @endforeach             
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 custom-sec-img wow fadeInDown">
                <img src="{{ asset('assets') }}/images/{{ $value['images'] }}" alt="Custom Image">
            </div>
            @endif
        </div> 
    </div>
</section>
@endforeach
@endif

@if($services)
<section id="services" class="section-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                <h2><span class="highlight-text">Services</span></h2>
                <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nam corporis quas, saepe minima error aperiam dolorum aliquam, quis deserunt eos eius quisquam odio itaque.</p>
            </div>
            <div class="our-services">
                @foreach ($services->chunk(3) as $m=>$chunk)
                <div class="row">
                    @foreach ($chunk as $service)
                    <div class="col-md-4 col-sm-4 col-xs-12 text-xs-center wow fadeInDown" data-wow-delay=".1s">
                        <div class="service-box">
                            <div class="icon">
                                @if(($m%2 == 0))
                                <a href="{{ route('service',array('alias'=>$service->alias)) }}"><i class="fa {{ $service['icon'] }}"></i></a>
                                @endif
                                <a href="{{ route('service',array('alias'=>$service->alias)) }}"><h3>{{ $service['name'] }}</h3></a>
                            </div>
                            </a> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero praesentium quam nulla.</p>
                            @if(!($m%2 == 0))
                            <a href="{{ route('service',array('alias'=>$service->alias)) }}"><img src="{{ asset('assets') }}/images/{{ $service['images'] }}" alt="Custom Image"></a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </section> 
    @endif

    @if(isset($prices))
    <section class="menus style3 txt-color" id="menuCard">
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Menu Card</span></h2>
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nam corporis quas, saepe minima error aperiam dolorum aliquam, quis deserunt eos eius quisquam odio itaque.</p>
                </div>
                <div class="menus-container"> 
                    <div class="menu row">
                        @foreach ($prices->chunk(2) as $p=>$pchunk)
                        @foreach ($pchunk as $price)
                        <div class="col-md-6 wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
                            <div class="menu-column">
                                <div class="food">
                                    <div class="food-desc">
                                        <h6 class="food-name">{{ $price['name'] }}</h6>
                                        <div class="dots"></div>
                                        <div class="food-price">
                                            <span>{{ $price['price'] }}</span>
                                        </div>
                                    </div>
                                    <div class="food-details">
                                        <span>{{ $price['text'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div><!-- /row -->
                </div><!-- /menu-carousel -->
            </div><!-- /menus-container --> 
        </div><!-- /container -->
    </section>
    @endif

    @if(isset($portfolios) && is_object($portfolios))
    <section id="portfolio" class="bgSection portfolio-section txt-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text">Gallery</span></h2>
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nam corporis quas, saepe minima error aperiam dolorum aliquam, quis deserunt eos eius quisquam odio itaque.</p>
                </div>
            </div>
        </div>
        <div class="portfolio-works wow fadeIn" data-wow-duration="2s">
            <div id="portfolio-filter" class="portfolio-filter-btn-group">
                <ul>
                    <li>
                        <a href="#" class="selected" data-filter="*">ALL</a>
                        @if(isset($tags))
                            @foreach($tags as $tag)
                            <a href="#" data-filter=".{{$tag}}">{{ strtoupper($tag) }}</a>
                            @endforeach
                        @endif
                    </li>
                </ul>
            </div>
            <div class="portfolio-items">
                @foreach($portfolios as $portfolio)
                <div class="item portfolio-item {{ str_replace('|',' ',$portfolio['mfilter']) }}">
                    <img src="{{ asset('assets') }}/images/img-portfolio/{{ $portfolio['images'] }}" alt="">
                    <div class="portfolio-details-wrapper">
                        <div class="portfolio-details">
                            <div class="portfolio-meta-btn">
                                <ul class="work-meta">
                                    <li class="lighbox"><a href="{{ asset('assets') }}/images/img-portfolio/{{ $portfolio['images'] }}" class="featured-work-img"><i class="fa fa-search-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach                
        </div>
    </div>
</section>
@endif

@if(isset($stats))
<section id="info" class="info-section">
    <div class="container text-xs-center">
       <!-- Section Header -->
       <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
        <h2><span class="highlight-text">Stats</span></h2>

        <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nam corporis quas, saepe minima error aperiam dolorum aliquam, quis deserunt eos eius quisquam odio itaque.</p>
    </div>
    <!-- Section Header End -->
    <div id="counter" class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

        @foreach($stats as $stat)
        <div class="col-md-3 col-sm-6 col-xs-12 text-xs-center">

            <i class="fa {{ $stat['icon'] }} wow pulse" style="visibility: visible; animation-name: pulse;"></i>
            <h4 style="color: #000;">{{ $stat['name'] }}</h4>
            <h1 data-num="{{ $stat['meters'] }}" class="text-primary enumber">0</h1>
        </div>
        @endforeach

    </div> 
</div>
</section>
@endif

@if(isset($peoples))
<section id="team" class="bgSection teams-section"> 
    <div class="parallax-overlay"></div>
    <div class="teams-wrapper wow bounceIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                    <h2><span class="highlight-text-inverted">Chefs</span></h2>
                    <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nam corporis quas, saepe minima error aperiam dolorum aliquam, quis deserunt eos eius quisquam odio itaque.</p>
                </div>
                <div id="teams" class="owl-carousel teams">
                    @foreach($peoples as $people)
                    <div class="teams-slides col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">
                       <a href="{{ route('people',array('alias'=>$people->alias)) }}"><img src="{{ asset('assets') }}/images/img-teams/{{ $people['images'] }}" alt=""></a>
                        <a href="{{ route('people',array('alias'=>$people->alias)) }}"><p class="client-info" style="color: #fff;">{{ $people['name'] }}</p></a>
                        {!! str_limit($people['text'], 150) !!}
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</section> 
@endif

@if(isset($clients))
<!-- Clients Section -->
<section id="clients" class="clients-section">
  <!-- Container Ends -->
  <div class="container">
   <div class="row">
    <!-- Section Header -->
    <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
        <h2><span class="highlight-text">Customer Feedback</span></h2> 
    </div>
    <!-- Section Header End --> 
    @foreach($clients as $client)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="testimonials">
            	<div class="active item">
                    <blockquote>{!! $client['text'] !!}</blockquote>
                    <div class="carousel-info">
                        <img alt="" src="{{ asset('assets') }}/images/clients/{{ $client['images'] }}" class="pull-left">
                        <div class="pull-left">
                          <span class="testimonials-name">{{ $client['name'] }}</span>
                          <span class="testimonials-post">{{ $client['position'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br /><br />
    @endforeach

</div>
</div><!-- Container Ends -->
</section>
<!-- Client Section End -->  
@endif

<section id="contact" class="section-wrapper contact-section txt-color" data-stellar-background-ratio="0.5">
    <div class="parallax-overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                <h2><span class="highlight-text">Contact Us</span></h2>

                <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">We love feedback. Fill out the form below and we'll get back to you as soon as possible. in minus distinctio dolores ipsam.</p>
            </div> 
            <!-- Section Header End -->

            <div class="contact-details">


                <!-- Contact Form -->
                <div class="contact-form wow bounceInRight"> 

                    <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
                <form  action="{{ route('home') }}" name="sentMessage" id="contactForm"  method="post"> 
                     <!-- novalidate  -->
                     <div class="col-md-6 offset-md-6">
                    <input type="text" class="form-control" 
                    placeholder="Full Name" id="name" required name="name" 
                    data-validation-required-message="Please enter your name" />
                    <p class="help-block"></p>
                    </div>  
                     <div class="col-md-6">
                    <input type="email" class="form-control" placeholder="Email" 
                    id="email" required name="email" 
                    data-validation-required-message="Please enter your email" />
                    </div>  
             
                    <div class="col-md-12">
                    <textarea rows="10" cols="100" class="form-control" 
                    placeholder="Message" id="message" required name="text" 
                    data-validation-required-message="Please enter your message" minlength="5" 
                    data-validation-minlength-message="Min 5 characters" 
                    maxlength="999" style="resize:none"></textarea>
                    </div>  
                     
                    <div class="col-md-8 col-md-offset-2"><br><div id="success"> </div><button type="submit" class="btn btn-primary">Submit Message</button></div> 
                        {{ csrf_field() }}

        </form>
          </div>

      </div>
  </div>
</section>




<!-- Contact Section End -->
<section class="footer-container">
    <div class="container">
        <div class="row footer-containertent">
            <div class="col-md-4">
                <img src="{{ asset('assets') }}/images/logo.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et porro quos iste ratione doloribus asperiores, error omnis delectus rerum sapiente. Et, aliquam modi beatae quae in perferendis ab est fugiat!</p>
            </div>
            <div class="col-md-4">
                <h4>News & Updates</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nam corporis quas, saepe minima error aperiam dolorum aliquam, quis deserunt eos eius quisquam odio itaque.</p>
            </div>
            <div class="col-md-4 contac-us">
                <h4>Contact Us</h4>
                <p>Lorem ipsum dolor sit amet adipisicing elit.</p>
                <ul>
                    <li><i class="fa fa-home"></i>123 New Venu Street</li>
                    <li><i class="fa fa-phone"></i>001 123 12345 99</li>
                    <li><i class="fa fa-envelope-o"></i>support@website.com</li>
                </ul> 
            </div>
        </div>
    </div>
</section>


<footer>

    <div class="container">
        <div class="row">
            <div class="footer-containertent">

                <ul class="footer-social-info">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                <br/><br/>
                <p>Copyright © 2018. Template by: <a href="http://webthemez.com/free-bootstrap-templates/">WebThemez</a>, All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
    <!-- Footer End -->