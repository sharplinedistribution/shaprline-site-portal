@component('mail::message')

Dear {{isset($data['name']) && !empty($data['name']) ? $data['name'] : '-'}}


@if(!empty($data['content']))
{{$data['content']}}
@endif

<br>
Order details: <br>
<strong>Plan</strong>: {{!empty($data['package_name']) ? $data['package_name']: '-'}}<br>
<strong>Price</strong>: {{!empty($data['price']) ? $data['price'] : '-'}} <br>




<p>We thank you a thousand times for choosing to use Sharpline Distro (we love you).</p><br>
<p>If you have feedback, questions or anything, please reply to this email.</p><br>

<strong>Thank you,</strong><br>

<span>Sharpline Distro | Global Music Distribution & Marketing Company</span><br>
<p>Website: <a href="https://www.sharplinedistribution.com">https://www.sharplinedistribution.com</a></p>

@endcomponent