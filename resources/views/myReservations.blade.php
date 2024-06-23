@extends('layout')
@section('searchevents')
    <div id="portfolio" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4>My <em>Reservations</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                @foreach($reservations as $reservation)
                    <div class="col-md-4">
{{--                        <a href="{{ route('show_event', $reservation->id)}}">--}}
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="/images/portfolio-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4> {{ $reservation->id }}</h4>
{{--                                    <h4><a href="{{ route('edit_event', $event->id) }}" class="btn btn-warning">--}}
{{--                                            Edit</a></h4>--}}
{{--                                    <h4><a href="{{ route('delete_event', $event->id) }}" class="btn btn-warning">--}}
{{--                                            Delete</a></h4>--}}
                                </div>
                            </div>
{{--                        </a>--}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
