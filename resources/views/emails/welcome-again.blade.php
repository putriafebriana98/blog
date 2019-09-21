@component('mail::message')
# Introduction

The body of your message.
- Try to always wash your hand
- Look at the mirror who you are
- Like your self

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel', ['url' => ''])
   Lorem ipsum dolar sit amet.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
