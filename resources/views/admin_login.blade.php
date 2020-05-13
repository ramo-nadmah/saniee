<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<form action="/login_admin" method="post" class="p-5 bg-white">
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
        <div class="col-md-12">
            <input type="submit" value="login" class="btn btn-primary py-2 px-4 text-white">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
            <a class="btn btn-link" href="{{route('admin.password.request')}}">Forgot your Password?</a>
        </div>
    </div>


</form>
</body>
</html>
