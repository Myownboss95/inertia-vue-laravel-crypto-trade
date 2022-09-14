@component('mail::message')
## Hello {{$user->first_name}},

Your withdrawal token request has been processed and here is your token.

<div style="text-align: center; margin-bottom: 20px;">
    <strong style="font-size:18px; font-weight: 800;">{{$token}}</strong>
</div>


You can now initiate your bank withdrawal.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
