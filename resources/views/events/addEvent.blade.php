@extends('layout')
@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Event</div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">
                            <form method="POST" action="{{ route('store_event') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Capacity</label>
                                    <input type="number" name="capacity" id="capacity" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Is an Online Event?</label>
                                    <input type="radio" name="is_online" class="is_online_event_radio" value="1"> Yes
                                    <input type="radio" name="is_online" class="is_online_event_radio" value="0" checked>No
                                </div>

                                <div id="event-address-panel">
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <input type="text" name="address" id="address" class="event-address-input form-control" required>
                                    </div>
                                </div>


                                <!-- Add other fields as needed -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create Event</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
