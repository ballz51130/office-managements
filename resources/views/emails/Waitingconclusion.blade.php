@component('mail::message')
# สวัสดี, {{ $registrations->name }}

ทางบริษัทกำลังพิจารณาการสมัครงานของคุณอยู่ <br>
บริษัท : {{ env('APP_NAME') ?? 'Company Name ' }}<br>
ตำแหน่ง: {{ $registrations->position }}

กรุณาติดต่อกับทางบริษัทได้ที่อีเมลนนี้ ,<br>
{{ env('MAIL_FROM_ADDRESS') ?? 'test@email.com' }}<br>

ขอขอบคุณ <br>
บริษัท {{ env('APP_NAME') ?? 'Company Name ' }}<br>
@endcomponent
