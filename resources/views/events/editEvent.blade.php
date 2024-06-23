@extends('layout')
@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Event</div>
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
                            <form method="POST" action="{{ route('update_event', $event->id) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if ($event->category_id == $category->id) selected @endif
                                            >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$event->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" value={{$event->date}} required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Capacity</label>
                                    <input type="text" name="capacity" id="capacity" class="form-control" value={{$event->capacity}} required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" required>{{$event->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Is an Online Event?</label>
                                    <input type="radio" name="is_online" class="is_online_event_radio" value="1" @if ($event->is_online) checked @endif> Yes
                                    <input type="radio" name="is_online" class="is_online_event_radio" value="0" @if (!$event->is_online) checked @endif>No
                                </div>

                                <div id="event-address-panel"  @if ($event->is_online) style="display: none;" @endif>
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <input type="text" name="address" id="address" class="event-address-input form-control" @if (!$event->is_online) required @endif>
                                    </div>
                                </div>


                                <!-- Add other fields as needed -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
