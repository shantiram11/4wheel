@extends('layouts.front')
@section('content')

    <div class="ui layout" id="top">

        <div class="light-section-sq">
            <!-- Hero Full Page -->
            <div class="hero-search-full-page low-sq next-sq">
                <!-- Hero Search Vertical Default -->
                <div class="h-search-v narrow-sq animate-sq shadow-sq">
                    <form action="listing_page.html" class="hero-search-form">

                        <div class="search-item">
                            <i class="icon icon-pickup-location"></i>
                            <div class="fltp">
                                <input type="text" value="" required>
                                <label class="placeholder" data-big-placeholder="Pickup location"
                                    data-little-placeholder="Pickup location"></label>
                            </div>
                        </div>
                        <div class="search-item">
                            <i class="icon icon-return-location"></i>
                            <div class="fltp">
                                <input type="text" value="" required>
                                <label class="placeholder" data-big-placeholder="Return location"
                                    data-little-placeholder="Return location"></label>
                            </div>
                        </div>

                        <div class="search-item">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="checkbox11">
                                <label for="checkbox11">Return car to pickup location</label>
                            </div>
                        </div>

                        <div class="search-item">
                            <i class="icon icon-pickup-date"></i>
                            <div class="fltp calendar-sq" id="rangestart">
                                <input type="text" class="filter" value="" required placeholder="enter date">
                                <label class="placeholder" data-big-placeholder="Pickup date"
                                    data-little-placeholder="Pickup date"></label>
                            </div>
                        </div>

                        <div class="search-item">
                            <i class="icon icon-return-date"></i>
                            <div class="fltp calendar-sq" id="rangeend">
                                <input type="text" class="filter" value="" required placeholder="enter date">
                                <label class="placeholder" data-big-placeholder="Return date"
                                    data-little-placeholder="Return date"></label>
                            </div>
                        </div>

                        <div class="search-item">

                            <button class="button-sq">
                                <i class="icon icon-search"></i>
                                <span>Find a car</span>
                            </button>

                        </div>

                    </form>
                </div>

                <!-- Hero Big - Slick -->
                <div class="sq-slick hero-big slide-up-sq left-sq" data-mobile-arrows="false" data-tablet-arrows="false"
                    data-mobile-dots="true" data-fade="true" data-speed="500" data-ease="linear">
                    <!-- .slide-up .fade .top .bottom -->

                    <!--Slide 01-->
                    <div class="">
                        <div class="caption-content">
                            <h1>Easy and fast <br>Rent your favourite car.</h1>
                            <p> Browse to our wide range of available cars and quickly rent your favourite one, in just few
                                clicks.
                            </p>
                        </div>
                        <div class="caption-outside">
                            <a class="button-sq link-sq" href=''>
                                <i class="icon big icon-slim-arrow-right"></i>
                                <span>read more</span>
                            </a>
                        </div>

                        <div class="video-wrapper">
                            {{-- <img src="{{ asset('assets/front/images/website.jpg') }}" alt=""> --}}
                            <iframe
                                src="https://www.youtube.com/embed/BDCU5OFXZ2c?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&start=15&mute=1"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                </div>

            </div>

            {{-- <div class="ui grid container">
                <div class="row">
                    <div class="ui column">
                        <div class="typo-section-sq top-default bottom-default">
                            <h2 class="heading-inline text-align-center-sq">
                                <i class="icon icon-slim-arrow-left sq-prev-button"></i>
                                <span>Our vendors</span>
                                <i class="icon icon-slim-arrow-right sq-next-button"></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui grid container typo-section-sq bottom-default">
                <div class="row">
                    <div class="sq-slick article-sq-slick" data-arrows="false" data-center-mode="true"
                        data-center-padding="0px" data-desktop-center-padding="0px" data-show-slides="5"
                        data-scroll-slides="3" data-tablet-show-slides="2" data-tablet-scroll-slides="2"
                        data-mobile-show-slides="3" data-mobile-scroll-slides="3" data-tablet-center-padding="0px"
                        data-mobile-center-padding="50px">

                        <!-- Slide 01-->
                        <div>
                            <div class="caption-content">
                                <img src="{{ asset('assets/front/images/partener_001.jpg') }}" alt="">
                            </div>
                        </div>

                        <!-- Slide 02-->
                        <div>
                            <div class="caption-content">
                                <img src="{{ asset('assets/front/images/partener_002.jpg') }}" alt="">
                            </div>
                        </div>

                        <!-- Slide 03-->
                        <div>
                            <div class="caption-content">
                                <img src="{{ asset('assets/front/images/partener_001.jpg') }}" alt="">
                            </div>
                        </div>

                        <!-- Slide 04-->
                        <div>
                            <div class="caption-content">
                                <img src="{{ asset('assets/front/images/partener_002.jpg') }}" alt="">
                            </div>
                        </div>

                        <!-- Slide 05-->
                        <div>
                            <div class="caption-content">
                                <img src="{{ asset('assets/front/images/partener_001.jpg') }}" alt="">
                            </div>
                        </div>

                        <!-- Slide 06-->
                        <div>
                            <div class="caption-content">
                                <img src="{{ asset('assets/front/images/partener_002.jpg') }}" alt="">
                            </div>
                        </div>


                    </div>
                </div>
            </div> --}}

        </div>
        <div class="typo-section-sq bottom-default">
            <div class="ui grid container">
                <div class="row">
                    <div class="ui twelve wide mobile twelve wide tablet twelve wide computer column">
                        <div class="typo-section-header-sq">
                            <h2 class="text-align-center-sq">Popular Cars</h2>
                        </div>
                    </div>
                    @foreach ($vehicles as $v )
                        <?php
                        $featured_image = $v->photos->where('featured','yes')->first();
                        ?>
                        <div class="ui twelve wide mobile six wide tablet four wide computer column">
                        <div class="property-item caption-sq shadow-sq small-sq">
                            <div class="property-item-inner">

                                <div class="price-tag-sq">{{$v->rate}} <span>/ Day</span></div>
                                <a class="add-wishlist modal-ui-trigger" href="" data-trigger-for="wishlist">
                                    <i class="icon icon-add-wishlist"></i>
                                </a>
                                <a class="image-sq" href={{route('front.detail',$v->slug)}}>
                                    <div class="image-wrapper">
                                        <span class="image-inner">
                                            @if($featured_image)
                                            <img  src="{{ asset('storage/photos/'.$featured_image->image) }}"
                                                alt="" class="">
                                            @endif
                                        </span>
                                    </div>
                                </a>
                                <div class="main-details">
                                    <div class="title-row">
                                        <a href={{route('front.detail',$v->slug)}} class="title-sq">{{$v->brand}}</a>
                                    </div>

                                    {{-- <div class="icons-row">
                                        <div class="icons-column">
                                            <i class="icon icon-heart"></i> 8.7
                                        </div>
                                        <div class="icons-column">
                                            <i class="icon icon-ac"></i> A/C
                                        </div>
                                        <div class="icons-column">
                                            <i class="icon icon-gearbox"></i> A
                                        </div>
                                        <div class="icons-column">
                                            <i class="icon icon-user-circle"></i> x 4
                                        </div>
                                    </div> --}}
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->

    <!-- Sign Up -->
    <div class="ui full modal" data-for="modal01">
        <div class="modal-full-background">
            <img src="{{ asset('assets/front/images/modal/modal_background_001.jpg') }}" alt="">
        </div>

        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            Sign Up Now
        </div>

{{--        <div class="content">--}}
{{--            <a href="" class="button-sq fullwidth-sq modal-ui-trigger" data-trigger-for="modal03">--}}
{{--                <i class="icon icon-email-2"></i>--}}
{{--                <span>Sign Up with Email</span>--}}
{{--            </a>--}}

{{--            <a href="" class="button-sq fullwidth-sq facebook-button">--}}
{{--                <i class="icon icon-logo-facebook2"></i>--}}
{{--                <span>Sign Up with Facebook</span>--}}
{{--            </a>--}}

{{--            <a href="" class="button-sq fullwidth-sq google-button">--}}
{{--                <img src="{{ asset('assets/front/images/icon-google-plus.svg') }}" alt="">--}}
{{--                <span>Sign Up with Google</span>--}}
{{--            </a>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in--}}
{{--                pharetra justo pulvinar. </p>--}}
{{--        </div>--}}

        <div class="actions">
            <div class="border-container">
                <div class="button-sq link-sq modal-ui-trigger" data-trigger-for="modal02">Already a member?</div>

                <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal02">
                    Log In
                    <i class="icon icon-person-lock-2"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Log In -->
    <div class="ui full modal" data-for="modal02">
        <div class="modal-full-background">
            <img src="{{ asset('assets/front/images/modal/modal_background_001.jpg') }}" alt="">
        </div>

        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            Log In
        </div>

        <div class="content">
            <div class="div-c">
                <div class="divided-column">
                    <input type="text" placeholder="E-mail Adress">
                </div>
                <div class="divided-column">
                    <input type="text" placeholder="Password">
                </div>
            </div>

            <div class="button-sq fullwidth-sq">Sign Up</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in
                pharetra justo pulvinar. </p>
        </div>

        <div class="actions">
            <div class="border-container">
                <div class="button-sq link-sq modal-ui-trigger" data-trigger-for="modal01">Don’t have an account?
                </div>

                <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal01">
                    Sign Up
                    <i class="icon icon-person-add-1"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign Up with mail -->
    <div class="ui full modal" data-for="modal03">
        <div class="modal-full-background">
            <img src="{{ asset('assets/front/images/modal/modal_background_001.jpg') }}" alt="">
        </div>

        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            Sign Up Now
        </div>

        <div class="content">

            <div class="div-c inline-2">
                <div class="divided-column">
                    <input type="text" placeholder="First Name">
                </div>
                <div class="divided-column">
                    <input type="text" placeholder="Last Name">
                </div>
            </div>

            <div class="div-c">
                <div class="divided-column">
                    <input type="text" placeholder="E-mail Adress">
                </div>
                <div class="divided-column">
                    <input type="text" placeholder="Password">
                </div>
            </div>

            <div class="div-c inline-3 one-label">
                <label>Birthday</label>
                <div class="divided-column">
                    <select name="dropdown" class="dropdown">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">...</option>
                    </select>
                </div>
                <div class="divided-column">
                    <select name="dropdown" class="dropdown">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">...</option>
                    </select>
                </div>
                <div class="divided-column">
                    <select name="dropdown" class="dropdown">
                        <option value="1">1985</option>
                        <option value="2">1986</option>
                        <option value="3">1987</option>
                        <option value="4">1988</option>
                        <option value="5">1989</option>
                        <option value="6">...</option>
                    </select>
                </div>
            </div>

            <div class="button-sq fullwidth-sq">Sign Up</div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in
                pharetra justo pulvinar. </p>

        </div>

        <div class="actions">
            <div class="border-container">
                <div class="button-sq link-sq"></div>

                <div class="button-sq link-sq login-sq modal-ui-trigger" data-trigger-for="modal01">
                    Log In
                    <i class="icon icon-person-lock-2"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Wishlist -->
    <div class="ui modal small" data-for="wishlist">
        <i class="icon icon-close close-modal"></i>

        <div class="header center">
            <h4>Wishlist</h4>
        </div>

        <div class="content">
            <p>Mauris malesuada leo libero, vitae tempor ante sagittis vitae. Suspendisse consectetur facilisis
                enim.</p>
            <br>
            <input type="checkbox" id="c01">
            <label for="c01">Beautiful Cars</label>
            <input type="checkbox" id="c02">
            <label for="c02">For Summer</label>
            <input type="checkbox" id="c03">
            <label for="c03">Dream Cars</label>
        </div>

        <div class="actions">
            <div class="div-c inline-2">
                <div class="divided-column">
                    <div class="button-sq cancel-sq fullwidth-sq">Cancel</div>
                </div>

                <div class="divided-column">
                    <div class="button-sq fullwidth-sq">OK</div>
                </div>
            </div>
        </div>
    </div>

@endsection
