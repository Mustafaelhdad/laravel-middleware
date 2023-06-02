<x-mail::message>
# مرحبا بك {{$user->name}}

نورت موقعنا الفشيخ

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
