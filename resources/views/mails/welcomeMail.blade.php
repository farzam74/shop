@component('mail::message')
# Introduction

Welcome to this site {{$name}}. We wish you have best moments and purchases here.

@component('mail::button', ['url' => route('login')])
LOGIN
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
