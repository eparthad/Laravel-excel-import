@component('mail::message')
# Import Finish

Successfully customers list imported.

@component('mail::button', ['url' => route('customers.index') ])
Take a look
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
