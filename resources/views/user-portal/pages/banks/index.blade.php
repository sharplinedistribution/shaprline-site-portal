@extends('layouts.user_scaffold')
@push('title')
- {{isset($title) && !empty($title) ? $title : ''}}
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if(!isset($bank) && empty($bank) && empty($bank->id))
                        <div class="col-md-12 text-right">
                            <a class="btn btn-lg" href="{{route('user.banks.create')}}" style="background-color:#fbda03; color: #333;;">Create New</a>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="card-title">{{$title}}</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="campaign">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Bank Name </th>
                                    <th> Account Holder </th>
                                    <th> Account Number </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($records) && $records->count()>0)
                                @foreach($records as $index=>$value)
                                <tr>
                                    <td> {{++$index}} </td>
                                    <td>{{isset($value->bank_name) && !empty($value->bank_name) ? $value->bank_name : '-'}}</td>
                                    <td>{{isset($value->account_holder) && !empty($value->account_holder) ? $value->account_holder : '-'}}</td>
                                    <td>{{isset($value->account_number) && !empty($value->account_number) ? $value->account_number : '-'}}</td>
                                    <td class=" align-items-center">
                                        <a href="{{route('user.banks.show', $value->id)}}" class="btn btn-outline-primary">View</a>&nbsp;&nbsp;
                                        <a href="{{route('user.banks.edit', $value->id)}}" class="btn btn-outline-success">Edit</a>&nbsp;&nbsp;
                                        <a href="javascript:;" class="btn btn-outline-danger delete_record " data-id="{{$value->id}}" onclick="event.preventDefault();" data-toggle="tooltip" title="Delete">
                                            Delete
                                        </a>
                                        <form id="destroyForm_{{$value->id}}" action="{{ route('user.banks.destroy', $value->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="{{asset('web/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('web/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#campaign').DataTable();
    });
</script>
@endpush