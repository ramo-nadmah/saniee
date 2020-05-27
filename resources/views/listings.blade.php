<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<head>
    <style type="text/css">
        p {
            display: block;
            width: 350px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        h3 {
            display: block;
            width: 450px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .image_s{
            width: 200px;
            height: 210px;
        }
        .card_css{
            max-height:250px;
            overflow: hidden;
        }
        .title-text{
            color: #011627;
        }
        .dropdown-toggle{
            background-color: #2b90d9;
            border-color: #2b90d9;
        }


    </style>

</head>
<body>

<div class="site-wrap">
    @include('layouts.header')



    <div class="site-blocks-cover  overlay" style="background-image: url(/static_images/shops_street2.jpg); " data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12" data-aos="fade-up" data-aos-delay="800">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-12 text-center">
                            <h1>{{$name}} Shops</h1>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

{{--    <div class="site-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                        @foreach($posts as $post)--}}
{{--                            <div class="d-block d-md-flex listing vertical">--}}
{{--                                    <a href="#" class="img d-block" style="background-image: url('images/{{App\Image::where('post_id',$post->id)->pluck('image')->first()}}')"></a>--}}
{{--                                    <div class="lh-content">--}}
{{--                                        <span class="category">#{{$post->category->name}}</span>--}}
{{--                                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>--}}
{{--                                        <h3><a href="#">{{$post->name}}</a></h3>--}}
{{--                                        <address>{{$post->slogan}}</address>--}}
{{--                                        <p class="mb-0">--}}
{{--                                            <span class="icon-star text-warning"></span>--}}
{{--                                            <span class="icon-star text-warning"></span>--}}
{{--                                            <span class="icon-star text-warning"></span>--}}
{{--                                            <span class="icon-star text-warning"></span>--}}
{{--                                            <span class="icon-star text-secondary"></span>--}}
{{--                                            <span class="review">(3 Reviews)</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        @endforeach--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="col-12 mt-5 text-center">--}}
{{--                        <div class="custom-pagination">--}}
{{--                            <span>1</span>--}}
{{--                            <a href="#">2</a>--}}
{{--                            <a href="#">3</a>--}}
{{--                            <span class="more-page">...</span>--}}
{{--                            <a href="#">10</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container" id="card1" style="display: none;">
        <div class="row collapse show" style="margin-top: 50px;">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card card_css" >
                    <div class="card-body row" style="display: none;">
                        <p class="id" ></p>
                    </div>
                    <div class="card-body row">
                        <img class="img col-sm-4 image_s" src="user.png" alt="sans" />
                        <div class="col-sm-8">
                            <a class="titlehref" href="">
                                <h3 class="title row title-text">page_1</h3>
                            </a>
                            <div class="row pl-3 pt-4">
                                <div class="col-sm-6 ">

                                    <div class="row">
                                        <h5>Followers :</h5><h5 class="followers_num pl-3" > 5</h5>
                                    </div>


                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <h5>address :</h5><h5 class="address_s pl-3">5</h5>
                                    </div>


                                </div>
                            </div>


                            <div class="row pt-3">
                                <div class="paragraph col-sm-9">
                                    <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,</p>
                                </div>



                                </div>
                            <div class="row pt-3">
                                <div class="col-sm-12">
                                    <a id="url_2" class="url_1" href="#"><h3 class="take-me" >Take me their</h3></a>
                                </div>

                            </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark justify-content-between   nav-color" >

        <div class="col-sm-4">
            <div class="dropdown pt-2">
                <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    choose category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="/ads={{$category->id}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            <ul class="dropdown">

            </ul>
        </div>

    </nav>
    <div class="container " id="content_container">

        <div class="container" id="container1"></div>
        <div class="container">
            <div class="row" style="margin-top: 50px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="pagintaion_bar">


                        </ul>
                    </nav>
                </div>
                <div class="col-sm-2"></div>
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

<script>
    var cards = new Array();
    var cardsp = new Array(); /* ads cards   */
    var cards_s = new Array();
    i=0;
<?php
        foreach ($shops as $shop)
        {
?>
            cards_s[i] = document.getElementById("card1");
            cards_s[i].getElementsByClassName("title")[0].innerHTML ="<?php echo $shop->name ?>";
            //you will work here
            cards_s[i].getElementsByClassName("followers_num")[0].innerHTML ="<?php echo App\Follower::where('follow_id',$shop->id)->count() ?>";
            cards_s[i].getElementsByClassName("address_s")[0].innerHTML ="<?php echo $shop->address ?>"



            cards_s[i].getElementsByClassName("description")[0].innerHTML ="<?php echo $shop->description ?>";
            cards_s[i].getElementsByClassName("id")[0].innerHTML ="<?php echo $shop->id ?>";
            cards_s[i].getElementsByClassName("img")[0].src="images/<?php echo $shop->logo ?>";

            // /* get the image src/
<?php
    if(Auth::guard('shop')->check())
            {
                if(Auth::guard('shop')->user()->id == $shop->id )
                    {
?>
                        cards_s[i].getElementsByClassName("url_1")[0].href = "/myShop=<?php echo $shop->id ?>_0";
                        cards_s[i].getElementsByClassName("titlehref")[0].href ="/myShop=<?php echo $shop->id ?>_0";
<?php
                    }
                else
                    {
?>
                        cards_s[i].getElementsByClassName("titlehref")[0].href ="/shop=<?php echo $shop->id ?>";
                        cards_s[i].getElementsByClassName("url_1")[0].href ="/shop=<?php echo $shop->id ?>";
<?php
                    }
            }
            else
            {
?>
                cards_s[i].getElementsByClassName("titlehref")[0].href ="/shop=<?php echo $shop->id ?>";
                cards_s[i].getElementsByClassName("url_1")[0].href ="/shop=<?php echo $shop->id ?>";
<?php
            }


?>





            // / change the href value/
            // console.log("url1 href ", (cards[i].getElementsByClassName("url_1")[0].href));
            // /get href value after change*/
            console.log(<?php echo $shop?>);


            cardsp[i] = cards_s[i].cloneNode(true);
            cardsp[i] = cardsp[i].innerHTML;
            cards.push(cardsp[i]);
            console.log("this is final", cards[i]);
            //document.getElementById("all_container").appendChild(cards[j]);
             i++;
<?php    }
?>


         page = 1;
         rows = 5;
         w = 5;

    function pagination(cards, page, rows) {
        var card_start = (page - 1) * rows;
        var card_end = card_start + rows;

        var cards_data = cards.slice(card_start, card_end);

        var pages = Math.ceil(cards.length / rows);

        return {
            querySet: cards_data,
            pages: pages,
        };
    }

    function build_cards(data) {
        var container = document.getElementById("container1");
        container.innerHTML = "";
        last_cards = data.querySet.join("");
        for (i = 1; i <= data.pages; i++) {
            //console.log(data.querySet);

            container.innerHTML = last_cards;
            //console.log(data.querySet);
        }
    }

    function build_pagination(data) {
        var container = document.getElementById("pagintaion_bar");
        container.innerHTML = "";

        var maxLeft = parseInt(page - Math.floor(w / 2));
        var maxRight = page + Math.floor(w / 2);

        if (maxLeft < 1) {
            maxLeft = 1;
            maxRight = w;
        }

        if (maxRight > data.pages) {
            maxLeft = data.pages - (w - 1);

            if (maxLeft < 1) {
                maxLeft = 1;
            }
            maxRight = data.pages;
        }

        for (var j = maxLeft; j <= maxRight; j++) {
            console.log(j);
            container.innerHTML += `<button id=${j} onclick="chose_page(this.id);" class=" btn btn-sm btn-info m-1">${j}</button>`;
            /*var para = document.createElement("li");
            para.innerHTML = buttons[j];
            container.appendChild(para);*/
        }

        if (page != 1) {
            container.innerHTML =
                `<button id=${1} onclick="chose_page(this.id);" class="btn btn-sm btn-info m-1">&#171; First</button>` +
                container.innerHTML;
        }

        if (page != data.pages) {
            container.innerHTML += `<button id=${data.pages} onclick="chose_page(this.id);" class="btn btn-sm btn-info m-1">Last &#187;</button>`;
        }

        var l =<?php echo $cat_shop_num ?>;
        console.log('L =',l);
        if(l==0){
            container.style.display = "none";
        }
        /*
        var buttons = new Array();
        for (i = 0; i <= data.pages; i++) {
          buttons[i] = button1.innerHTML;
        }
        var pagintaion_container = document.getElementById("pagintaion_bar");
        for (j = 0; j <= buttons.length; j++) {
          console.log(buttons[j]);
          pagintaion_container.innerHTML =
            pagintaion_container.innerHTML + buttons[j];
        }*/

        /*var buttons = new Array();
        for (i = 0; i <= data.pages; i++) {
          buttons[i] = document.getElementById("button1").innerHTML;
        }
        buttons1 = buttons.slice(0, data.pages + 1);*/

        //console.log(data.querySet);

        /*$(".j").on("click", function () {
          $("#content_container").empty();

          pages = Number($(this).pages);

          build_page();
        });*/
    }

    function chose_page(page_num) {
        console.log(page_num);
        document.getElementById("container1").innerHTML = "";
        page = parseInt(page_num);
        build_page();
    }

    function build_page() {
        var data = pagination(cards, page, rows);

        build_cards(data);
        build_pagination(data);
    }


    build_page();

</script>

</body>
</html>
