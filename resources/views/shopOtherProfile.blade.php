<html>
@include('layouts.head')

<body>
@include('layouts.header')


<br><br><br><br>
<div class="container" id="card1" style="display: none;">
    <div class="row collapse show" style="margin-top: 50px;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body row">
                    <img class="img col-sm-4" src="user.png" alt="sans" />
                    <div class="col-sm-8">
                        <div class="row">
                            <a class="titlehref" href="ad_details.html">
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
        <div class="col-sm-1"></div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="card text-center border-info mb-3" style="width: 25rem; margin-left: 20px;">
            <img class="rounded mx-auto d-block rounded-circle" src="/images/{{$shop->logo}}" height="300" width="300" />
            <div class="card-body">
                <nav class="row">
                    <nav class="col-sm-2"></nav>
                    <nav class="col-sm-8 d-flex justify-content-between">
                        <div class="row ">
                            <h5 class="card-title" id="user_name" style="margin-left: 50px;">{{$shop->name}}</h5>

                        </div>
                    </nav>
                </nav>
                <nav class="col-sm-2"></nav>
                </nav>

                <div class="row" style="margin-top: 4px;">
                    <div class="col-sm-6">
                        <div class="row" style="margin-left: 3px;">
                            <h6>Shop Category:</h6>
                            <p style="margin-left: 10px;">{{$shop->category->name}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <h6>Address:</h6>
                            <p  style="margin-left: 10px;">{{$shop->address}}</p>
                        </div>
                    </div>
                </div>



                <p class="card-text" id="paragraph" style="margin-top: 20px;">
                    {{$shop->description}}
                </p>

                <hr />
                <div class="row">
                    <div class="col-sm-4">
                        <p class="font-weight-light">Ads</p>
                        <p class="font-weight-bold">{{$post_number}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="font-weight-light">Favorites</p>
                        <p class="font-weight-bold">{{$favorite_number}}</p>
                    </div>
                    <div class="col-sm-4">
                        <p class="font-weight-light">Following</p>
                        <p class="font-weight-bold">{{$follow_number}}</p>
                    </div>
                </div>
                <hr />
                <div class="row" style="margin-top: 20px;">

                    {{--                        @if(Auth::guard('shop')->user()->id != $post->shop->id)--}}

                        <button
                            type="button"
                            id="follow"

                            @if(Auth::guard('web')->check())
                            onclick="following('1','{{Auth::guard('web')->user()->id}}','{{$shop->id}}')"

                            @if(App\Follower::where('user_id',Auth::guard('web')->user()->id)->where('follow_id',$shop->id)->count())
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
                                onclick="following('2','{{Auth::guard('shop')->user()->id}}','{{$shop->id}}')"


                                @if(App\Follower::where('shop_id',Auth::guard('shop')->user()->id)->where('follow_id',$shop->id)->count())
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

                    {{--                        @endif--}}

                </div>
                <div class="row" style="margin-top: 10px;">
                    <button type="button" class="btn btn-success btn-lg btn-block">
                        {{$shop->phone}}
                    </button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="container" id="container1">


        </div>
    </div>
</div>
<div class="row">
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















</body>
<script src="profil_java.js"></script>
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
                                    document.getElementById("follow").innerHTML = " Unfollow";
                                    document.getElementById("follow").className =
                                        "btn btn-outline-primary font-weight-light btn-lg";

                                }

                            );


                    }

                }

            );


    }







    var cards = new Array();
    var cardsp = new Array(); /* ads cards   */
    var cards_s = new Array();
    i=0;
    <?php
        foreach ($posts as $post)
        {
        ?>

        cards_s[i] = document.getElementById("card1");
        cards_s[i].getElementsByClassName("title")[0].innerHTML ="<?php echo $post->name ?>";
        cards_s[i].getElementsByClassName("titlehref")[0].href ="/single=<?php echo $post->id ?>";
        cards_s[i].getElementsByClassName("slogan")[0].innerHTML ="<?php echo $post->slogan ?>";
        cards_s[i].getElementsByClassName("price")[0].innerHTML ="<?php echo $post->price ?>";
        cards_s[i].getElementsByClassName("img")[0].src="/images/<?php echo App\Image::where('post_id',$post->id)->pluck('image')->first()?>";

    // /* get the image src/
        cards_s[i].getElementsByClassName("url")[0].href = "/single=<?php echo $post->id ?>";


        cardsp[i] = cards_s[i].cloneNode(true);
        cardsp[i] = cardsp[i].innerHTML;
        cards.push(cardsp[i]);
        console.log("this is final", cards[i]);
        //document.getElementById("all_container").appendChild(cards[j]);
        i++;


    <?php    }
        ?>






    page = 1;
    rows = 3;
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
        container.style.display ="block";

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
        console.log(page_num);
        document.getElementById("container1").innerHTML = "";
        page = parseInt(page_num);
        build_page();
    }

    function build_page() {
        var data = pagination(cards, page, rows);

        build_cards(data);
        if(true){
            build_pagination(data);
        }


    }

    build_page();


</script>
</html>
