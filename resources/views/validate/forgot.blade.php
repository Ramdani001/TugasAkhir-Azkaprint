@component('mail::message')

Hello {{ $user->namaUser }},

<p>We Undestand it happens. </p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
    Reset Your Password
@endcomponent

<p>In case you have any issues recovering your password, please contact us</p>

Thank, <br>

&copy; AZKAPRINT - Support System
    
@endcomponent