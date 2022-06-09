@extends('layouts.front')
@section('content')
    <div class="ui layout">
        <!-- grid -->
        <div class="ui grid container stackable centered">
            <div class="row">
                <div class="ui twelve wide tablet twelve wide computer ten wide widescreen ten wide large screen column property-section-boxed">
                    <br>
                    <div class="white-section shadow-sq">
                        <div class="inner-section">

                            <div class="ui grid">
                                <div class="row">
                                    <!-- Left-->
                                    <div class="ui twelve wide mobile six wide computer column">
                                        <!-- Slick aici-->
                                        <div class="property-image-wrapper">
                                            <div class="sq-slick carousel-sq" data-center-mode="true" data-center-padding="0" data-show-slides="1" data-scroll-slides="1" data-mobile-center-padding="0" data-tablet-arrows="false" data-mobile-arrows="false" data-fade="true" data-ease="linear" data-speed="500" data-tablet-fade="false" data-tablet-ease="ease" data-tablet-speed="300" data-mobile-fade="false" data-mobile-ease="ease" data-mobile-speed="300">
                                                <!-- Slide 01-->
                                                <?php
                                                $images = $vehicle->photos->all();
                                                ?>
                                                @foreach($images as $image)
                                                <div>
                                                    <div class="caption-content"></div>
                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img" src="{{ asset('storage/uploads/vehicle/'.$image->image) }}" alt="" data-gallery="gallery" data-caption="Car 01">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
{{--                                                <!-- Slide 02-->--}}
{{--                                                <div>--}}
{{--                                                    <div class="caption-content"></div>--}}

{{--                                                    <div class="image-wrapper">--}}
{{--                                                        <div class="image-inner">--}}
{{--                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/property/property_big_01.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 02">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Slide 03-->--}}
{{--                                                <div>--}}
{{--                                                    <div class="caption-content"></div>--}}

{{--                                                    <div class="image-wrapper">--}}
{{--                                                        <div class="image-inner">--}}
{{--                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/property/property_big_02.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 03">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <!-- Slide 04-->--}}
{{--                                                <div>--}}
{{--                                                    <div class="caption-content"></div>--}}

{{--                                                    <div class="image-wrapper">--}}
{{--                                                        <div class="image-inner">--}}
{{--                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/property/property_big_03.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 04">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <h1 class="title-sq">{{$vehicle->brand}}</h1>

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <i class="fas fa-gas-pump-slash"></i> {{$vehicle->fuel_type}}
                                            </div>
                                            <div class="icons-column">
                                                <i class="fas fa-location"></i>{{$vehicle->location}}
                                            </div>
                                            <div class="icons-column">
                                                <i class="icon icon-user-circle"></i> x {{$vehicle->seat_count}}
                                            </div>
                                        </div>

                                        <p class="description-sq">
                                            {{$vehicle->description}}
                                              </p>
                                    </div>

                                    <!-- Right -->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <form  method="post" class="property-checkout-container main-infos" action="{{route('front.booking.store')}}">
                                            @csrf
                                            <input type="hidden" value="{{$vehicle->slug}}" name="vehicle">
                                            <div class="div-c">
                                                <label>Pick up location</label>
                                                <input name="pickup_location" type="text" placeholder=" "/>
                                            </div>
                                            <div class="div-c">
                                                <label>Return location</label>
                                                <input name="return_location" type="text" placeholder=" "/>
                                            </div>
                                            <div class="div-c">
                                                <input type="checkbox" name="return_same" id="checkbox1">
                                                <label for="checkbox1">Return car to the same location</label>
                                            </div>

                                            <div class="div-c inline-2 inline-check-in">

                                                <div class="divided-column calendar-sq" id="locationStart">
                                                    <label class="placeholder">Check in</label>

                                                    <div class="relative-sq">
                                                        <input type="text" name="book_date" class="filter" value="" required placeholder="date">

                                                        <i class="icon icon-little-arrow filters-arrow"></i>
                                                    </div>

                                                </div>

                                                <div class="divided-column calendar-sq" id="locationEnd">

                                                    <label class="placeholder">Check Out</label>

                                                    <input type="text" name="return_date" class="filter" value="" required placeholder="date">
                                                </div>
                                            </div>
                                            <button class="button-sq fullwidth-sq font-weight-bold-sq"  type="submit">Instant Booking</button>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Reviews</h3>

                    <div class="reviews-search">
                        <form action="#" class="">
                            <input id="reviews-search" type="text" placeholder="Search reviews" value="" required="">
                            <label><i class="icon icon-search"></i></label>
                        </form>
                    </div>

                    <div class="reviews-feed">

                        @foreach($reviews as $review)
                        <div class="reviews-row">
                            <div class="review-meta">
                                <a class="avatar-sq verified-sq" href="">
                                    <img src="{{asset('storage/uploads/users/'.$review->user->current_image)}}" alt="">
                                </a>
                                <a class="name-sq" href="">{{$review->user->name}}  </a>
                            </div>

                            <div class="comment-sq">
                                <span class="date-sq">{{ $review->created_at->format('M d,y') }}</span>

                                <p> {{$review->body}}     </p>
                            </div>
                        </div>
                        @endforeach
                        <div class="reviews-row">
                            <div class="review-meta">
                                <div class="avatar-sq {{(auth()->check() && auth()->user()->verify == 'yes') ? 'verified-sq' : ''}} my-avatar-sq">
                                    @if(auth()->check())
                                    <img src="{{asset('storage/uploads/users/'.Auth()->user()->current_image)}}" alt="">
                                        @endif
                                </div>
                                @if(auth()->check())
                                <p class="name-sq">
                                    {{Auth()->user()->name}}
                                </p>
                                @endif
                            </div>

                            <div class="comment-sq mb-4">
                                <form  method="POST" action="{{route('storeReview',$vehicle->slug)}}">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            {{ implode('', $errors->all(':message')) }}
                                        </div>
                                    @endif
                                    <textarea class="comment-textarea" name="body"  cols="30" rows="5" placeholder="Review here"></textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                               </span>
                                    @enderror
                                <br>
                                <br>
                                <button type="submit" class="button-sq font-weight-extrabold-sq small-sq float-right-sq" href="">Post Review</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('page_level_script')
    <script>
        $(document).ready(function(){
            $('#locationStart').calendar({
                type: 'date',
                endCalendar: $('#locationEnd'),
                //inline: true,
                className: {
                    prevIcon: "icon icon-arrow-left-122",
                    nextIcon: "icon icon-arrow-right-122"
                }
            });

            $('#locationEnd').calendar({
                type: 'date',
                startCalendar: $('#locationStart'),
                //inline: true,
                className: {
                    prevIcon: "icon icon-arrow-left-122",
                    nextIcon: "icon icon-arrow-right-122"
                }
            });
        });
    </script>
@endsection
