@extends('layouts.admin_scaffold')
@push('title')
Manage Streams Data
@endpush
@push('styles')
<style>
    .dataTables_wrapper .dataTable .btn, .dataTables_wrapper .dataTable .fc button, .fc .dataTables_wrapper .dataTable button, .dataTables_wrapper .dataTable .ajax-upload-dragdrop .ajax-file-upload, .ajax-upload-dragdrop .dataTables_wrapper .dataTable .ajax-file-upload, .dataTables_wrapper .dataTable .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .dataTables_wrapper .dataTable .swal2-styled, .dataTables_wrapper .dataTable .wizard > .actions a, .wizard > .actions .dataTables_wrapper .dataTable a {
        padding: 0.2rem 0.4rem;
    }

</style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Graph</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Count</th>
                                    <th>Date</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($graph as $g)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ isset($g->user) ? $g->user->name : 'N/A' }}</td>
                                        <td>{{ $g->count }}</td>
                                        <td>{{ $g->created_at }}</td>
                                        <td>
                                            <a onClick="return confirm('Do you want to delete graph?');" href="{{ route('admin.stream.deleteStream',['id' => $g->id, 'type' => 'graph']) }}">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $graph->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Streams By Country</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Country</th>
                                    <th>Stream</th>
                                    <th>Date</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($streamsByCountry as $sc)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ isset($sc->country) ? $sc->country->name : 'N/A' }}</td>
                                        <td>{{ isset($sc->user) ? $sc->user->name : 'N/A' }}</td>
                                        <td>{{ $sc->stream }}</td>
                                        <td>{{ $sc->created_at }}</td>
                                        <td>
                                            <a onClick="return confirm('Do you want to delete Stream By Country?');" href="{{ route('admin.stream.deleteStream',['id' => $sc->id, 'type' => 'streamsByCountry']) }}">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $streamsByCountry->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Streams By Number</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Store</th>
                                    <th>Stream</th>
                                    <th>Date</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($streamsByNumber as $sn)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ isset($sn->user) ? $sn->user->name : 'N/A' }}</td>
                                        <td>{{ isset($sn->store) ? $sn->store->name : 'N/A' }}</td>
                                        <td>{{ $sn->stream }}</td>
                                        <td>{{ $sn->created_at }}</td>
                                        <td>
                                            <a onClick="return confirm('Do you want to delete Stream By Number?');" href="{{ route('admin.stream.deleteStream',['id' => $sn->id, 'type' => 'streamsByNumber']) }}">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $streamsByNumber->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Streams By Revenue</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Store</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($streamsByRevenue as $sr)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ isset($sr->user) ? $sr->user->name : 'N/A' }}</td>
                                        <td>{{ isset($sr->store) ? $sr->store->name : 'N/A' }}</td>
                                        <td>{{ $sr->amount }}</td>
                                        <td>{{ $sr->created_at }}</td>
                                        <td>
                                            <a onClick="return confirm('Do you want to delete Stream By Revenue?');" href="{{ route('admin.stream.deleteStream',['id' => $sr->id, 'type' => 'streamsByRevenue']) }}">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $streamsByRevenue->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script type="">
    $(document).ready(function () { $('.table').DataTable(); });
</script>
@endpush
