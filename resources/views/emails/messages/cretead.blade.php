@component('mail::message')
# Demande de renseignement de la part de M/Ms {{ $msg->firstName }} {{ $msg->lastName }} 

@component('mail::panel')

{{ $msg->content }}

Information supplémentaire 

Email        :  {{ $msg->email }}   
Télèphone    :  {{ $msg->phone }} 

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
