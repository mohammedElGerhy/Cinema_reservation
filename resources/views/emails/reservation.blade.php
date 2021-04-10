@component('mail::message')
ticket <hr>
name move:{{$user['user']-> movies ->name}}
name lounge {{$user['user']-> lounge ->name}}<hr>

 time from :{{$user['user']-> from}}<hr>
time to :{{$user['user']-> to}}<hr>
many ticket:{{$user['number']}}<hr>


The body of your message.

@component('mail::button', ['url' => 'Cinema_reservation/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
