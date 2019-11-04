@component('mail::message')
# {{$church->admin->name}} has invited you to help administrate sermons for {{$church->name}}.

Please click <a href="{{ route('accept', $invite->token) }}">this link</a> to setup your account and password.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
