@component('mail::message')
    Клиент: {{$form['name']}}<br>
    Почта: {{$form['email']}}<br>
    Телефон: {{$form['phone']}}<br>
    Сообщение:<br>
    {{$form['message']}}
    <br>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
