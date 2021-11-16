@component('mail::message')
# สวัสดี, {{ $registrations->name }}

คุณได้ผ่านการคัดเลือกเป็นพนักงาน<br>
บริษัท : {{ env('APP_NAME') ?? 'Company Name ' }}<br>
ตำแหน่ง: {{ $registrations->position }}

กรุณาติดต่อกับทางบริษัทได้ที่อีเมลนนี้ ,<br>
{{ env('MAIL_FROM_ADDRESS') ?? 'test@email.com' }}<br>
ภายใน 24 ชม.
@endcomponent
