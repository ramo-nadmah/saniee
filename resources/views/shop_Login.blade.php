<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<div class="site-wrap">

    @include('layouts.header')


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Shop Log In</h1>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">



                    <form action="/login_shop" method="post" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>



                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Password</label>
                                <input type="password" name="password" id="subject" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-12">
                                <p>No account yet? <a href="/register_shop">Register</a></p>
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Sign In" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <a class="btn btn-link" href="{{route('shop.password.request')}}">Forgot your Password?</a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



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
