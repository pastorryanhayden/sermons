@component('mail::message')
# {{$user->name}} has completed signup for Church Tools Sermons.

You had previously invited {{$user->name}} to help manage Church Tools Sermons.  We just wanted to let you know he/she has signed up.  You can always remove his/her account by signing in and going to settings/users.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
