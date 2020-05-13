@component('mail::message')

    <strong>First name:</strong>{{$data['fname']}}
    <br>
    <strong>last name:</strong>{{$data['lname']}}
    <br>
    <strong>subject:</strong>{{$data['subject']}}
    <br>
   <strong>email:</strong>{{$data['email']}}
    <br>
    <br>
    <strong>message:</strong>{{$data['message']}}
@endcomponent
