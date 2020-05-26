
<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
@include('layouts.header')
<div class="site-wrap">

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(static_images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>{{$post->name}}</h1>
                            <p class="mb-0">{{$post->shop->address}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-sm-6">
            <h3 style="margin-top: 30px; margin-left : 365px;">{{$post->name}}</h3>
        </div>
        <div class="col-sm-6">
        </div>
    </div>


    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3">
            <div class="card" style=" margin-left: 40px;">
                <div class="card-header">
                    <h3>price :</h3>
                    <h3 id="price">  {{$post->price}} </h3>
                    <a href="#">tell me when the price go down</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4><a href="/shop={{$post->shop->id}}"> {{$post->shop->name}}</a></h4>

                        </div>
                        <img class="col-sm-4" src="/images/{{$post->shop->logo}}">
                    </div>
                    <div class="row" style="margin-top: 50px;">
                        <button type="button" class="btn btn-success btn-lg btn-block">{{$post->phone}}</button>
                    </div>
                    <div class="row" style="margin-top: 20px;">

{{--                        @if(Auth::guard('shop')->user()->id != $post->shop->id)--}}
                            <div class="col-sm-6">
                                <button
                                    type="button"
                                    id="follow"

                                    @if(Auth::guard('web')->check())
                                       onclick="following('1','{{Auth::guard('web')->user()->id}}','{{$post->shop->id}}')"

                                        @if(App\Follower::where('user_id',Auth::guard('web')->user()->id)->where('follow_id',$post->shop->id)->count())
                                             class="btn btn-outline-primary font-weight-light btn-lg"
                                              >
                                             Following
                                        @else
                                            class="btn btn-primary btn-lg"
                                                >
                                            Follow
                                         @endif
                                    @endif
                                    @if(Auth::guard('shop')->check())
                                        onclick="following('2','{{Auth::guard('shop')->user()->id}}','{{$post->shop->id}}')"


                                        @if(App\Follower::where('shop_id',Auth::guard('shop')->user()->id)->where('follow_id',$post->shop->id)->count())
                                            class="btn btn-outline-primary font-weight-light btn-lg"
                                            >
                                            Following
                                        @else
                                            class="btn btn-primary btn-lg"
                                            >
                                            Follow
                                        @endif
                                    @endif
                                </button>
                            </div>
{{--                        @endif--}}
                        <div class="col-sm-6">
                            <button
                                type="button"
                                id="favorite"
                                @if(Auth::guard('web')->check())
                                onclick="favorite('1','{{Auth::guard('web')->user()->id}}','{{$post->id}}')"

                                    @if(App\Favorite::where('user_id',Auth::guard('web')->user()->id)->where('post_id',$post->id)->count())
                                        class="btn btn-outline-primary font-weight-light btn-lg"
                                         >
                                        <i class="far fa-heart"></i>
                                    @else
                                    class="btn btn-primary btn-lg"
                                    >
                                    <i class="far fa-heart"></i>
                                    @endif
                                @endif
                                @if(Auth::guard('shop')->check())
                                onclick="favorite('2','{{Auth::guard('shop')->user()->id}}','{{$post->id}}')"
                                    @if(App\Favorite::where('shop_id',Auth::guard('shop')->user()->id)->where('post_id',$post->id)->count())
                                        class="btn btn-outline-primary font-weight-light btn-lg"
                                        >
                                        <i class="far fa-heart"></i>
                                    @else
                                        class="btn btn-primary btn-lg"
                                        >
                                        <i class="far fa-heart"></i>


                                    @endif

                                @endif

                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-left: 40PX; margin-top: 15PX;">
                <div class="card-header">
                    <div class="row ">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <div class="row">
                                <h5>address : </h5><h5>{{$post->shop->address}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>

            </div>
        </div>
        <div class="col-sm-8">
            <div class="card border-dark mb-3" style="width: 50rem; margin-left: 20px;">

                <div id="slide_show" class="carousel slide " data-ride="carousel" >
                    <ol class="carousel-indicators">

                        <?php $i=0;
                        foreach($images as $image)
                         {

                                $actives='';
                                if($i==0)
                                {$actives='active';}
                         ?>



                            <li data-target="#slide_show" data-slide-to="{{$i}}" class="{{$actives}}"></li>

                         <?php
                            $i++;
                         }
                        ?>

                    </ol>


                    <!--  start inner carousel  -->


                    <div class="carousel-inner">

                        <?php $i=0;
                        foreach($images as $image)
                        {
                                $actives='';
                                if($i==0)
                               { $actives='active';}
                        ?>


                            <div class="carousel-item {{$actives}}">
                                <!--  first image -->
                                <img class="d-block w-100" src="/images/{{$image->image}}" height="550" alt="{{$i}}th slide">
                            </div>
                        <?php
                            $i++;}
                        ?>



                    </div>


                    <!--  previos button -->
                    <a class="carousel-control-prev" href="#slide_show" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <!--  next button -->
                    <a class="carousel-control-next" href="#slide_show" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <div class="card-body " style="margin-top: 30px;">
                    <h3 id="name" class="text-center">{{$post->name}}</h3>
                    <div class="continar " style="background-color: #e3f2fd; margin-top: 30px;">
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-sm-4">Address:  <a href="#" style="margin-left: 4px;">{{$post->shop->address}}</a></div>
                            <div class="col-sm-4"> Phone number:  <a id="phone"  href="#" style="margin-left: 4px;">{{$post->phone}}</a></div>
                            <div class="col-sm-4">Slogan:  <a        id="slogan" href="#" style="margin-left: 4px;">{{$post->slogan}}</a></div>
                            <div class="col-sm-4">Post ID:  <a       id="id"  href="#" style="margin-left: 4px;">{{$post->id}}</a></div>
                            <div class="col-sm-4">category:  <a  href="/ads={{$post->category->id}}" style="margin-left: 4px;">{{$post->category->name}}</a></div>


                        </div>


                    </div>
                    <div class="row text-center" style="margin-top: 30px;">
                        <p id="body" style="margin-top: 20px;">
                            {{$post->body}}
                        </p>
                    </div>


                </div>


            </div>
        </div>
        @if(Auth::guard('shop')->check())
            @if($post->shop->id == Auth::guard('shop')->user()->id)
                <div class="col-sm-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" onclick="change()" class="btn btn-success" style="margin-right: 120px;">
                                Edit
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button id="button_save" type="button" onclick="save({{$post->id}})" class="btn btn-success" style="display: none;">Save</button>
                        </div>
                    </div>
                </div>
                @endif
        @endif
    </div>




    {{--    <div class="site-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-8">--}}

{{--                    <div class="mb-4">--}}
{{--                        <div class="slide-one-item home-slider owl-carousel">--}}
{{--                            <div><img src="images/img_1.jpg" alt="Image" class="img-fluid"></div>--}}
{{--                            <div><img src="images/img_2.jpg" alt="Image" class="img-fluid"></div>--}}
{{--                            <div><img src="images/img_3.jpg" alt="Image" class="img-fluid"></div>--}}
{{--                            <div><img src="images/img_4.jpg" alt="Image" class="img-fluid"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <h4 class="h5 mb-4 text-black">Description</h4>--}}
{{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?</p>--}}
{{--                    <p>Nisi, error. Molestias, quidem eaque sequi aut perspiciatis assumenda obcaecati ut quod eius reprehenderit. Iure rem numquam totam odio dignissimos aspernatur soluta. Corporis suscipit modi iste consequatur, repellat nihil omnis molestias optio. Dolorem ullam eius officia, eum ratione dolorum assumenda.</p>--}}
{{--                    <p>Soluta corporis blanditiis cupiditate debitis eveniet, temporibus ut cumque sint repudiandae quidem tenetur commodi id, quam. Sapiente corrupti magnam quis nulla, asperiores neque tenetur labore aperiam provident nostrum sequi delectus voluptatem fuga officiis repellat, ratione aspernatur eius repellendus modi reprehenderit.</p>--}}
{{--                    <p>Sapiente molestias voluptate cupiditate blanditiis quasi qui aperiam accusamus aspernatur ipsam velit nihil quaerat voluptatum soluta laboriosam ipsum veritatis at reiciendis quod voluptates, saepe harum dignissimos placeat dolorum aliquid! Quod quasi praesentium optio ratione non et sit quos excepturi cum?</p>--}}

{{--                </div>--}}
{{--                <div class="col-lg-3 ml-auto">--}}

{{--                    <div class="mb-5">--}}
{{--                        <h3 class="h5 text-black mb-3">Filters</h3>--}}
{{--                        <form action="#" method="post">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" placeholder="What are you looking for?" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="select-wrap">--}}
{{--                                    <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>--}}
{{--                                    <select class="form-control" name="" id="">--}}
{{--                                        <option value="">All Categories</option>--}}
{{--                                        <option value="" selected="">Real Estate</option>--}}
{{--                                        <option value="">Books &amp;  Magazines</option>--}}
{{--                                        <option value="">Furniture</option>--}}
{{--                                        <option value="">Electronics</option>--}}
{{--                                        <option value="">Cars &amp; Vehicles</option>--}}
{{--                                        <option value="">Others</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <!-- select-wrap, .wrap-icon -->--}}
{{--                                <div class="wrap-icon">--}}
{{--                                    <span class="icon icon-room"></span>--}}
{{--                                    <input type="text" placeholder="Location" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                    <div class="mb-5">--}}
{{--                        <form action="#" method="post">--}}
{{--                            <div class="form-group">--}}
{{--                                <p>Radius around selected destination</p>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="range" min="0" max="100" value="20" data-rangeslider>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                    <div class="mb-5">--}}
{{--                        <form action="#" method="post">--}}
{{--                            <div class="form-group">--}}
{{--                                <p>Category 'Real Estate' is selected</p>--}}
{{--                                <p>More filters</p>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li>--}}
{{--                                        <label for="option1">--}}
{{--                                            <input type="checkbox" id="option1">--}}
{{--                                            Residential--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <label for="option2">--}}
{{--                                            <input type="checkbox" id="option2">--}}
{{--                                            Commercial--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <label for="option3">--}}
{{--                                            <input type="checkbox" id="option3">--}}
{{--                                            Industrial--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <label for="option4">--}}
{{--                                            <input type="checkbox" id="option4">--}}
{{--                                            Land--}}
{{--                                        </label>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                    <div class="mb-5">--}}
{{--                        <h3 class="h6 mb-3">More Info</h3>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptatem placeat facilis, reprehenderit eius officiis.</p>--}}
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
{{--                        <a href="#" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Real Estate</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="#">House with Swimming Pool</a></h3>--}}
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
{{--                        <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Furniture</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="#">Wooden Chair &amp; Table</a></h3>--}}
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
{{--                        <a href="#" class="img d-block" style="background-image: url('images/img_4.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Electronics</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="#">iPhone X gray</a></h3>--}}
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
{{--                        <a href="#" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Cars &amp; Vehicles</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="#">Red Luxury Car</a></h3>--}}
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
{{--                        <a href="#" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Real Estate</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="#">House with Swimming Pool</a></h3>--}}
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
{{--                        <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>--}}
{{--                        <div class="lh-content">--}}
{{--                            <span class="category">Furniture</span>--}}
{{--                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                            <h3><a href="#">Wooden Chair &amp; Table</a></h3>--}}
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


    <div class="newsletter bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-md-6">

                    <form class="d-flex">
                        <input type="text" class="form-control" placeholder="Email">
                        <input type="submit" value="Subscribe" class="btn btn-white">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="footer-heading mb-4">About</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident rerum unde possimus molestias dolorem fuga, illo quis fugiat!</p>
                        </div>

                        <div class="col-md-3">
                            <h2 class="footer-heading mb-4">Navigations</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h2 class="footer-heading mb-4">Follow Us</h2>
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <form action="#" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Search products..." aria-label="Enter Email" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-white" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
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

<script>



    function following(flag,follower_id,followed_id)
    {

        // console.log(flag,follower_id,followed_id);
        //check if it is following
        axios.get("followed_or_not?flag="+flag+"&follower_id="+follower_id+"&followed_id="+followed_id)
            .then
            (
                function(msg){
                    // console.log(msg['data']);
                    //if it is following then it needs to unfollow here
                    if (msg['data'])
                    {
                       // console.log(flag,follower_id,followed_id);
                        console.log(msg['data']);
                        axios.get("unfollow?flag="+flag+"&follower_id="+follower_id+"&followed_id="+followed_id)
                            .then
                            (
                                function()
                                {
                                    document.getElementById("follow").innerHTML = "Follow";
                                    document.getElementById("follow").className = "btn btn-primary btn-lg";

                                }
                            );


                    }
                    else//if its not following it needs to follow here
                    {
                        console.log(msg['data']);
                        axios.get("follow?flag="+flag+"&follower_id="+follower_id+"&followed_id="+followed_id)
                            .then
                            (

                                function(){
                                    document.getElementById("follow").innerHTML = "Unfollow";
                                    document.getElementById("follow").className =
                                        "btn btn-outline-primary font-weight-light btn-lg";

                                }

                            );


                    }

                }

            );


    }

    function favorite(flag,liker_id,liked_id) {


        axios.get("favorite_or_not?flag=" + flag + "&liker_id=" + liker_id + "&post_id=" + liked_id)
            .then
            (
                function (msg)
                {
                     console.log(msg);
                    //if it is following then it needs to unfollow here
                    if (msg['data'])
                    {

                        axios.get("unfavorite?flag=" + flag + "&liker_id=" + liker_id + "&liked_id=" + liked_id)
                            .then
                            (
                                function ()
                                {

                                    document.getElementById("favorite").innerHTML =
                                        "<i class='far fa-heart'></i>";
                                    document.getElementById("favorite").className =
                                        "btn btn-primary btn-lg btn-block";

                                }
                            );


                    } else//if its not following it needs to follow here
                    {

                        axios.get("favorite?flag=" + flag + "&liker_id=" + liker_id + "&liked_id=" + liked_id)
                            .then
                            (
                                function ()
                                {
                                    document.getElementById("favorite").innerHTML =
                                        "<i class='fas fa-heart'></i>";
                                    document.getElementById("favorite").className =
                                        "btn btn-outline-primary font-weight-light btn-lg btn-block";

                                }
                            );

                    }

                }
            );


    }

</script>
<script>
    function change() {
        var price = document.getElementById("price");
        var name = document.getElementById("name");
        var phone = document.getElementById("phone");
        var slogan = document.getElementById("slogan");
        var body = document.getElementById("body");
        // var url4 = document.getElementById("url4");
        // var url5 = document.getElementById("url5");
        // var url6 = document.getElementById("url6");
        // var parig = document.getElementById("parigraph");

        price.contentEditable = "true";
        price.className = "border border-dark";
        price.style.backgroundColor = "#e3f2fd";

        name.contentEditable = "true";
        name.className = "border border-dark";
        name.style.backgroundColor = "#e3f2fd";

        phone.contentEditable = "true";
        phone.className = "border border-dark";
        phone.style.backgroundColor = "white";

        slogan.contentEditable = "true";
        slogan.className = "border border-dark";
        slogan.style.backgroundColor = "white";

        body.contentEditable = "true";
        body.className = "border border-dark";
        body.style.backgroundColor = "white";

        // url4.contentEditable = "true";
        // url4.className = "border border-dark";
        // url4.style.backgroundColor = "white";
        //
        // url5.contentEditable = "true";
        // url5.className = "border border-dark";
        // url5.style.backgroundColor = "white";
        //
        // url6.contentEditable = "true";
        // url6.className = "border border-dark";
        // url6.style.backgroundColor = "white";
        //
        // parig.contentEditable = "true";
        // parig.className = "border border-dark";
        // parig.style.backgroundColor = "white";

        document.getElementById("button_save").style.display = "block";
    }

    function save(post_id) {
        var price = document.getElementById("price");
        var name = document.getElementById("name");
        var phone = document.getElementById("phone");
        var slogan = document.getElementById("slogan");
        var body = document.getElementById("body");
        // var url4 = document.getElementById("url4");
        // var url5 = document.getElementById("url5");
        // var url6 = document.getElementById("url6");
        // var parig = document.getElementById("parigraph");




        console.log('price='+price.innerHTML+"name="+name.innerHTML+'phone= '+phone.innerText+" slogane= "+slogan.innerText+' body= '+body.innerText);


        axios.get("edit?post_id="+post_id+"&price="+price.innerText+"&name="+name.innerHTML+"&phone="+phone.innerHTML+"&slogan="+slogan.innerHTML+"&body="+body.innerHTML)
            .then
            (
                function()
                {
                    price.contentEditable = "false";
                    price.className = "";
                    price.style.backgroundColor = "";

                    name.contentEditable = "false";
                    name.className = "";
                    name.style.backgroundColor = "";

                    phone.contentEditable = "false";
                    phone.className = "";
                    phone.style.backgroundColor = "";

                    slogan.contentEditable = "false";
                    slogan.className = "";
                    slogan.style.backgroundColor = "";

                    body.contentEditable = "false";
                    body.className = "";
                    body.style.backgroundColor = "";

                    // url4.contentEditable = "false";
                    // url4.className = "";
                    // url4.style.backgroundColor = "";
                    //
                    // url5.contentEditable = "false";
                    // url5.className = "";
                    // url5.style.backgroundColor = "";
                    //
                    // url6.contentEditable = "false";
                    // url6.className = "";
                    // url6.style.backgroundColor = "";
                    //
                    // parig.contentEditable = "false";
                    // parig.className = "";
                    // parig.style.backgroundColor = "";

                    document.getElementById("button_save").style.display = "none";
                }
            );

    }
</script>

</body>
</html>
