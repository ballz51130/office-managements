@component('mail::message')
# สวัสดี, {{ $registration->name }}

คุณไม่ได้ผ่านการคัดเลือกเป็นพนักงาน<br>
บริษัท : {{ env('APP_NAME') ?? 'Company Name ' }}<br>
ตำแหน่ง: {{ $registration->position }} <br>
หมายเหตุ : {{ $registration->status_detail }}  <br>
สอบถามหรือติดต่อทางบริษัทได้ที่อีเมลนนี้,<br>
{{ env('MAIL_FROM_ADDRESS') ?? 'test@email.com' }}
@endcomponent
