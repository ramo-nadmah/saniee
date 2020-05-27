
<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

    <div class="site-wrap">
        @include('layouts.header')

    <div class="site-blocks-cover  overlay" style="background-image: url(/static_images/newspaper.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Add Ads</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container border border-primary" style="margin-bottom: 50px;">
            <div class="row" style="background-color: #30e3ca;">
                <h4 class="p-3 text-dark">Add an announcement for free</h4>
            </div>


            <form action="/addAd" method="post" class=" bg-white mb-5" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="container col-sm-3" style="background-color: #cccdce">
                        <h4 class="text-dark font-weight-normal mx-auto d-block font-italic text-center" style="clear: both;display: inline-block;white-space: nowrap; margin-right: 40px;">1.Chose category</h4>
                    </div>
                    <div class="col-sm-9"></div>
                </div>
                <div class="row border-bottom border-secondary p-5">
                    <div class="col-sm-3"></div>

                    <div class="col-sm-6 btn-group form-group">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach(App\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3"></div>

                </div>



                <div class="row">
                    <div class="container col-sm-3" style="background-color: #cccdce">
                        <h4 class="text-dark font-weight-normal mx-auto d-block font-italic text-center" style="clear: both;display: inline-block;white-space: nowrap; margin-right: 40px;">2.Ad details</h4>
                    </div>
                    <div class="col-sm-9"></div>
                </div>


                <div class="row form-group p-3">

                    <div class="col-md-12">
                        <label class="text-black" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                </div>

                <div class="row form-group p-3">
                    <div class="col-md-12">
                        <label class="text-black" for="body">Discription</label>
                        <textarea type="text" id="body" name="body" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row form-group  p-3">
                    <div class="col-md-12">
                        <label class="text-black" for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control"/>
                    </div>
                </div>







                <div class="row border-top border-secondary">
                    <div class="container col-sm-3 " style="background-color: #cccdce">
                        <h4 class="text-dark font-weight-normal mx-auto d-block font-italic text-center" style="clear: both;display: inline-block;white-space: nowrap; margin-right: 40px;">3.Add images</h4>
                    </div>
                    <div class="col-sm-9"></div>
                </div>
                <div class="row p-3 ">
                    <div class="row py-5">
                        <div class="col-sm-6" style="margin-left: 60px;" >
                            <div class="container border border-secondary m-2">
                                <div class="row">
                                    <p class="text-nowrap" style="width: 120rem;clear: both;display: inline-block;overflow: hidden;white-space: nowrap;">*adding photo's to your AD means more view's</p>
                                </div>
                                <div class="row">
                                    <p class="text-nowrap " style="width: 120rem;clear: both;display: inline-block;overflow: hidden;white-space: nowrap;">* Use real images for the products you want to sale</p>
                                </div>
                                <div class="row">
                                    <img   height="105" width="120" src="static_images/fake_hammer.png" class="rounded mx-auto d-block">
                                    <img  height="105" width="120" src="static_images/real_hammer.jpg" class="rounded mx-auto d-block">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-2" style="margin-left: 75px;">
                            <a href="#">
                                <div class="container border border-secondary mb-1">
                                    <div class="row pt-5">
                                        <img height="50" width="50" src="static_images/camera.png" class="rounded mx-auto d-block">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label class="text-black" for="image">Add File</label>
                                            <input type="file" id="image" name="image[]" multiple class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>

                </div>







                <div class="row form-group">
                    <div class="col-md-12">

                        <input value="{{Auth::guard('shop')->user()->id}}" type="hidden" id="shop_id" name="shop_id" class="form-control">
                    </div>
                </div>





                <div class="row pb-4 border-top border-secondary">
                    <div class="container col-sm-3 " style="background-color: #cccdce">
                        <h4 class="text-dark font-weight-normal mx-auto d-block font-italic text-center" style="clear: both;display: inline-block;white-space: nowrap; margin-right: 40px;">4.Add slogan and number</h4>
                    </div>
                    <div class="col-sm-9"></div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="number">number</label>
                        <input type="text" id="number" name="number" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="slogan">Slogan</label>
                        <input type="text" id="slogan" name="slogan" class="form-control">
                    </div>
                </div>


                <div class="row py-4">
                    <button type="submit" class="btn  btn-lg mx-auto d-block text-light"  style="margin-left: 70px; width: 300px;background-color: #285943;">save and post</button>
                </div>
                <strong class="text-danger">{!! session()->get('error') !!}</strong>
            </form>
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
