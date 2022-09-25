@component('mail::message')
# You submitted the following information

@component('mail::table')
| Name   | Value |
|:--------|:-------|
|Name    |{{ $data['name'] }}|
|Surname| {{ $data['surname'] }}|
|South African Id Number| {{ $data['id_number'] }}|
|Mobile Number| {{ $data['mobile'] }}|
|Email Address| {{ $data['email'] }}|
|Birth Date| {{ $data['dob'] }}|
|Language |{{ $language }}|
|Interests | {{ $interests }}|
@endcomponent

Thank you for using my CRUD
{{ config('app.name') }}
@endcomponent
