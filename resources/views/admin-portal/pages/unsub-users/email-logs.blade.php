<table class="table table-hover text-white">
<tr>
    <th colspan="2" class="text-center">{{$user->name}}</th>
</tr>
<tr>
    <th>#</th>
    <th>Sent on</th>
</tr>
@forelse ($logs as $index=>$log)
    <tr>
        <td>{{++$index}}</td>
        <td>{{getDateFormat($log->created_at)}}</td>
    </tr>
@empty
    <tr>
        <td colspan="2" class="text-center">No record found</td>
    </tr>
@endforelse
</table>
