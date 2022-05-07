@component('mail::message')
# Hello, {{$user->name}}

	Your application has been approved!


Thanks,<br>
{{ config('app.name') }}
@endcomponent
