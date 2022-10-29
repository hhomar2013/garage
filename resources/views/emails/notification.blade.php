
@component('mail::message')
# Garage El-Montaza

{{ $details['type'] }}

@component('mail::panel')
<h3>
    {{ 'Name : ' . $details['name'] }} <br>
{{ 'Car Nom : ' . $details['car_nom'] }}<br>
{{ 'Registration Code : ' . $details['id_nom'] }}</h3>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
