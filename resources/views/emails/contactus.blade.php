@component('mail::message')
# New Message from Contact Form

<br>
Name : {{ $details['name'] }}<br>
<br>
Email : {{ $details['email'] }}<br>
<br>
Message : {{ $details['message'] }}<br>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
