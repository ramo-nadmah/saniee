<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .green-btn{
            background-color: #4CAF50;
            border-color: #4CAF50;
        }
        .red-btn{
            background-color: #E71D36;
        }
        .card_css{
            max-height:250px;
            overflow: hidden;
        }

        .image_s{
            width: 200px;
            height: 200px;
        }
        .image_s2{
            width: 200px;
            height: 170px;
        }
    </style>
</head>

@include('layouts.head')
<body>



@include('layouts.header')
<div class="container" id="card2" style="display: none;">
    <div class="shop row collapse show" id="s" style="margin-top: 50px;">

        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card card_css">
                <div class="card-body row">
                    <img class="image2 col-sm-4 image_s" src="user.png" alt="sans" />
                    <div class="col-sm-8">
                        <a class="title_href2" href="#">
                            <h3 class="title2 row">page_1</h3>
                        </a>
                        <div class="row">
                            <div class="col-sm-9">
                                <p class="paragraph2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem
                                    Ipsum has been
                                    the
                                    industry's standard dummy text ever since the 1500s,</p>
                            </div>

                            <div class="row">
                                <h4 style="margin-left: 30px;" class="category2"> category</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-3">

                            <div class="col-sm-6">
                                <a href="" class="button go_button2 btn btn-outline-secondary">take me there</a>

                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <h4>prise :</h4>
                                    <h4 class="price2">6000</h4>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1">

            <button type="button" class="Favorit_btn btn btn-primary" id="" onclick="fav(this.id);"><i
                    class="fav_btn_shap fas fa-times" ></i></button>



        </div>
    </div>
</div>

<div class="container" id="card3" style="display: none;">
    <div class="shop row collapse show" id="s" style="margin-top: 50px;">
        <div class="col-sm-1">
            <div>
                <p class="ad_card3_id" id="s" value style="display: none;">

                </p>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="card card_css">
                <div class="card-body row">
                    <img class="image3 col-sm-4 image_s" src="user.png" alt="sans" />
                    <div class="col-sm-8">
                        <a class="title_href3" href="ad_details.html">
                            <h3 class="title3 row">page_1</h3>
                        </a>
                        <div class="row">
                            <div class="col-sm-9">
                                <p class="paragraph3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been
                                    the
                                    industry's standard dummy text ever since the 1500s,</p>
                            </div>

                            <div class="row">
                                <h4 class="category3" style="margin-left: 30px;"> category</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center pt-4">

                            <a href="" class="button go_button3 btn btn-outline-secondary">take me there</a>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1">

            <button type="button" class="Follow_btn btn btn-primary" id=""
                    onclick="fol( this.id);" > Unfollow</button>



        </div>
    </div>
</div>


<div class="row" style="margin-top: 60px;">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="card text-center">
            <div class="row">
                <div class="col-sm-4"></div>
                <img class="col-sm-4" id="profile_pic" src="{{Auth::guard('web')->user()->logo}}" width="200" height="350"
                     style="margin-top: 30px;" />
                <div class="card-img-overlay">
                    <button type="button" id="prof_del_btn" class="btn btn-danger red-btn" onclick="delte_prof_photo({{Auth::guard('web')->user()->id}});"
                            style="margin-top: 320px; margin-left: 310px;display: none;"><i
                            class="fas fa-trash-alt"></i></button>

                </div>

                <div class="col-sm-4">
                    <div class="col-sm-4">
                        <div class="container" style="margin-top: 340px; margin-right: 50px">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" id="edit_prof_poc" onclick="show_edit_pic_btn();"
                                            class="btn btn-success green-btn"><i class="fas fa-images"></i></button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" id="cancel_btn" onclick="hide_edit_pic_btn();"
                                            class="btn btn-secondary ml-3" style="display: none;">cancel</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="change_pic_row"
                         style="display: none;margin-bottom:40px ;margin-top: 30px;margin-right: 30px;">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <form class="form-inline" method="post" action="/changeUserPP={{Auth::guard('web')->user()->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group pr-3">
                                    <div class="col-md-12">
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">change picture</button>
                            </form>
                        </div>
                    </div>
                    <strong class="text-danger">{!! session()->get('error') !!}</strong>

                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h3 class="card-title" id="user_name">{{Auth::guard('web')->user()->name}}</h3>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>




                            <div class="row p-5">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <h3>Email : </h3>
                                        <h4 class="pl-3"> {{Auth::guard('web')->user()->email}}</h4>
                                    </div>

                            </div>
                            </div>



                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                            <button type="button" onclick="change();" class="btn btn-primary btn-lg btn-block"
                                    style="margin-left: 10px;">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="col-sm-5">
                            <button type="button" onclick="saves({{Auth::guard('web')->user()->id}});" id="button_save"
                                    class="btn btn-outline-info btn-lg btn-block"
                                    style="margin-left: 15px; display: none;">
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                    <hr />
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="container" id="Favorites_word" style="display: block;">

                                <a href="#" onclick="show_Favorites()" class="font-weight-light"><h3>Favorites</h3></a>
                                <p class="font-weight-bold">{{$favorite_number}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <a href="#" onclick="show_Follwing()" class="font-weight-light"><h3>Follwing</h3></a>
                            <p class="font-weight-bold">{{$follow_number}}</p>
                        </div>
                    </div>



                    <div class="col-sm-2"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="col-sm-1"></div>



<div class="row">


    <div class="container" id="favorate_card" style="display: none;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="container" id="container2">
                    <div class="container" id="nothing2" style="display: none;">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <h3>
                                    there is noting
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>

        </div>
        <div class=" row">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center" id="pagintaion_bar2"
                                style="margin-left: 260px;">

                            </ul>
                        </nav>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="following_card" style="display: none;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="container" id="container3">
                    <div class="container" id="nothing3" style="display: none;">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <h3>
                                    there is noting
                                </h3>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-sm-1"></div>

        </div>
        <div class="row">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center" id="pagintaion_bar3"
                                style="margin-left: 260px;">

                            </ul>
                        </nav>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
    </div>



</div>


</body>
<script src="user_myporfile_js.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>



    function delte_prof_photo(id) {
        var r = confirm("Are you sure that you want to delete your profile photo !!");
        if (r == true) {

            axios.get("deleteUserPPhoto?user_id="+id)
                .then
                (
                    function() {

                        location.reload();
                    }
                );
        } else {
            window.close();
        }
    }

    function show_edit_pic_btn() {
        var del_btn = document.getElementById("prof_del_btn");
        var chng_row = document.getElementById("change_pic_row");
        var cancel_button = document.getElementById("cancel_btn");

        del_btn.style.display = "block";

        chng_row.style.display = "block";

        cancel_button.style.display = "block"


    }

    function hide_edit_pic_btn() {
        var del_btn = document.getElementById("prof_del_btn");
        var chng_row = document.getElementById("change_pic_row");
        var cancel_button = document.getElementById("cancel_btn");

        del_btn.style.display = "none";

        chng_row.style.display = "none";

        cancel_button.style.display = "none"


    }

    function change() {
        console.log("change");

        var title = document.getElementById("user_name");


        title.contentEditable = "true";
        title.className = "border border-dark";
        title.style.backgroundColor = "#e3f2fd";



        document.getElementById("button_save").style.display = "block";
    }

    function saves(user_id) {
        console.log("change");

        var title = document.getElementById("user_name");

        axios.get("editUserMyProfile?user_id="+user_id+"&name="+title.innerHTML)
            .then
            (
                function() {
                    title.contentEditable = "false";
                    title.className = "";
                    title.style.backgroundColor = "";




                    document.getElementById("button_save").style.display = "none";
                }
            );
    }



    function show_ads_or_not(x) {
        console.log(x);

        if (x == true) {
            document.getElementById("ads_word").style.display = "block";
        } else {
            document.getElementById("ads_word").style.display = "none";
        }
    }

    function show_favorites_or_not(x) {
        console.log(x);

        if (x == true) {
            document.getElementById("Favorites").style.display = "block";
        } else {
            document.getElementById("Favorites").style.display = "none";
        }
    }

    function show_follwing_or_not(x) {
        if (x == true) {
            document.getElementById("Follwing_word").style.display = "block";
        } else {
            document.getElementById("Follwing_word").style.display = "none";
        }
    }

    function show_ads() {

        document.getElementById("favorate_card").style.display = "none";
        document.getElementById("following_card").style.display = "none";
    }

    function show_Favorites() {

        document.getElementById("favorate_card").style.display = "block";
        document.getElementById("following_card").style.display = "none";
    }

    function show_Follwing() {

        document.getElementById("favorate_card").style.display = "none";
        document.getElementById("following_card").style.display = "block";
    }

    var l = 1;

    var cards_s2 = new Array();
    var cards2 = new Array();
    var cardsp2 = new Array(); /* favarote cards   */
    i=0;
    <?php
        foreach ($favorites as $favorite)
        {

        ?>
        cards_s2[i] = document.getElementById("card2");

    cards_s2[i].getElementsByClassName("shop")[0].id = "shop_" + "<?php echo $favorite->post->shop->name  ?>";


    /*  card id  */

    cards_s2[i].getElementsByClassName("Favorit_btn")[0].id = "<?php echo $favorite->id ?>";




    /*   your work starts here* */
    cards_s2[i].getElementsByClassName("image2")[0].src="<?php echo App\Image::where('post_id',$favorite->posts_id)->pluck('image')->first()?>";

    cards_s2[i].getElementsByClassName("title_href2")[0].href="/single="+"<?php echo $favorite->post->id  ?>";

    cards_s2[i].getElementsByClassName("title2")[0].innerHTML="<?php echo $favorite->post->name  ?>";

    cards_s2[i].getElementsByClassName("paragraph2")[0].innerHTML="<?php echo $favorite->post->slogan  ?>";

    cards_s2[i].getElementsByClassName("category2")[0].innerHTML="<?php echo $favorite->post->category->name  ?>";

    cards_s2[i].getElementsByClassName("go_button2")[0].href="/single="+"<?php echo $favorite->post->id  ?>";

    cards_s2[i].getElementsByClassName("price2")[0].innerHTML="<?php echo $favorite->post->price  ?>";

    /*
   work ends here
    */

    cardsp2[i] = cards_s2[i].cloneNode(true);
    cardsp2[i] = cardsp2[i].innerHTML;
    cards2.push(cardsp2[i]);

    //document.getElementById("all_container").appendChild(cards[j]);
    i++;
    <?php
        }
        ?>
        cards_number2=i;
    page2 = 1;
    rows2 = 3;
    w2 = 5;

    function pagination2(cards2, page2, rows2) {
        var card_start = (page2 - 1) * rows2;
        var card_end = card_start + rows2;

        var cards_data = cards2.slice(card_start, card_end);

        var pages = Math.ceil(cards2.length / rows2);

        return {
            querySet: cards_data,
            pages: pages,
        };
    }

    function build_cards2(data) {
        var container = document.getElementById("container2");
        container.innerHTML = "";
        last_cards = data.querySet.join("");
        for (i = 1; i <= data.pages; i++) {
            //console.log(data.querySet);

            container.innerHTML = last_cards;
            //console.log(data.querySet);
        }
    }

    function build_pagination2(data) {
        var container = document.getElementById("pagintaion_bar2");
        container.innerHTML = "";

        var maxLeft = parseInt(page2 - Math.floor(w2 / 2));
        var maxRight = parseInt(page2 + Math.floor(w2 / 2));

        if (maxLeft < 1) {
            maxLeft = 1;
            maxRight = w2;
        }

        if (maxRight > data.pages) {
            maxLeft = data.pages - (w2 - 1);

            if (maxLeft < 1) {
                maxLeft = 1;
            }
            maxRight = data.pages;
        }

        for (var j = maxLeft; j <= maxRight; j++) {
            console.log(j);
            container.innerHTML += `<button id=${j} onclick="chose_page2(this.id);" class=" btn btn-sm btn-info m-1">${j}</button>`;
        }

        if (page2 != 1) {
            container.innerHTML =
                `<button id=${1} onclick="chose_page2(this.id);" class="btn btn-sm btn-info m-1">&#171; First</button>` +
                container.innerHTML;
        }

        if (page2 != data.pages) {
            container.innerHTML += `<button id=${data.pages} onclick="chose_page2(this.id);" class="btn btn-sm btn-info m-1">Last &#187;</button>`;
        }
    }

    function chose_page2(page_num) {
        /*console.log(page_num);*/
        document.getElementById("container2").innerHTML = "";
        page2 = parseInt(page_num);
        build_page2();
        document.getElementById(page_num).className =
            "btn btn-sm btn-info m-1 active";
    }

    function build_page2() {
        if (cards_number2 > 0) {
            var data = pagination2(cards2, page2, rows2);

            build_cards2(data);
            build_pagination2(data);
        } else {

            document.getElementById("pagintaion_bar2").innerHTML = "";
            document.getElementById("nothing2").style.display = "block";

        }
    }

    function fav(id) {

        var r = confirm("Are you sure that you want to un favorate this ad");

        if (r == true) {

            axios.get("deleteUserPFa?favorite_id="+id)
                .then(
                    function()
                    {
                        location.reload();
                    }
                );



        } else {
            window.close();
        }
    }


    var cards_s3 = new Array();
    var cards3 = new Array();
    var cardsp3 = new Array();
    i=0;
    <?php
        foreach ($followings as $following)
        {

        ?>
        cards_s3[i] = document.getElementById("card3");


    cards_s3[i].getElementsByClassName("shop")[0].id = "shop_" + "<?php echo $following->follow_id  ?>";

    cards_s3[i].getElementsByClassName("Follow_btn")[0].value = "<?php echo $following->id?>";
    cards_s3[i].getElementsByClassName("Follow_btn")[0].id = "fol_" + "<?php echo $following->id?>";

    /* card id  */
    cards_s3[i].getElementsByClassName("Follow_btn")[0].id = "<?php echo $following->id?>";
    /*   your work starts here* */
    cards_s3[i].getElementsByClassName("image3")[0].src="<?php echo App\Shop::where('id',$following->follow_id)->value('logo')?>";

    cards_s3[i].getElementsByClassName("title_href3")[0].href="/shop="+"<?php echo App\Shop::where('id',$following->follow_id)->value("id") ?>";

    cards_s3[i].getElementsByClassName("title3")[0].innerHTML="<?php echo App\Shop::where('id',$following->follow_id)->value("name") ?>";

    cards_s3[i].getElementsByClassName("paragraph3")[0].innerHTML="<?php echo App\Shop::where('id',$following->follow_id)->value("description") ?>";

    cards_s3[i].getElementsByClassName("category3")[0].innerHTML="<?php echo App\Category::where('id',App\Shop::where('id',$following->follow_id)->value("category_id"))->value("name") ?>";

    cards_s3[i].getElementsByClassName("go_button3")[0].href="/shop="+"<?php echo App\Shop::where('id',$following->follow_id)->value("id") ?>";



    /*
    work ends here
     */

    cardsp3[i] = cards_s3[i].cloneNode(true);
    cardsp3[i] = cardsp3[i].innerHTML;
    cards3.push(cardsp3[i]);

    //document.getElementById("all_container").appendChild(cards[j]);
    i++;
        <?php
        }

        ?>
    var cards_number3 = i;

    page3 = 1;
    rows3 = 3;
    w3 = 5;

    function pagination3(cards3, page3, rows3) {
        var card_start = (page3 - 1) * rows3;
        var card_end = card_start + rows3;

        var cards_data = cards3.slice(card_start, card_end);

        var pages = Math.ceil(cards3.length / rows3);

        return {
            querySet: cards_data,
            pages: pages,
        };
    }

    function build_cards3(data) {
        var container = document.getElementById("container3");
        container.innerHTML = "";
        last_cards = data.querySet.join("");
        for (i = 1; i <= data.pages; i++) {
            //console.log(data.querySet);

            container.innerHTML = last_cards;
            //console.log(data.querySet);
        }
    }

    function build_pagination3(data) {
        var container = document.getElementById("pagintaion_bar3");
        container.innerHTML = "";

        var maxLeft = parseInt(page3 - Math.floor(w3 / 2));
        var maxRight = parseInt(page3 + Math.floor(w3 / 2));

        if (maxLeft < 1) {
            maxLeft = 1;
            maxRight = w3;
        }

        if (maxRight > data.pages) {
            maxLeft = data.pages - (w3 - 1);

            if (maxLeft < 1) {
                maxLeft = 1;
            }
            maxRight = data.pages;
        }

        for (var j = maxLeft; j <= maxRight; j++) {
            /* console.log(j);*/
            container.innerHTML += `<button id=${j} onclick="chose_page3(this.id);" class=" btn btn-sm btn-info m-1">${j}</button>`;
        }

        if (page3 != 1) {
            container.innerHTML =
                `<button id=${1} onclick="chose_page3(this.id);" class="btn btn-sm btn-info m-1">&#171; First</button>` +
                container.innerHTML;
        }

        if (page3 != data.pages) {
            container.innerHTML += `<button id=${data.pages} onclick="chose_page3(this.id);" class="btn btn-sm btn-info m-1">Last &#187;</button>`;
        }
    }

    function chose_page3(page_num) {
        /*console.log(page_num);*/
        document.getElementById("container3").innerHTML = "";
        page3 = parseInt(page_num);
        build_page3();
        document.getElementById(page_num).className =
            "btn btn-sm btn-info m-1 active";
    }

    function build_page3() {
        if (cards_number3 > 0) {
            var data = pagination3(cards3, page3, rows3);

            build_cards3(data);
            build_pagination3(data);
        } else {

            document.getElementById("pagintaion_bar3").innerHTML = "";
            document.getElementById("nothing3").style.display = "block";

        }
    }

    function fol(id) {

        var r = confirm("Are you sure that you want to unfollow this ad");
        if (r == true) {






            axios.get("deleteUserPFo?following_id="+id)
                .then(
                    function()
                    {
                        location.reload();
                    }
                );
        } else {
            window.close();
        }
    }

    var b = '<?php echo $flag ?>';

    function chose_show(x) {
        if (x == 1) {
            document.getElementById("favorate_card").style.display = "block";
            document.getElementById("following_card").style.display = "none";

        } else {

            document.getElementById("favorate_card").style.display = "none";
            document.getElementById("following_card").style.display = "block";

        }
    }
    chose_show(b);


    build_page2();
    build_page3();
    /*
    show_ads_or_not(show_ads_value);
    show_favorites_or_not(show_favorites_value);
    show_follwing_or_not(show_folowing_value);*/
</script>
</html>
