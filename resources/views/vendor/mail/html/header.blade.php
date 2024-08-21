@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Task Control')
<img src="http://localhost:8000/img/logo.png" class="logo" alt="Task Control Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
