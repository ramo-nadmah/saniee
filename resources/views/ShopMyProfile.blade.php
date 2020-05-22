<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
<body>



@include('layouts.header')
<div class="container" id="card1" style="display: none;">
    <div class="shop row collapse show" id="s" style="margin-top: 50px;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body row">
                    <img class="img col-sm-4" src="/images/user.png" alt="sans" />
                    <div class="col-sm-8">
                        <div class="row">
                            <a href="ad_details.html">
                                <h3 class="title row">page_1</h3>
                            </a>
                        </div>
                        <div class="row">


                            <div class="row">

                                <div class="col-sm-6 ">
                                    Slogan:   <p class="slogan" >Click here</p>
                                </div>
                                <div class="col-sm-6">
                                    Price:    <p class="price" >Click here</p>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#" class="url">see post</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1">

            <button type="button" class="button_container btn btn-danger" id=""
                    onclick="delete_card(this.id);"><i class="fas fa-trash-alt"></i></button>

            <button type="button" class="edit_buuton btn btn-success" id=" ed_btn" value="" onclick="move_to(this.value);"
                    style="margin-top: 20px;"><i class="fas fa-edit"></i></button>

        </div>
    </div>
</div>

<div class="container" id="card2" style="display: none;">
    <div class="shop row collapse show" id="s" style="margin-top: 50px;">

        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body row">
                    <img class="image2 col-sm-4" src="user.png" alt="sans" />
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
                        <div class="row justify-content-center">

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
            <div class="card">
                <div class="card-body row">
                    <img class="image3 col-sm-4" src="user.png" alt="sans" />
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
                        <div class="row justify-content-center">

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
                <img class="col-sm-4" id="profile_pic" src="/images/{{$shop->logo}}" width="200" height="350" style="margin-top: 30px;" />
                <div class="card-img-overlay">
                    <button type="button" id="prof_del_btn" class="btn btn-danger" onclick="delte_prof_photo({{Auth::guard('shop')->user()->id}});" style="margin-top: 320px; margin-left: 310px;display: none;"><i class="fas fa-trash-alt"></i></button>

                </div>

                <div class="col-sm-4">
                    <div class="col-sm-4">
                        <div class="container" style="margin-top: 340px; margin-right: 50px">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" id="edit_prof_poc" onclick="show_edit_pic_btn();" class="btn btn-success" ><i class="fas fa-images"></i></button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" id="cancel_btn" onclick="hide_edit_pic_btn();" class="btn btn-secondary ml-3" style="display: none;">cancel</button>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="change_pic_row" style="display: none;margin-bottom:40px ;margin-top: 30px;margin-right: 30px;">
                        <div class="col-sm-12 d-flex justify-content-center">
                            <form class="form-inline" method="post" action="/changePP={{Auth::guard('shop')->user()->id}}" enctype="multipart/form-data">
                             @csrf
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="image">Change logo</label>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>

                                <button type="submit"  class="btn btn-primary mb-2">change picture</button>
                            </form>
                        </div>
                    </div>
                    <strong class="text-danger">{!! session()->get('error') !!}</strong>

                    <nav class="row">
                        <nav class="col-sm-2"></nav>
                        <nav class="col-sm-8">
                            <h3 class="card-title" id="user_name">{{$shop->name}}</h3>
                        </nav>
                        <nav class="col-sm-2"></nav>
                    </nav>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="container" id="drop_url2" style="display: none;">
                                <label for="drop1">change category  :</label>

                                <select  id="f_url2" style="width: 150px;">
                                    <option value="..." disabled selected value>...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="row">

                                <h4>adress : </h4>
                                <a href="/ads={{$shop->category_id}}" id="category" style="margin-left: 10px;">{{$shop->category->name}}</a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <h4>Email : </h4>
                                <p>{{$shop->email}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row py-4">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-sm-2">
                            <div class="container" id="drop_url1" style="display: none;">
                                <label for="drop1">Change address 1 :</label>

                                <select id="f_url" style="width: 150px;">
                                    <option disabled selected value="...">...</option>
                                    <option value="1">Irbid</option>
                                    <option value="2">Ajloun</option>
                                    <option value="3">Jerash</option>
                                    <option value="4">Mafraq</option>
                                    <option value="5">Balqa</option>
                                    <option value="6">Amman</option>
                                    <option value="7">Zarqa</option>
                                    <option value="8">Madaba</option>
                                    <option value="9">Karak</option>
                                    <option value="10">Tafilah</option>
                                    <option value="11">Ma'an</option>
                                    <option value="12">Aqaba</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="row" style="margin-left: 3px;">
                                <h4>Address:</h4>
                                <h1 id="address" style="margin-left: 10px;">{{$shop->address}}</h1>
                            </div>
                        </div>


                    </div>






                    <div class="row">
                        <p class="col-sm-12" id="paragZ">
                            {{$shop->description}}
                        </p>
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
                            <button type="button" onclick="saves({{$shop->id}});" id="button_save"
                                    class="btn btn-outline-info btn-lg btn-block" style="margin-left: 15px; display: none;">
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="container" id="ads_word" style="display: block;">
                                <a href="#" onclick="show_ads()" class="font-weight-light">Ads</a>
                                <p class="font-weight-bold">{{$post_number}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="container" id="Favorites_word" style="display: block;">
                                <a href="#" onclick="show_Favorites()" class="font-weight-light">Favorites</a>
                                <p class="font-weight-bold">{{$favorite_number}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" onclick="show_Follwing()" class="font-weight-light">Follwing</a>
                            <p class="font-weight-bold">{{$follow_number}}</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <button type="button" id="call_button" class="btn btn-success btn-lg btn-block">
                                {{$shop->phone}}
                            </button>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class=" row" style="margin-top: 30px;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                            <form id="new_phone_number_form" style="display: none;">
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Enter your new phone number</label>
                                    <input type="email" class="form-control" id="new_phone_number" aria-describedby="emailHelp"
                                           placeholder="Enter new phone number">

                                    <small id="emailHelp" class="form-text text-muted">make sure to enter your phone number</small>
                                </div>
                            </form>
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
    <div class="container" id="ads_card" style="display: none;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="container" id="container1">
                    <div class="container" id="nothing" style="display: none;">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <p>
                                    there is noting
                                </p>
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
                            <ul class="pagination justify-content-center" id="pagintaion_bar" style="margin-left: 260px;">

                            </ul>
                        </nav>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="favorate_card" style="display: none;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="container" id="container2" >
                    <div class="container" id="nothing2" style="display: none;">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center">
                                <p>
                                    there is noting
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-1"></div>

        </div>
        <div class=" row">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center" id="pagintaion_bar2" style="margin-left: 260px;">

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
                                <p>
                                    there is noting
                                </p>
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
                            <ul class="pagination justify-content-center" id="pagintaion_bar3" style="margin-left: 260px;">

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
<script src="profile2_js.js"></script>
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
<script>
    var phone_number = document.getElementById("call_button").innerHTML;
    var input_field = document.getElementById("new_phone_number");


    function delte_prof_photo(id) {
        var r = confirm("Are you sure that you want to delete your profile photo !!");
        if (r == true) {


            axios.get("deletePPhoto?shop_id="+id)
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
        console.log(document.getElementById("paragZ"));
        var paragraphH = document.getElementById("paragZ");
        var title = document.getElementById("user_name");
        var address = document.getElementById("address");
        var category = document.getElementById("category");


        var call_btn = document.getElementById("call_button");
        var input_num = document.getElementById("new_phone_number_form");

        var drop1_shap = document.getElementById("drop_url1");

        var drop2_shap = document.getElementById("drop_url2");

        paragraphH.contentEditable = "true";

        paragraphH.className = "col-sm-12 border border-dark";
        paragraphH.style.backgroundColor = "#e3f2fd";



        title.contentEditable = "true";
        title.className = "border border-dark";
        title.style.backgroundColor = "#e3f2fd";


        call_btn.disabled = true;
        input_num.style.display = "block";
        input_num.className = "border border-dark";
        input_num.style.backgroundColor = "#e3f2fd";

        drop1_shap.style.display = "block";

        drop2_shap.style.display = "block";

        document.getElementById("button_save").style.display = "block";




    }

    function saves(shop_id) {
        console.log("change");
        var paragraphH = document.getElementById("paragZ");
        var title = document.getElementById("user_name");
        var address = document.getElementById("address");
        var category = document.getElementById("category");

        save_new_phone_number(document.getElementById("call_button").innerHTML);
        var call_btn = document.getElementById("call_button");
        var input_num = document.getElementById("new_phone_number_form");

        var drop1_shap = document.getElementById("drop_url1");
        var drop2_shap = document.getElementById("drop_url2");

        var select1 = document.getElementById("f_url");
        var selec_val = select1.options[select1.selectedIndex].innerHTML;

        var select2 = document.getElementById("f_url2");
        var selec_val2 = select2.options[select2.selectedIndex].value;

        console.log('paragraph 1='+paragraphH.innerHTML+"name="+title.innerHTML+'phone= '+call_btn.innerText+" address= "+address.innerText+' category= '+category.innerText);

        axios.get("editMyProfile?shop_id="+shop_id+"&description="+paragraphH.innerText+"&name="+title.innerHTML+"&phone="+call_btn.innerHTML+"&address="+selec_val+"&category="+selec_val2)
            .then
            (
                function() {
                    paragraphH.contentEditable = "false";
                    paragraphH.className = "col-sm-12";
                    paragraphH.style.backgroundColor = "";


                    title.contentEditable = "false";
                    title.className = "";
                    title.style.backgroundColor = "";


                    if (selec_val == "...") {
                        address.innerHTML = address.innerHTML;
                        drop1_shap.style.display = "none";
                    } else {
                        address.innerHTML = selec_val;
                        drop1_shap.style.display = "none";
                    }


                    if (selec_val2 == "...") {
                        category.innerHTML = category.innerHTML;
                        drop2_shap.style.display = "none";
                    } else {
                        category.innerHTML = select2.options[select2.selectedIndex].innerHTML;
                        category.href="/ads="+select2.options[select2.selectedIndex].value;
                        console.log('category.innerHTML= ',category.innerHTML)
                        drop2_shap.style.display = "none";
                    }



                    save_new_phone_number(document.getElementById("call_button").innerHTML);
                    call_button.disabled = false;
                    input_num.style.display = "none";
                    input_num.className = "";
                    input_num.style.backgroundColor = "";


                    document.getElementById("button_save").style.display = "none";
                }
            );

    }

    function save_new_phone_number(old_num) {
        if (input_field.value == "") {
            document.getElementById("call_button").innerHTML = old_num;
        } else {
            document.getElementById("call_button").innerHTML = input_field.value;
        }
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
        document.getElementById("ads_card").style.display = "block";
        document.getElementById("favorate_card").style.display = "none";
        document.getElementById("following_card").style.display = "none";
    }

    function show_Favorites() {
        document.getElementById("ads_card").style.display = "none";
        document.getElementById("favorate_card").style.display = "block";
        document.getElementById("following_card").style.display = "none";
    }

    function show_Follwing() {
        document.getElementById("ads_card").style.display = "none";
        document.getElementById("favorate_card").style.display = "none";
        document.getElementById("following_card").style.display = "block";
    }

    var cards_s = new Array();
    var cards = new Array();
    var cardsp = new Array(); /* ads cards   */
    i=0;
    <?php
        foreach ($posts as $post)
        {
        ?>

        cards_s[i] = document.getElementById("card1");
        cards_s[i].getElementsByClassName("shop")[0].id = "shop_" +'<?php echo $post->shop_id ?>';



        cards_s[i].getElementsByClassName("edit_buuton")[0].value = "<?php echo $post->id ?>";



        /* card id */
        cards_s[i].getElementsByClassName("button_container")[0].id = "<?php echo $post->id ?>";


        //


        cards_s[i].getElementsByClassName("title")[0].innerHTML ="<?php echo $post->name ?>";
        cards_s[i].getElementsByClassName("slogan")[0].innerHTML ="<?php echo $post->slogan ?>";
        cards_s[i].getElementsByClassName("price")[0].innerHTML ="<?php echo $post->price ?>";
        cards_s[i].getElementsByClassName("img")[0].src="/images/<?php echo App\Image::where('post_id',$post->id)->pluck('image')->first() ?>";
        // /* get the image src/
        cards_s[i].getElementsByClassName("url")[0].href = "/single=<?php echo $post->id ?>";


        cardsp[i] = cards_s[i].cloneNode(true);
        cardsp[i] = cardsp[i].innerHTML;
        cards.push(cardsp[i]);

        //document.getElementById("all_container").appendChild(cards[j]);
        i++;
    <?php    }
        ?>
        cards_number=i;

    page = 1;
    rows = 3;
    w = 5;

    function pagination(cards, page, rows) {
        console.log("this is final shit", cards);
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
        }

        if (page != 1) {
            container.innerHTML =
                `<button id=${1} onclick="chose_page(this.id);" class="btn btn-sm btn-info m-1">&#171; First</button>` +
                container.innerHTML;
        }

        if (page != data.pages) {
            container.innerHTML += `<button id=${data.pages} onclick="chose_page(this.id);" class="btn btn-sm btn-info m-1">Last &#187;</button>`;
        }
    }

    function chose_page(page_num) {
        /*console.log(page_num);*/
        document.getElementById("container1").innerHTML = "";
        page = parseInt(page_num);
        build_page();
        document.getElementById(page_num).className =
            "btn btn-sm btn-info m-1 active";
    }

    function build_page() {

        if (cards_number > 0) {
            var data = pagination(cards, page, rows);

            build_cards(data);
            build_pagination(data);
        } else {

            document.getElementById("pagintaion_bar").innerHTML = "";
            document.getElementById("nothing").style.display = "block";

        }

    }

    function delete_card(id) {
        var r = confirm("Are you sure that you want to delete this ad");
        console.log('id',id)
        //console.log("card id", z);

        if (r == true) {





            axios.get("deletePP?post_id="+id)
                .then
                (
                    function() {

                        location.reload();
                    }
                );

        } else {
            window.close();
        }
        /*  hammam r7eelat was here */
        //console.log("after del", cards[c]);
    }

    function move_to(id) {
        window.location.href = "/single="+id;
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

        cards_s2[i].getElementsByClassName("shop")[0].id = "shop_" + "<?php echo $favorite->posts->shops->name  ?>";






        /*  card id  */

        cards_s2[i].getElementsByClassName("Favorit_btn")[0].id = "<?php echo $favorite->id ?>";




        /*   your work starts here* */
        cards_s2[i].getElementsByClassName("image2")[0].src="/images/"+"<?php echo App\Image::where('post_id',$favorite->post_id)->pluck('image')->first()?>";

        cards_s2[i].getElementsByClassName("title_href2")[0].href="/single="+"<?php echo $favorite->posts->id  ?>";

        cards_s2[i].getElementsByClassName("title2")[0].innerHTML="<?php echo $favorite->posts->name  ?>";

        cards_s2[i].getElementsByClassName("paragraph2")[0].innerHTML="<?php echo $favorite->posts->slogan  ?>";

        cards_s2[i].getElementsByClassName("category2")[0].innerHTML="<?php echo $favorite->posts->categories->name  ?>";

        cards_s2[i].getElementsByClassName("go_button2")[0].href="/single="+"<?php echo $favorite->posts->id  ?>";

        cards_s2[i].getElementsByClassName("price2")[0].innerHTML="<?php echo $favorite->posts->price  ?>";

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

            axios.get("deletePFa?favorite_id="+id)
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
        cards_s3[i].getElementsByClassName("image3")[0].src="/images/"+"<?php echo App\Shop::where('id',$following->follow_id)->value('logo')?>";

        cards_s3[i].getElementsByClassName("title_href3")[0].href="/profile="+"<?php echo App\Shop::where('id',$following->follow_id)->value("id") ?>";

        cards_s3[i].getElementsByClassName("title3")[0].innerHTML="<?php echo App\Shop::where('id',$following->follow_id)->value("name") ?>";

        cards_s3[i].getElementsByClassName("paragraph3")[0].innerHTML="<?php echo App\Shop::where('id',$following->follow_id)->value("description") ?>";

        cards_s3[i].getElementsByClassName("category3")[0].innerHTML="<?php echo App\Category::where('id',App\Shop::where('id',$following->follow_id)->value("category_id"))->value("name") ?>";

        cards_s3[i].getElementsByClassName("go_button3")[0].href="/profile="+"<?php echo App\Shop::where('id',$following->follow_id)->value("id") ?>";



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






            axios.get("deletePFo?following_id="+id)
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



    function chose_show(x) {
        if (x == '0') {
            document.getElementById("ads_card").style.display = "none";
            document.getElementById("following_card").style.display = "none";
            document.getElementById("favorate_card").style.display = "none";
        }
        else if(x == '1'){
            document.getElementById("ads_card").style.display = "block";
            document.getElementById("following_card").style.display = "none";
            document.getElementById("favorate_card").style.display = "none";
        } else if (x == '2') {
                document.getElementById("ads_card").style.display = "none";
                document.getElementById("following_card").style.display = "block";
                document.getElementById("favorate_card").style.display = "none";

        } else if(x == '3'){
            document.getElementById("ads_card").style.display = "none";
            document.getElementById("following_card").style.display = "none";
            document.getElementById("favorate_card").style.display = "block";

        }

    }


    var  b = '<?php echo $flag ?>';
    console.log(b);
    chose_show(b);
    build_page();
    build_page2();
    build_page3();
    /*
    show_ads_or_not(show_ads_value);
    show_favorites_or_not(show_favorites_value);
    show_follwing_or_not(show_folowing_value);*/
</script>

</html>
