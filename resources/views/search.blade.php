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
                        <h4>Searched <em>Events</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                    @foreach($events as $event)
                        <div class="col-md-4">
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
@endsection
