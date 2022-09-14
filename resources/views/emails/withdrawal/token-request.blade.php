@component('mail::message')
## Hello Admin,

There's been a new withdrawal token request, please login to your admin to generate the withdrawal token.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
