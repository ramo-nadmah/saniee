
<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<div class="site-wrap">

    @include('layouts.header')


    <div class="site-blocks-cover  overlay" style="background-image: url(/static_images/rigist.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Shop Registration</h1>
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


                    <form action="/register_shop"  method="post" class="p-5 bg-white" enctype="multipart/form-data">
                        @csrf

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input  type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="name">Name of the shop</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="description">whould you like to add a description for your shop?</label>
                                <input type="text" id="description" name="description" class="form-control">
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="category">select your field</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach(App\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="address">select your address</label>
                                <select name="address" id="category" class="form-control">

                                        <option value="amman">amman</option>
                                    <option value="Ajloun">Ajloun</option>
                                    <option value="Jerash">Jerash</option>
                                    <option value="Mafraq">Mafraq</option>
                                    <option value="Balqa">Balqa</option>
                                    <option value="Irbid">Irbid</option>
                                    <option value="Zarqa">Zarqa</option>
                                    <option value="Madaba">Madaba</option>
                                    <option value="Karak">Karak</option>
                                    <option value="Tafilah">Tafilah</option>
                                    <option value="Ma'an">Ma'an</option>
                                    <option value="Aqaba">Aqaba</option>

                                </select>
                            </div>
                        </div>



                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="phone">Phone </label>
                                <input type="text" id="phone" name="phone" class="form-control  @error('password') is-invalid @enderror">
                            </div>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>




{{--                        <div class="row form-group">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <label class="text-black" for="image">Add File</label>--}}
{{--                                <input type="file" id="image" name="image" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="image">Shop Pic/Logo</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>



                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Password</label>
                                <input type="password" id="subject" name="password" class="form-control @error('password') is-invalid @enderror">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <div class="col-12">
                                <p>Have an account? <a href="/shop_login">Log In</a></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Join" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>

                        <strong class="text-danger">{!! session()->get('error') !!}</strong>
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
