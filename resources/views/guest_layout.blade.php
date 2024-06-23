<html lang="de">
<header>
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/templatemo-digimedia-v2.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animated.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.css') }}" rel="stylesheet">
</header>
<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('index') }}" class="logo">
                        <img src="{{ asset('/images/logo-v2.png') }}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ route('index')}}">Home</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact</a></li>
                            <li class="scroll-to-section">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- ***** Header Area End ***** -->
@yield('content')
@yield('search')
@yield('searchevents')
@yield('categories')
<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                    <h6>Contact Us</h6>
                    <h4>Get In Touch With Us <em>Now</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-dec">
                                <img src="/images/contact-dec-v2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div id="map">
                                <iframe
                                    src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    width="100%" height="636px" frameborder="0" style="border:0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="fill-form">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="info-post">
                                            <div class="icon">
                                                <img src="/images/phone-icon.png" alt="">
                                                <a href="#">010-020-0340</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="info-post">
                                            <div class="icon">
                                                <img src="/images/email-icon.png" alt="">
                                                <a href="#">our@email.com</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="info-post">
                                            <div class="icon">
                                                <img src="/images/location-icon.png" alt="">
                                                <a href="#">123 Rio de Janeiro</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="name" name="name" id="name" placeholder="Name"
                                                   autocomplete="on" required>
                                        </fieldset>
                                        <fieldset>
                                            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                   placeholder="Your Email" required="">
                                        </fieldset>
                                        <fieldset>
                                            <input type="subject" name="subject" id="subject"
                                                   placeholder="Subject"
                                                   autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message"
                                                          placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button ">Send
                                                Message
                                                Now
                                            </button>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2024 J&J Event Manager All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/owl-carousel.js') }}"></script>
<script src="{{ asset('/js/animation.js') }}"></script>
<script src="{{ asset('/js/imagesloaded.js') }}"></script>
<script src="{{ asset('/js/custom.js') }}"></script>
</body>

</html>
