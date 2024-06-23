@extends('layout')
@section('search')
    <div id="free-quote" class="free-quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4>Search an Event</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                    <form id="search" action="{{ route('searchEventWithKeyword')}}" method="GET">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8">
                                <fieldset>
                                    <input type="web" name="keyword" class="website" placeholder="Keyword"
                                           autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <fieldset>
                                    <button type="submit" class="main-button">Search</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('searchevents')
    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4>See Our Recent <em>Events</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                <div class="col-lg-12">
                    <div class="loop owl-carousel">
                        @foreach($events as $event)
                            <div class="item">
                                <a href="{{ route('show_event', $event->id)}}">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="/images/portfolio-01.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4> {{ $event->title }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('categories')
    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="menu">
                                        @foreach($categories as $category)
                                            @if($loop->index < 5)
                                                <div class="@if($loop->index == 0) first-thumb active @endif">
                                                    <div class="thumb">
                                                        <span class="icon"><img src="/images/service-icon-0{{$loop->index+1}}.png" alt=""></span>
                                                        {{ $category->name }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>SEO Analysis &amp; Daily Reports</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized Template</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Optimized Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="/images/services-image.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Healthy Food &amp; Life</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized Template</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Optimized Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="/images/services-image-02.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Car Re-search &amp; Transport</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized Template</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Optimized Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="/images/services-image-03.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Online Shopping &amp; Tracking ID</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized Template</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Optimized Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="/images/services-image-04.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Enjoy &amp; Travel</h4>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt ut
                                                                    labore et dolore kengan darwin doerski token.
                                                                    dover lipsum lorem and the others.</p>
                                                                <div class="ticks-list"><span><i
                                                                            class="fa fa-check"></i> Optimized Template</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Data Info</span>
                                                                    <span><i
                                                                            class="fa fa-check"></i> SEO Analysis</span>
                                                                    <span><i class="fa fa-check"></i> Optimized Template</span>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sedr do eiusmod deis tempor incididunt.</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="/images/services-image.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

