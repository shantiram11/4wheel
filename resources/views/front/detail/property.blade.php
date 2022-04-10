@extends('layouts.front')
@section('content')
    <?php
    $stripePubKey = env('STRIPE_KEY');
    $currencyTextRaw = 'USD';
    $total = 100;
    ?>
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
                                    @if(session("failureMsg"))
                                        <div class="alert alert-danger fade show mt-1" id="paymentErrorAlert" role="alert">
                                            <span>{{ session("failureMsg") }}</span>
                                        </div>
                                    @endif
                                    <div class="alert alert-danger fade show mt-1" id="validationErrorAlert" role="alert" style="display:none;">
                                        <span id="validationErrorText"></span>
                                    </div>
                                    <!-- Left-->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <!-- Slick aici-->

                                        <div class="property-image-wrapper">
                                            <div class="sq-slick carousel-sq" data-center-mode="true" data-center-padding="0" data-show-slides="1" data-scroll-slides="1" data-mobile-center-padding="0" data-tablet-arrows="false" data-mobile-arrows="false" data-fade="true" data-ease="linear" data-speed="500" data-tablet-fade="false" data-tablet-ease="ease" data-tablet-speed="300" data-mobile-fade="false" data-mobile-ease="ease" data-mobile-speed="300">

                                                <!-- Slide 01-->
                                                <div>
                                                    <div class="caption-content"></div>
                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/cars/property_item_cars_03.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 01">
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Slide 02-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/property/property_big_01.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 02">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slide 03-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/property/property_big_02.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 03">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slide 04-->
                                                <div>
                                                    <div class="caption-content"></div>

                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img class="image-sq slick-img" src="{{asset('assets/front/images/property/property_big_03.jpg')}}" alt="" data-gallery="gallery" data-caption="Car 04">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <a class="host-sq" href="vendor_details.html">
                                                <span class="avatar-sq">
                                                    <img src="{{asset('assets/front/images/avatar/avatar_04.jpg')}}" alt="">
                                                </span>
                                                <p class="host-name-sq">
                                                    Dustin Porter
                                                </p>

                                            </a>
                                        </div>

                                        <h1 class="title-sq">Audi A3 2.0 TDI</h1>

                                        <div class="icons-row">
                                            <div class="icons-column">
                                                <div class="rating-sq">
                                                    <i class="icon icon-heart"></i>
                                                    8.9
                                                </div>
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
                                        </div>

                                        <p class="description-sq">
                                            In hac habitasse platea dictumst. Integer quis tortor enim. Integer et elit nec magna ultricies convallis. In venenatis eu erat et facilisis. Vestibulum congue enim nisl. Fusce arcu enim, porta a auctor vel, hendrerit a libero. Vivamus vel dapibus sem.
                                        </p>

                                    </div>

                                    <!-- Right -->
                                    <div class="ui twelve wide mobile six wide computer column">

                                        <form  class="property-checkout-container main-infos" action="{{route('booking.create')}}" method="POST" enctype="multipart/form-data">

                                            <div class="div-c">
                                                <label>Pick up location</label>
                                                <input type="text" placeholder=" ">
                                            </div>
                                            <div class="div-c">
                                                <label>Return location</label>
                                                <input type="text" placeholder=" ">
                                            </div>
                                            <div class="div-c">
                                                <input type="checkbox" id="checkbox1">
                                                <label for="checkbox1">Return car to the same location</label>
                                            </div>


                                            <div class="div-c inline-2 inline-check-in">

                                                <div class="divided-column calendar-sq" id="sticky-box-rangestart">
                                                    <label class="placeholder">Check in</label>

                                                    <div class="relative-sq">
                                                        <input type="text" class="filter" value="" required placeholder="date">

                                                        <i class="icon icon-little-arrow filters-arrow"></i>
                                                    </div>

                                                </div>

                                                <div class="divided-column calendar-sq" id="sticky-box-rangeend">

                                                    <label class="placeholder">Check Out</label>

                                                    <input type="text" class="filter" value="" required placeholder="date">

                                                </div>
                                            </div>

                                            <div class="div-c extras-sq">
                                                <label class="placeholder">Extras</label>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox2">
                                                    <label for="checkbox2">Child Seat</label>

                                                    <span class="value-sq">$10</span>
                                                </div>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox3">
                                                    <label for="checkbox3">Driver</label>

                                                    <span class="value-sq">$13</span>
                                                </div>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox4">
                                                    <label for="checkbox4">Neque consequa es nterdum erat consequa es nterdum erat</label>

                                                    <span class="value-sq">$10</span>
                                                </div>

                                                <div class="divided-column">
                                                    <input type="checkbox" id="checkbox5">
                                                    <label for="checkbox5">Phasellus sed neque consequa es nterdum erat</label>

                                                    <span class="value-sq">$10</span>
                                                </div>

                                            </div>


                                            <div class="div-c total-sq">
                                                <div class="divided-column">
                                                    <label class="placeholder">Total</label>
                                                    <span class="value-sq">$200</span>

                                                </div>
                                            </div>

                                            {{--Stripe Payment flow starts from here--}}
                                            <div id="stripe-card-element" class="card-input">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>
                                            <div class="checkout-terms form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="terms_checkbox">
                                                <label class="form-check-label" for="terms_checkbox" style="margin-top: 20px;">
                                                    I agree to {{config('app.name')}}<a href="#" class="text-muted"> terms and conditions.</a>
                                                    <a class="text-muted" href="#">Privacy Policy information.</a>
                                                </label>
                                            </div>
                                            <form action="{{route('checkout.fulfillOrder')}}"
                                                  id="payment-form-stripe" name="stripePayForm" method="POST">
                                                @csrf
                                                <input type="hidden" id="transaction_stripe"
                                                       name="transaction_id" />
                                                <input type="hidden" id="total_stripe" name="total" />
                                                <div class="place-order-flex-box" style="position: relative;">
                                                    <div class="checkout-page Place-order">
                                                        <button class="button-sq fullwidth-sq font-weight-bold-sq"
                                                        id="payStartBtnStripe" form="payment-form-stripe" type="submit">Instant Booking</button>
                                                    </div>
                                                    <div class="spinner-border"  id="payStartSpinner" role="status"  style="width: 2rem; height: 2rem; display: none;  position: absolute;right: 13px;top: 8px;">
                                                    </div>
                                                </div>
                                            </form>
                                            {{-- Stripe ends--}}
                                        </div>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <h3>Location</h3>

                    <div class="map-wrapper shadow-sq">
                        <div id="map"></div>
                    </div>

                    <h3>Reviews</h3>

                    <div class="reviews-header">
                        <div class="rating-big">
                            <div class="rating-badge">
                                <span>9.2</span>
                                <i class="icon icon-heart"></i>
                            </div>
                            <div class="rating-info">
                                <p>More than <strong>95%</strong> of guests recommend this place</p>
                            </div>
                        </div>
                        <div class="rating-percentage">
                            <div class="rating-column">
                                <p class="rating-label"><strong>Accuracy</strong></p>
                                <div class="basic-progressbar">
                                    <div class="inner" style="width:75%"></div>
                                </div>
                            </div>

                            <div class="rating-column">
                                <p class="rating-label"><strong>Communication</strong></p>
                                <div class="basic-progressbar">
                                    <div class="inner" style="width:55%"></div>
                                </div>
                            </div>

                            <div class="rating-column">
                                <p class="rating-label"><strong>Location</strong></p>
                                <div class="basic-progressbar">
                                    <div class="inner" style="width:25%"></div>
                                </div>
                            </div>

                            <div class="rating-column">
                                <p class="rating-label"><strong>Cleanliness</strong></p>
                                <div class="basic-progressbar">
                                    <div class="inner" style="width:80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="reviews-search">
                        <form action="#" class="">
                            <input id="reviews-search" type="text" placeholder="Search reviews" value="" required="">
                            <label><i class="icon icon-search"></i></label>
                        </form>
                    </div>

                    <div class="reviews-feed">
                        <div class="reviews-row">
                            <div class="review-meta">
                                <a class="avatar-sq verified-sq" href="vendor_details.html">
                                    <img src="{{asset('assets/front/images/avatar/avatar_01.jpg')}}" alt="">
                                </a>
                                <a class="name-sq" href="vendor_details.html">Danny Martinez</a>
                            </div>

                            <div class="comment-sq">
                                <span class="date-sq">12 september 2017</span>

                                <p>As the saying goes: “Hospitality is making your guests feel at home, even though you wish they were". So please treat the place and the building neighbours as you would do your own.</p>
                            </div>
                        </div>

                        <div class="reviews-row">
                            <div class="review-meta">
                                <a class="avatar-sq verified-sq" href="vendor_details.html">
                                    <img src="{{asset('assets/front/images/avatar/avatar_03.jpg')}}" alt="">
                                </a>
                                <a class="name-sq" href="vendor_details.html">Nathaniel Brown</a>
                            </div>
                            <div class="comment-sq">
                                <span class="date-sq">24 august 2017</span>

                                <p>With your budget in mind, it is easy to plan a chartered yacht vacation. Companies often have a fleet of sailing vessels that can accommodate parties of various sizes. You may want to make it a more intimate trip with only close family. There are charters that can be rented for as few as two people.</p>
                            </div>
                        </div>

                        <div class="reviews-row">
                            <div class="review-meta">
                                <a class="avatar-sq verified-sq" href="vendor_details.html">
                                    <img src="{{asset('assets/front/images/avatar/avatar_02.jpg')}}" alt="">
                                </a>
                                <a class="name-sq" href="vendor_details.html">Adele Burke</a>
                            </div>

                            <div class="comment-sq">
                                <span class="date-sq">06 May 2017</span>

                                <div class="ui accordion more-sq">
                                    <div class="title">
                                        <a class="accordion-trigger more-trigger right-sq" data-more="More" data-less="Less">
                                            <i class="icon icon-arrow-down-122"></i>
                                        </a>
                                        <p>It is important to choose a hotel that makes you feel comfortable – contemporary or traditional furnishings, local decor or international, formal or relaxed. The ideal hotel directory should let you know of the options available.
                                        </p>

                                    </div>

                                    <div class="content">
                                        <p>If it matters that your hotel is, for example, on the beach, close to the theme park, or convenient for the airport, then location is paramount. Any decent directory should offer a location map of the hotel and its surroundings. There should be distance charts to the airport offered as well as some form of interactive map.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="reviews-row">

                            <div class="review-meta">
                                <div class="avatar-sq verified-sq my-avatar-sq">
                                    <img src="{{asset('assets/front/images/avatar/my_avatar.jpg')}}" alt="">
                                </div>
                                <p class="name-sq">Me</p>
                            </div>

                            <div class="comment-sq">
                                <textarea class="comment-textarea"  cols="30" rows="5" placeholder="Comment here"></textarea>
                                <br>
                                <br>
                                <a class="button-sq font-weight-extrabold-sq small-sq float-right-sq" href="">Post comment</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

{{--        <div class="ui grid container stackable">--}}
{{--            <div class="row">--}}
{{--                <div class="sq-slick article-sq-slick" data-center-mode="true" data-center-padding="0px" data-desktop-center-padding="0px" data-show-slides="3" data-scroll-slides="3" data-desktop-show-slides="2" data-desktop-scroll-slides="2" data-tablet-show-slides="2" data-tablet-scroll-slides="2" data-mobile-show-slides="1" data-mobile-scroll-slides="1" data-tablet-center-padding="0px" data-mobile-center-padding="40px">--}}


{{--                    <!-- Slide 01-->--}}
{{--                    <div>--}}
{{--                        <div class="article-sq item">--}}
{{--                            <div class="item-inner">--}}

{{--                                <!-- image container -->--}}
{{--                                <a class="image-sq" href="article.html">--}}
{{--									<span class="image-wrapper">--}}
{{--										<span class="image-inner">--}}
{{--											<img class="image-sq" src="{{asset('assets/front/images/magic_grid/magic_grid_article_01.jpg')}}" alt="">--}}
{{--										</span>--}}
{{--									</span>--}}
{{--                                </a>--}}

{{--                                <!-- typography container-->--}}
{{--                                <div class="typo-sq">--}}
{{--                                    <p class="typo-label-sq" data-label-before="Tech" data-label-after="Rent a car"></p>--}}
{{--                                    <p class="typo-title-sq">Thousands Now Adware Removal Who Never Thought They Could</p>--}}
{{--                                    <p class="typo-desc-sq">Few would argue that, despite the advancements of feminism over the past three decades, women still face a double standard when it comes to their behavior. While men’s borderline-inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.</p>--}}

{{--                                    <a href="article.html" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Slide 02-->--}}
{{--                    <div>--}}
{{--                        <div class="article-sq item">--}}
{{--                            <div class="item-inner">--}}

{{--                                <!-- image container -->--}}
{{--                                <a class="image-sq" href="article.html">--}}
{{--									<span class="image-wrapper">--}}
{{--										<span class="image-inner">--}}
{{--											<img class="image-sq" src="{{asset('assets/front/images/magic_grid/magic_grid_article_02.jpg')}}" alt="">--}}
{{--										</span>--}}
{{--									</span>--}}
{{--                                </a>--}}

{{--                                <!-- typography container-->--}}
{{--                                <div class="typo-sq">--}}
{{--                                    <p class="typo-label-sq" data-label-before="Tech" data-label-after="Rent a car"></p>--}}
{{--                                    <p class="typo-title-sq">Maui By Air The Best Way Around The Island</p>--}}
{{--                                    <p class="typo-desc-sq">You love having a second home but the mortgage is putting a crater in your wallet. Many second home owners turn to renting their property as a vacation rental to help defray the costs of ownership. How do you price a vacation home rental without overcharging but making enough to cover your costs? Do your research.</p>--}}

{{--                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Slide 03-->--}}
{{--                    <div>--}}
{{--                        <div class="article-sq item">--}}
{{--                            <div class="item-inner">--}}

{{--                                <!-- image container -->--}}
{{--                                <a class="image-sq" href="article.html">--}}
{{--									<span class="image-wrapper">--}}
{{--										<span class="image-inner">--}}
{{--											<img class="image-sq" src="{{asset('assets/front/images/magic_grid/magic_grid_article_03.jpg')}}" alt="">--}}
{{--										</span>--}}
{{--									</span>--}}
{{--                                </a>--}}

{{--                                <!-- typography container-->--}}
{{--                                <div class="typo-sq">--}}
{{--                                    <p class="typo-label-sq" data-label-before="Auto" data-label-after="Rent a car"></p>--}}
{{--                                    <p class="typo-title-sq">Stu Unger Rise And Fall Of A Poker Genius</p>--}}
{{--                                    <p class="typo-desc-sq">While most people enjoy casino gambling, sports betting, lottery and bingo playing for the fun and excitement it provides, others may experience gambling as an addictive and distractive habit. Statistics show that while 85 percent of the adult population in the US enjoys some type of gambling every year, between 2 and 3 percent of will develop a gambling problem and 1 percent of them are diagnosed as pathological gamblers. Where can you draw the line between harmless gambling to problem gambling? How can you tell if you or your friend are compulsive gamblers? Here you can find answers to these questions and other questions regarding problem gambling and gambling addiction. What is the Meaning of Problem Gambling?</p>--}}

{{--                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Slide 04-->--}}
{{--                    <div>--}}
{{--                        <div class="article-sq item">--}}
{{--                            <div class="item-inner">--}}

{{--                                <!-- image container -->--}}
{{--                                <a class="image-sq" href="article.html">--}}
{{--									<span class="image-wrapper">--}}
{{--										<span class="image-inner">--}}
{{--											<img class="image-sq" src="{{asset('assets/front/images/magic_grid/magic_grid_article_04.jpg')}}" alt="">--}}
{{--										</span>--}}
{{--									</span>--}}
{{--                                </a>--}}

{{--                                <!-- typography container-->--}}
{{--                                <div class="typo-sq">--}}

{{--                                    <p class="typo-label-sq" data-label-before="Tech" data-label-after="Rent a car"></p>--}}
{{--                                    <p class="typo-title-sq">What Is Hdcp</p>--}}
{{--                                    <p class="typo-desc-sq">If you are in the market for a computer, there are a number of factors to consider. Will it be used for your home, your office or perhaps even your home office combo? First off, you will need to set a budget for your new purchase before deciding whether to shop for notebook or desktop computers. Many offices use desktop computers because they are not intended to be moved around a lot. In addition, affordability often plays a large role in someone’s decision as to whether to purchase notebook or desktop computers.</p>--}}

{{--                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Slide 05-->--}}
{{--                    <div>--}}
{{--                        <div class="article-sq item">--}}
{{--                            <div class="item-inner">--}}

{{--                                <!-- image container -->--}}
{{--                                <a class="image-sq" href="article.html">--}}
{{--									<span class="image-wrapper">--}}
{{--										<span class="image-inner">--}}
{{--											<img class="image-sq" src="{{asset('assets/front/images/magic_grid/magic_grid_article_05.jpg')}}" alt="">--}}
{{--										</span>--}}
{{--									</span>--}}
{{--                                </a>--}}

{{--                                <!-- typography container-->--}}
{{--                                <div class="typo-sq">--}}
{{--                                    <p class="typo-label-sq" data-label-before="Auto" data-label-after="Rent a car"></p>--}}
{{--                                    <p class="typo-title-sq">Anonymous Proxy</p>--}}
{{--                                    <p class="typo-desc-sq">LCD screens are uniquely modern in style, and the liquid crystals that make them work have allowed humanity to create slimmer, more portable technology than we’ve ever had access to before. From your wrist watch to your laptop, a lot of the on the go electronics that we tote from place to place are only possible because of their thin, light LCD display screens. Liquid crystal display (LCD) technology still has some stumbling blocks in its path that can make it unreliable at times, but on the whole the invention of the LCD screen has allowed great leaps forward in global technological progress.</p>--}}

{{--                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Slide 06-->--}}
{{--                    <div>--}}
{{--                        <div class="article-sq item">--}}
{{--                            <div class="item-inner">--}}

{{--                                <!-- image container -->--}}
{{--                                <a class="image-sq" href="article.html">--}}
{{--									<span class="image-wrapper">--}}
{{--										<span class="image-inner">--}}
{{--											<img class="image-sq" src="{{asset('assets/front/images/magic_grid/magic_grid_article_06.jpg')}}" alt="">--}}
{{--										</span>--}}
{{--									</span>--}}
{{--                                </a>--}}

{{--                                <!-- typography container-->--}}
{{--                                <div class="typo-sq">--}}
{{--                                    <p class="typo-label-sq" data-label-before="Adventure" data-label-after="Rent a car"></p>--}}
{{--                                    <p class="typo-title-sq">Live Poker How To Win Tournament Games</p>--}}
{{--                                    <p class="typo-desc-sq">The term “boutique hotel” has been widely used in recent years, but what does it mean and why should you stay in one?</p>--}}

{{--                                    <a href="" class="read-more-sq">read more <i class="icon icon-arrow-right-122"></i></a>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <br>
        <br>

    </div>
@endsection
@section('page_level_script')
    @include('front.detail.checkout-script')
    @include('front.detail.stripe-script')
@endsection
