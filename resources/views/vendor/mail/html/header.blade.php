@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="{{ asset('assets/images/offer-letter.png') }}" alt="Riphah Logo" style="height:80px;"> --}}

{{-- <img src="https://laravel.com/img/notification-logo-v2.1.png" class="logo" alt="Laravel Logo"> --}}
@else
PASSWORD RESET REQUEST
@endif
</a>
</td>
</tr>
