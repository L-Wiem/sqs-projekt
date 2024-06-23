@extends('guest_layout')
@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

