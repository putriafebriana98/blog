@component('mail::message')
# Happy with other Post?

Some motivation for you....
- Try to always wash your hand
- Look at the mirror who you are
- Like your self

@component('mail::button', ['url' => 'localhost:8000/'])
See other user Post
@endcomponent

@component('mail::panel', ['url' => ''])
    Ut rerum officiis nihil aut natus laborum. Et necessitatibus sint non blanditiis tempora. Quidem sapi
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
