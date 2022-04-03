hello {{ $email_data['name'] }}
<br>
Please click the link Below to verify your email !
<br>
<a href="{{ route('admin.email.verify',[$email_data['verification_code'] , $email_data['email']] )}}">Click Here!</a>
<br>
Thank Your!
<br>
