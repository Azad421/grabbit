hello {{ $email_data['name'] }}
<br>
Welcome to Grabb IT
<br>
Please click the link Below to verify your email and activate your account!
<br>
<a href="{{ env('APP_URL') }}/verify/{{ $email_data['verification_code'] }}">Click Here!</a>
<br>
Thank Your!
<br>
Customer support of Grabb It
