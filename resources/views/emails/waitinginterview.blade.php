@component('mail::message')
# สวัสดี, {{ $registration->name }}

บริษัทได้ทำการนัดสัมภาษณ์งานของคุณครั้งที่ {{$registration->status_rols}} ในวันที่ {{ date('j/m/Y', strtotime($registration->interviewlist->date)) }}<br>
บริษัท : {{ env('APP_NAME') ?? 'Company Name ' }}<br>
ตำแหน่ง: {{ $registration->position }}

สอบถามหรือติดต่อทางบริษัทได้ที่อีเมลนนี้,<br>
{{ env('MAIL_FROM_ADDRESS') ?? 'test@email.com' }}
@endcomponent
