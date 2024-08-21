<x-mail::message>
# {{ $task }}

Limit date: {{ $limit_date }}

<x-mail::button :url={{ $url }}>
Click here to more details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
