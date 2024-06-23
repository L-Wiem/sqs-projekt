@extends('layout')
@section('searchevents')
    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4><em>Event No found -  404</em></h4>
                        <div>
                            <a href="{{route('myEvents')}}">Go Back to My Event Page</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                <div class="col-lg-12">
                    <div class="loop owl-carousel">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
