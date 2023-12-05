@component('mail::message')
# Forgot Password

Berikut adalah password anda:

{{$user->password_text}}

Terima kasih,<br>
Bach Group
@endcomponent
