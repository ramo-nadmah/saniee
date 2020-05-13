<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar container py-0 bg-white" role="banner">

    <!-- <div class="container"> -->
    <div class="row align-items-center">

        <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="/" class="text-black mb-0">Classy<span class="text-primary">Ads</span>  </a></h1>
        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="single">Ads</a></li>
                    <li class="has-children">
                        <a href="about">About</a>
                        <ul class="dropdown">
                            <li><a href="#">The Company</a></li>
                            <li><a href="#">The Leadership</a></li>
                            <li><a href="#">Philosophy</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </li>
                    <li><a href="blog">Blog</a></li>
                    <li><a href="contact">Contact</a></li>



                    @if(Auth::guard('web')->check())
                        <li class="ml-xl-3 login"><span class="border-left pl-xl-4"></span></li>
                        <li class="has-children">
                                <a href="#">
                                     <div class="row align-items-center">
                                         <div class="col-sm-6">
                                             <h5 class="text-left">Worker({{Auth::guard('web')->user()->name}})</h5>
                                         </div>

                                        <div class="col-sm-6">
                                            <img height="30" width="30" src="/images/{{App\User::where('id',Auth::guard('web')->user()->id)->pluck('logo')->first()}}" class="rounded-circle float-right">
                                        </div>
                                    </div>
                                </a>
                            <ul class="dropdown" >

                                <div class="dropdown-divider"></div>


                                <li>
                                    <a class="dropdown-item" href="/myUser={{Auth::guard('web')->user()->id}}_1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6 class="font-weight-normal text-left">Favorite ads</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>

                                <li>
                                    <a class="dropdown-item" href="/myUser={{Auth::guard('web')->user()->id}}_2">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6 class="font-weight-normal text-left">Following</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                <a class="dropdown-item" href="/logout_user">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <h6   class="font-weight-normal text-left">Log out</h6>

                                        </div>
                                    </div>
                                </a>
                                </li>

                            </ul>
                        </li>
                    @elseif(Auth::guard('shop')->check())
                        <li class="ml-xl-3 login"><span class="border-left pl-xl-4"></span></li>
                        <li class="has-children">
                            <a href="#">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h5 class="text-left">shop({{Auth::guard('shop')->user()->name}})</h5>
                                    </div>

                                    <div class="col-sm-6">
                                        <img height="30" width="30" src="/images/{{App\Shop::where('id',Auth::guard('shop')->user()->id)->pluck('logo')->first()}}" class="rounded-circle float-right">
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown" >

                                <div class="dropdown-divider"></div>


                                <li>
                                    <a class="dropdown-item" href="/myShop={{Auth::guard('shop')->user()->id}}_1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-list"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6 class="font-weight-normal text-left">My ads</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a class="dropdown-item" href="/myShop={{Auth::guard('shop')->user()->id}}_2">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6 class="font-weight-normal text-left">Favorite ads</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a class="dropdown-item" href="/myShop={{Auth::guard('shop')->user()->id}}_3">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6 class="font-weight-normal text-left">Following</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a class="dropdown-item" href="/logout_shop">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6   class="font-weight-normal text-left">Log out</h6>

                                            </div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        <li><a href="/addAd" class="cta"><span class="bg-primary text-white rounded">+ Post an Ad</span></a></li>

                        </li>


                    @elseif(Auth::guard('admin')->check())
                        <li class="ml-xl-3 login"><span class="border-left pl-xl-4"></span></li>
                        <li class="has-children">
                            <a href="#">
                                <div class="row align-items-center">
                                    <div class="col-sm-12">
                                        <h5 class="text-left">Worker({{Auth::guard('admin')->user()->name}})</h5>
                                    </div>


                                </div>
                            </a>
                            <ul class="dropdown" >

                                <div class="dropdown-divider"></div>



                                <div class="dropdown-divider"></div>
                                <li>
                                    <a class="dropdown-item" href="/logout_admin">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <h6   class="font-weight-normal text-left">Log out</h6>

                                            </div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @else
                        <li class="ml-xl-3 login"><span class="border-left pl-xl-4"></span></li>

                        <li class="has-children">
                            <a>Login</a>
                            <ul class="dropdown">
                                <li><a href="/login_shop">login as shop</a></li>
                                <li><a href="/login">login as buyer</a></li>

                            </ul>
                        </li>

                        <li class="ml-xl-3 login"><span class="border-left pl-xl-4"></span></li>

                        <li class="has-children">
                            <a>Register</a>
                            <ul class="dropdown">
                                <li><a href="/register_shop">Register as shop</a></li>
                                <li><a href="/register">Register as Buyer</a></li>

                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>

{{--        {{@$posts}}--}}
        <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
        </div>

    </div>
    <!-- </div> -->

</header>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
