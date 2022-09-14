@component('mail::message')
### Dear {{$user->first_name}},

We received a withdrawal token request. Our team will generate the token and send it to your email.


Please note, withdrawal tokens, are generated within 30minutes to 1 hour after the request is made.

Warm Regards,<br>
{{ config('app.name') }}
@endcomponent
