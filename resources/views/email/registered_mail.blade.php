@component('mail::message')

Hi, {{ $save->username }} . Please new account password set

<p>It happends, click the link below.</p>

@component('mail::button', ['url' => url('set_new_password/').$save->remember_token])
    Set Your Password
@endcomponent

Thank You

@endcomponent