<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

{{--    <link rel="stylesheet" href="{{asset('/css/css/all.css')}}">--}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px;
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }
        .custom-checkbox label:before{
            width: 18px;
            height: 18px;
        }
        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }
        .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }
        .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
        .modal form label {
            font-weight: normal;
        }
    </style>
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}
{{--            // Activate tooltip--}}
{{--            $('[data-toggle="tooltip"]').tooltip();--}}

{{--            // Select/Deselect checkboxes--}}
{{--            var checkbox = $('table tbody input[type="checkbox"]');--}}
{{--            $("#selectAll").click(function(){--}}
{{--                if(this.checked){--}}
{{--                    checkbox.each(function(){--}}
{{--                        this.checked = true;--}}
{{--                    });--}}
{{--                } else{--}}
{{--                    checkbox.each(function(){--}}
{{--                        this.checked = false;--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--            checkbox.click(function(){--}}
{{--                if(!this.checked){--}}
{{--                    $("#selectAll").prop("checked", false);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</head>
<body>
@include('layouts.header')
<br>
<br>

<br>
<br><br>
<br>

<br>
<br>


{{---------------------------------------------------------------------}}
<div class="container">
    <div class="row">
    <div class="col-sm-4">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mange <em>USERS</em></h5>

                    <a class="btn btn-primary" data-toggle="collapse" href="#Table1" role="button" aria-expanded="false" aria-controls="Table1">View more</a>
                </div>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mange <em>CATEGORIES</em></h5>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Table2" role="button" aria-expanded="false" aria-controls="Table2">View more</a>
                </div>
            </div>

        </div>

        <div class="col-sm-4">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mange <em>SHOPS</em></h5>
                    <a class="btn btn-primary" data-toggle="collapse" href="#Table3" role="button" aria-expanded="false" aria-controls="Table3">View more</a>
                </div>
            </div>

        </div>

    </div>

    <!-- table Users STARTS here -->
    <div class="collapse multi-collapse" id="Table1">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Users</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a onclick="deleter(-1,'x')" class="btn btn-danger" data-toggle="modal"><i style="color:white" class="fas fa-trash-alt " ></i> <span>Delete Users Database</span></a>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#usermodal" ><i class="fas fa-plus"></i> <span>Add New User</span></button>{{--id of whats affected by the button /toogle:what we are doing with the button --}}
                    </div>

                </div>
            </div>


            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr id="tr_{{$user->id}}x">

                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>

                        <td>
                            <a href="#usermodal" id="{{$user->id}}x"  class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                            <a   onclick="deleter('{{$user->id}}','x')" ><i style="color:red" class="fas fa-trash-alt "></i> </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </div>
    <!-- table Users ENDS here -->


    <!-- table Categoris STARTS here -->
    <div class="collapse multi-collapse" id="Table2">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Categories</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a onclick="deleter(-1)" class="btn btn-danger" data-toggle="modal"><i style="color:white" class="fas fa-trash-alt "></i> <span>Delete Categories Database</span></a>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#categorymodal" ><i class="fas fa-plus"></i> <span>Add New Category</span></button>{{--id of whats affected by the button /toogle:what we are doing with the button --}}
                    </div>

                </div>
            </div>


            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr id="tr_{{$category->id}}y">

                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>

                        <td>
                            <a href="#categorymodal" id="{{$category->id}}y"  class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                            <a   onclick="deleter('{{$category->id}}','y')" ><i style="color:red" class="fas fa-trash-alt "></i> </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </div>
    <!-- table Categories ENDS here -->


    <!-- table Shops STARTS here -->
    <div class="collapse multi-collapse" id="Table3">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Shops</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a onclick="deleter(-1,'y')" class="btn btn-danger" data-toggle="modal"><i style="color:white" class="fas fa-trash-alt "></i> <span>Delete Shops Database</span></a>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#shopmodal" ><i class="fas fa-plus"></i> <span>Add New Shop</span></button>{{--id of whats affected by the button /toogle:what we are doing with the button --}}
                    </div>

                </div>
            </div>


            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                    <tr id="tr_{{$shop->id}}z">

                        <td>{{$shop->id}}</td>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->email}}</td>
                        <td>{{$shop->created_at}}</td>
                        <td>{{$shop->updated_at}}</td>

                        <td>
                            <a href="#shopmodal" id="{{$shop->id}}z"  class="edit" data-toggle="modal"><i class="fas fa-edit"></i></a>
                            <a   onclick="deleter('{{$shop->id}}','z')" ><i style="color:red" class="fas fa-trash-alt "></i> </a>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
    </div>
    <!-- table Shops ENDS here -->

</div>




{{----------------------------------------------------------------------}}
<div id="usermodal" class="modal fade">
    <br><br><br>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/x"  method="post" class="p-5 bg-white" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add/Edit Users </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">


                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="subject">Password</label>
                            <input type="password" id="subject" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" value="Add/Edit" class="btn btn-success py-2 px-4 text-white">

                </div>
            </form>
        </div>
    </div>
</div>
{{----------------------------------------------------------------------}}

{{----------------------------------------------------------------------}}
<div id="categorymodal" class="modal fade">
    <br><br><br>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/y"  method="post" class="p-5 bg-white" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add/Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">




                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="image">Shop Pic/Logo          Required!</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                    </div>

                    <strong class="text-danger">{!! session()->get('error') !!}</strong>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" value="Add/Edit" class="btn btn-success py-2 px-4 text-white">

                </div>
            </form>
        </div>
    </div>
</div>
{{----------------------------------------------------------------------}}

{{----------------------------------------------------------------------}}
<div id="shopmodal" class="modal fade">
    <br><br><br>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/z"  method="post" class="p-5 bg-white" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add/Edit Shops</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">


                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="shopEmail">Email</label>
                            <input type="email" id="shopEmail" name="shopEmail" class="form-control @error('shopEmail') is-invalid @enderror">
                            @error('shopEmail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="shopName">Name</label>
                            <input type="text" id="shopName" name="shopName" class="form-control @error('shopName') is-invalid @enderror">
                            @error('shopName')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="shopPassword">Password</label>
                            <input type="password" id="shopPassword" name="shopPassword" class="form-control @error('shopPassword') is-invalid @enderror">
                            @error('shopPassword')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" value="Add/Edit" class="btn btn-success py-2 px-4 text-white">

                </div>
            </form>
        </div>
    </div>
</div>
{{----------------------------------------------------------------------}}
</body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    function deleter(id,flag)
    {

         console.log(id,flag);

        axios.get("/admin/delete?id="+id+"&flag="+flag)
            .then
            (
                function(message){

                    if(flag =='x')
                    {

                            document.getElementById('tr_' + id+'x').remove();

                    }
                    else  if(flag=='y')
                    {
                            document.getElementById('tr_' + id+'y').remove();

                    } else  if(flag=='z')
                    {

                            document.getElementById('tr_' + id+'z').remove();

                    }

                }

            );
    }
</script>
</html>
