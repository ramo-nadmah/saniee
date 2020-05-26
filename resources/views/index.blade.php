<!DOCTYPE html>
<html lang="en">
<head>
    <title>ClassyAds &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    @include('layouts.head')--}}
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">


    <link rel="stylesheet" href="css/index.css">
<style
    >
    .black-text{
        color: #202f65;
    }
    .card_it{
        max-height:300px;

    }
</style>
</head>
<body>

<div class="site-wrap">
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('layouts.header')

    <div class="site-blocks-cover overlay" style="background-image: url(/images/home_pic.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12">


                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 class="" data-aos="fade-up">The largest gathering for stores in Jordan</h1>
                            <p data-aos="fade-up" data-aos-delay="100">You can buy, sell and search anything you want.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if(Auth::guard('web')->check())
    <div class="site-section bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2 class="h5 mb-4 text-black">Followed Ads</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12  block-13">
                    <div class="owl-carousel nonloop-block-13">

                    {{--            @if(App\Follower::where('user_id',Auth::guard('web')->user()->id)->where('follow_id',$post->shop->id)->count())--}}
<?php

            $followers=App\Follower::where('user_id',Auth::guard('web')->user()->id)->get();

            foreach($followers as $follow)
               {

                   $posts=App\Post::where('shop_id',$follow->follow_id)->get();

                    foreach($posts as $post)
                     {
?>


                                <div class="card">
                                    <a href="/single={{$post->id}}">
                                        <img class="card-img-top rounded" src="/images/{{App\Image::where('post_id',$post->id)->pluck('image')->first()}}">
                                        <div class="card-body  text-center">
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-10">
                                                    <h5 class="card-title  font-weight-normal font-italic text-center" style="color: #202f65">{{$post->name}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-10">
                                                    <p class="p_color">
                                                       {{$post->slogan}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h6 class="">category :</h6>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h6 class="border font-weight-light cat_card1">{{$post->category->name}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

<?php
                     }
                }
?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif


    @if(Auth::guard('shop')->check())
        <div class="site-section bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="h5 mb-4 text-black">Followed Ads</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12  block-13">
                        <div class="owl-carousel nonloop-block-13">

<?php

                            $followers=App\Follower::where('shop_id',Auth::guard('shop')->user()->id)->get();

                            foreach($followers as $follow)
                            {

                                $posts=App\Post::where('shop_id',$follow->follow_id)->get();

                                foreach($posts as $post)
                                {
?>


                                    <div class="card">
                                        <a href="/single={{$post->id}}">
                                            <img class="card-img-top rounded" src="/images/{{App\Image::where('post_id',$post->id)->pluck('image')->first()}}">
                                            <div class="card-body  text-center">
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-10">
                                                        <h5 class="card-title  font-weight-normal font-italic text-center" style="color: #202f65">{{$post->name}}</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-10">
                                                        <p class="p_color">
                                                            {{$post->slogan}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h6 class="">category :</h6>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="border font-weight-light cat_card1">{{$post->category->name}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

<?php
                                }
                            }
?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif


    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Categorys</h2>
                    <p class="color-black-opacity-5">find your shops here</p>
                </div>
            </div>
            <div class="row px-2 py-1">
                @foreach($categories as $category)
                <div class="col-lg-3">
                    <a href="/ads={{$category->id}}">
                        <div class="card card_it">
                            <img class="card-img-top card_image rounded" src="/images/{{$category->logo}}">
                            <div class="card-body  text-center">
                                <h5 class="card-title font-weight-normal font-italic text-center black-text" style="">{{$category->name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach



            </div>

            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/jquery-migrate-3.0.1.min.js"></script>
            <script src="js/jquery-ui.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/jquery.stellar.min.js"></script>
            <script src="js/jquery.countdown.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/bootstrap-datepicker.min.js"></script>
            <script src="js/aos.js"></script>
            <script src="js/rangeslider.min.js"></script>
            <script src="js/main.js"></script>

</body>
</html>






{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--@include('layouts.head')--}}
{{--<head>--}}
{{--    <style>--}}
{{--        .owl-stage-outer{--}}
{{--            position:relative;--}}
{{--            overflow:hidden;--}}
{{--            -webkit-transform:translate3d(0,0,0);--}}
{{--            direction: ltr;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}


{{--<div class="site-wrap">--}}
{{--    @include('layouts.header')--}}



{{--    <div class="site-blocks-cover overlay" style="background-image: url('/images/hero_2.jpg') " data-aos="fade" data-stellar-background-ratio="0.5">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center justify-content-center text-center">--}}

{{--                <div class="col-md-12">--}}


{{--                    <div class="row justify-content-center mb-4">--}}
{{--                        <div class="col-md-8 text-center">--}}
{{--                            <h1 class="" data-aos="fade-up">Largest Classifieds In The World</h1>--}}
{{--                            <p data-aos="fade-up" data-aos-delay="100">You can buy, sell anything you want.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">--}}
{{--                        <form action="/search" method="post">--}}
{{--                            @csrf--}}

{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-lg-12 mb-4 mb-xl-0 col-xl-4">--}}

{{--                                            <input type="text" onkeyup="searcher()" id="search" name="keyword" class="form-control rounded" placeholder="What are you looking for?">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">--}}
{{--                                        <div class="wrap-icon">--}}
{{--                                            <span class="icon icon-room"></span>--}}
{{--                                            <input type="text" class="form-control rounded" placeholder="Location">--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">--}}
{{--                                        <div class="select-wrap">--}}
{{--                                            <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>--}}
{{--                                            <select class="form-control rounded" name="" id="">--}}
{{--                                                <option value="">All Categories</option>--}}
{{--                                                <option value="">Real Estate</option>--}}
{{--                                                <option value="">Books &amp;  Magazines</option>--}}
{{--                                                <option value="">Furniture</option>--}}
{{--                                                <option value="">Electronics</option>--}}
{{--                                                <option value="">Cars &amp; Vehicles</option>--}}
{{--                                                <option value="">Others</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-12 col-xl-2 ml-auto text-right">--}}
{{--                                        <input type="submit" class="btn btn-primary btn-block rounded" value="Search">--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="site-section bg-light">--}}
{{--        <div class="container">--}}

{{--            <div class="overlap-category mb-5">--}}
{{--                <div class="row align-items-stretch no-gutters">--}}
{{--                    @foreach(App\Category::all() as $category)--}}
{{--                    <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">--}}
{{--                        <a href="{{route('ad.id', ['id' => $category])}}" class="popular-category h-100">--}}
{{--                            <span class="icon"><span class="flaticon-house"></span></span>--}}
{{--                            <span class="caption mb-2 d-block">{{$category->name}}</span>--}}
{{--                            <span class="number">{{$category->posts->count()}}</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <h2 class="h5 mb-4 text-black">Featured Ads</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-12  block-13">--}}
{{--                    <div class="owl-carousel nonloop-block-13">--}}

{{--                        @foreach(App\Post::all() as $post)--}}
{{--                        <div class="d-block d-md-flex listing vertical">--}}
{{--                            <a href="single" class="img d-block" style="background-image: url('/images/{{App\Image::where('post_id',$post->id)->pluck('image')->first()}}')"></a>--}}
{{--                            <div class="lh-content">--}}
{{--                                <span class="category">{{$post->category->name}}</span>--}}
{{--                                <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                                <h3><a href="single">{{$post->name}}</a></h3>--}}
{{--                                <address>{{$post->slogan}}</address>--}}
{{--                                <p class="mb-0">--}}
{{--                                    <span class="icon-star text-warning"></span>--}}
{{--                                    <span class="icon-star text-warning"></span>--}}
{{--                                    <span class="icon-star text-warning"></span>--}}
{{--                                    <span class="icon-star text-warning"></span>--}}
{{--                                    <span class="icon-star text-secondary"></span>--}}
{{--                                    <span class="review">(3 Reviews)</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}


{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="site-section" data-aos="fade">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center mb-5">--}}
{{--                <div class="col-md-7 text-center border-primary">--}}
{{--                    <h2 class="font-weight-light text-primary">Popular Products</h2>--}}
{{--                    <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">--}}

{{--                    <div class="listing-item">--}}
{{--                        <div class="listing-image">--}}
{{--                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="listing-item-content">--}}
{{--                            <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <a class="px-3 mb-3 category" href="#">Car &amp; Vehicles</a>--}}
{{--                            <h2 class="mb-1"><a href="#">Red Luxury Car</a></h2>--}}
{{--                            <span class="address">West Orange, New York</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">--}}

{{--                    <div class="listing-item">--}}
{{--                        <div class="listing-image">--}}
{{--                            <img src="images/img_2.jpg" alt="Image" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="listing-item-content">--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <a class="px-3 mb-3 category" href="#">Real Estate</a>--}}
{{--                            <h2 class="mb-1"><a href="#">House with Swimming Pool</a></h2>--}}
{{--                            <span class="address">West Orange, New York</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">--}}

{{--                    <div class="listing-item">--}}
{{--                        <div class="listing-image">--}}
{{--                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="listing-item-content">--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <a class="px-3 mb-3 category" href="#">Furniture</a>--}}
{{--                            <h2 class="mb-1"><a href="#">Wooden Chair &amp; Table</a></h2>--}}
{{--                            <span class="address">West Orange, New York</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="col-md-6 mb-4 mb-lg-4 col-lg-6">--}}

{{--                    <div class="listing-item">--}}
{{--                        <div class="listing-image">--}}
{{--                            <img src="images/img_4.jpg" alt="Image" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="listing-item-content">--}}
{{--                            <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <a class="px-3 mb-3 category" href="#">Electronics</a>--}}
{{--                            <h2 class="mb-1"><a href="#">iPhone X gray</a></h2>--}}
{{--                            <span class="address">West Orange, New York</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-md-6 mb-4 mb-lg-4 col-lg-6">--}}

{{--                    <div class="listing-item">--}}
{{--                        <div class="listing-image">--}}
{{--                            <img src="images/img_2.jpg" alt="Image" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="listing-item-content">--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <a class="px-3 mb-3 category" href="#">Real Estate</a>--}}
{{--                            <h2 class="mb-1"><a href="#">House with Swimming Pool</a></h2>--}}
{{--                            <span class="address">West Orange, New York</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="site-section bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row mb-5">--}}
{{--                <div class="col-md-7 text-left border-primary">--}}
{{--                    <h2 class="font-weight-light text-primary">Trending Today</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mt-5">--}}
{{--                <div class="col-lg-6">--}}

{{--                    <div class="d-block d-md-flex listing">--}}
{{--                        <a href="listings-single.html" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Real Estate</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="listings-single.html">House with Swimming Pool</a></h3>--}}
{{--                            <address>Don St, Brooklyn, New York</address>--}}
{{--                            <p class="mb-0">--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-secondary"></span>--}}
{{--                                <span class="review">(3 Reviews)</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="d-block d-md-flex listing">--}}
{{--                        <a href="listings-single.html" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Furniture</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="listings-single.html">Wooden Chair &amp; Table</a></h3>--}}
{{--                            <address>Don St, Brooklyn, New York</address>--}}
{{--                            <p class="mb-0">--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-secondary"></span>--}}
{{--                                <span class="review">(3 Reviews)</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="d-block d-md-flex listing">--}}
{{--                        <a href="listings-single.html" class="img d-block" style="background-image: url('images/img_4.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Electronics</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="listings-single.html">iPhone X gray</a></h3>--}}
{{--                            <address>Don St, Brooklyn, New York</address>--}}
{{--                            <p class="mb-0">--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-secondary"></span>--}}
{{--                                <span class="review">(3 Reviews)</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}



{{--                </div>--}}
{{--                <div class="col-lg-6">--}}

{{--                    <div class="d-block d-md-flex listing">--}}
{{--                        <a href="listings-single.html" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Cars &amp; Vehicles</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="listings-single.html">Red Luxury Car</a></h3>--}}
{{--                            <address>Don St, Brooklyn, New York</address>--}}
{{--                            <p class="mb-0">--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-secondary"></span>--}}
{{--                                <span class="review">(3 Reviews)</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="d-block d-md-flex listing">--}}
{{--                        <a href="listings-single.html" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Real Estate</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="listings-single.html">House with Swimming Pool</a></h3>--}}
{{--                            <address>Don St, Brooklyn, New York</address>--}}
{{--                            <p class="mb-0">--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-secondary"></span>--}}
{{--                                <span class="review">(3 Reviews)</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="d-block d-md-flex listing">--}}
{{--                        <a href="listings-single.html" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Furniture</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="listings-single.html">Wooden Chair &amp; Table</a></h3>--}}
{{--                            <address>Don St, Brooklyn, New York</address>--}}
{{--                            <p class="mb-0">--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-warning"></span>--}}
{{--                                <span class="icon-star text-secondary"></span>--}}
{{--                                <span class="review">(3 Reviews)</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="site-section bg-white">--}}
{{--        <div class="container">--}}

{{--            <div class="row justify-content-center mb-5">--}}
{{--                <div class="col-md-7 text-center border-primary">--}}
{{--                    <h2 class="font-weight-light text-primary">Testimonials</h2>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="slide-one-item home-slider owl-carousel">--}}
{{--                <div>--}}
{{--                    <div class="testimonial">--}}
{{--                        <figure class="mb-4">--}}
{{--                            <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-3">--}}
{{--                            <p>John Smith</p>--}}
{{--                        </figure>--}}
{{--                        <blockquote>--}}
{{--                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>--}}
{{--                        </blockquote>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="testimonial">--}}
{{--                        <figure class="mb-4">--}}
{{--                            <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-3">--}}
{{--                            <p>Christine Aguilar</p>--}}
{{--                        </figure>--}}
{{--                        <blockquote>--}}
{{--                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>--}}
{{--                        </blockquote>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <div class="testimonial">--}}
{{--                        <figure class="mb-4">--}}
{{--                            <img src="images/person_4.jpg" alt="Image" class="img-fluid mb-3">--}}
{{--                            <p>Robert Spears</p>--}}
{{--                        </figure>--}}
{{--                        <blockquote>--}}
{{--                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>--}}
{{--                        </blockquote>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <div class="testimonial">--}}
{{--                        <figure class="mb-4">--}}
{{--                            <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-3">--}}
{{--                            <p>Bruce Rogers</p>--}}
{{--                        </figure>--}}
{{--                        <blockquote>--}}
{{--                            <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>--}}
{{--                        </blockquote>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



{{--    <div class="site-section bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center mb-5">--}}
{{--                <div class="col-md-7 text-center border-primary">--}}
{{--                    <h2 class="font-weight-light text-primary">Our Blog</h2>--}}
{{--                    <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mb-3 align-items-stretch">--}}
{{--                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">--}}
{{--                    <div class="h-entry">--}}
{{--                        <img src="images/hero_1.jpg" alt="Image" class="img-fluid rounded">--}}
{{--                        <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>--}}
{{--                        <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">--}}
{{--                    <div class="h-entry">--}}
{{--                        <img src="images/hero_1.jpg" alt="Image" class="img-fluid rounded">--}}
{{--                        <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>--}}
{{--                        <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">--}}
{{--                    <div class="h-entry">--}}
{{--                        <img src="images/hero_1.jpg" alt="Image" class="img-fluid rounded">--}}
{{--                        <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>--}}
{{--                        <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>--}}
{{--                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 text-center mt-4">--}}
{{--                    <a href="#" class="btn btn-primary rounded py-2 px-4 text-white">View All Posts</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="newsletter bg-primary py-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-md-6">--}}
{{--                    <h2>Newsletter</h2>--}}
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}

{{--                    <form class="d-flex">--}}
{{--                        <input type="text" class="form-control" placeholder="Email">--}}
{{--                        <input type="submit" value="Subscribe" class="btn btn-white">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <footer class="site-footer">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-9">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <h2 class="footer-heading mb-4">About</h2>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident rerum unde possimus molestias dolorem fuga, illo quis fugiat!</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-3">--}}
{{--                            <h2 class="footer-heading mb-4">Navigations</h2>--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li><a href="#">About Us</a></li>--}}
{{--                                <li><a href="#">Services</a></li>--}}
{{--                                <li><a href="#">Testimonials</a></li>--}}
{{--                                <li><a href="#">Contact Us</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <h2 class="footer-heading mb-4">Follow Us</h2>--}}
{{--                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>--}}
{{--                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>--}}
{{--                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>--}}
{{--                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <form action="#" method="post">--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Search products..." aria-label="Enter Email" aria-describedby="button-addon2">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn btn-primary text-white" type="button" id="button-addon2">Search</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row pt-5 mt-5 text-center">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="border-top pt-5">--}}
{{--                        <p>--}}
{{--                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>--}}
{{--                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--</div>--}}

{{--<script src="js/jquery-3.3.1.min.js"></script>--}}
{{--<script src="js/jquery-migrate-3.0.1.min.js"></script>--}}
{{--<script src="js/jquery-ui.js"></script>--}}
{{--<script src="js/popper.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/owl.carousel.min.js"></script>--}}
{{--<script src="js/jquery.stellar.min.js"></script>--}}
{{--<script src="js/jquery.countdown.min.js"></script>--}}
{{--<script src="js/jquery.magnific-popup.min.js"></script>--}}
{{--<script src="js/bootstrap-datepicker.min.js"></script>--}}
{{--<script src="js/aos.js"></script>--}}
{{--<script src="js/rangeslider.min.js"></script>--}}

{{--<script src="js/main.js"></script>--}}
{{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}

{{--<script>--}}

{{--    function searcher()--}}
{{--    {--}}
{{--        var text=document.getElementById("search").value;--}}
{{--         console.log(text);--}}

{{--    axios.get("search?keyword="+text)--}}
{{--        .then--}}
{{--        (--}}
{{--            function(message){--}}
{{--                console.log(message.data);--}}
{{--            }--}}

{{--        );--}}
{{--    }--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}
