@component('mail::layout')


<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>



{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="https://sharplinedistribution.com/wp-content/uploads/2022/03/logoSharpline-256x110.png"  alt="">
@endcomponent
@endslot

{{-- Body --}}
Dear <strong>Admin</strong>,
This is a request from {{ $data['name'] }},



<table>
    <tr>
        <th>Subject</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
    </tr>
    <tr>
        <td>{{isset($data['subject']) && !empty($data['subject']) ?  $data['subject'] : '-'}}</td>
        <td>{{isset($data['name']) && !empty($data['name']) ?  $data['name'] : '-'}}</td>
        <td>{{isset($data['email']) && !empty($data['email']) ?  $data['email'] : '-'}}</td>
        <td>{{isset($data['phone']) && !empty($data['phone']) ?  $data['phone'] : '-'}}</td>
    </tr>

</table>


{{-- Subcopy --}}
@isset($data['message'])
@slot('subcopy')
@component('mail::subcopy')
<strong>Message : </strong>
<br>
{{ $data['message'] }}

@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent