<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<form action="/register_admin" method="post" class="p-5 bg-white">
    @csrf
    <div class="row form-group">

        <div class="col-md-12">
            <label class="text-black" for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">

            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror</div></div>
    </div>

    <div class="row form-group">

        <div class="col-md-12">
            <label class="text-black" for="name">name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror</div></div>
    </div>

    <div class="row form-group">

        <div class="col-md-12">
            <label class="text-black" for="subject">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">

            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror</div></div>

    </div>



    <div class="row form-group">
        <div class="col-md-12">
            <input type="submit" value="sign up" class="btn btn-primary py-2 px-4 text-white">
        </div>
    </div>


</form>
</body>
</html>
