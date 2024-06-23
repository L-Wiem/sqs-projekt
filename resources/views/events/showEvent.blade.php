@extends('layout')

@section('categories')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Event: {{ $event->title  }}
                    </h2>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                Date: {{ date('j F, Y', strtotime($event->date))  }}
                                At {{ date('h:i:s A', strtotime($event->date))  }}
                            </div>
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                {{ $event->description  }}
                            </div>
                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                {{ $event->address  }}
                            </div>
                            @if(Auth::user())
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    @if(Auth::user()->id == $event->user_id)
                                        <a href="{{ route('edit_event', $event->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete_event', $event->id) }}"
                                           class="btn btn-danger">Delete</a>
                                    @else
                                        <a href="{{ route('reserve_event', $event->id) }}" class="btn btn-success">Reserve</a>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
