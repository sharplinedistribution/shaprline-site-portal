@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}
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
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title">ADD NEW ARTIST</h4>
                    @isset($artist)
                    <form method="POST" action="{{route('admin.artist.update', ['id' => $id, 'artist_id' => $artist->id])}}">
                    @else
                    <form method="POST" action="{{route('admin.artist.store', $id)}}">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label>Artist Name</label>
                                <input type="text" class="form-control" name="name" required value="{{isset($artist) ? $artist->name : null}}">
                            </div>
                            <div class="col-md-4">
                                <label>Spotify Profile Link</label>
                                <input type="url" class="form-control" name="spotify_profile_link" value="{{isset($artist) ? $artist->spotify_profile_link : null}}">
                            </div>
                            <div class="col-md-4">
                                <label>Apple Music Profile Link</label>
                                <input type="url" class="form-control" name="apple_music_profile_link" value="{{isset($artist) ? $artist->apple_music_profile_link : null}}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary" style="float:right">SUBMIT</button>&nbsp;&nbsp;
                                <a href="{{route('admin.artist.index',$id)}}"><button type="button" class="btn btn-danger" style="float:right">CANCEL</button></a>&nbsp;
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">{{isset($title) && !empty($title)  ? $title : '-'}}</h4>
                    <div class="table-responsive mt-4">
                        <table class="table dataTables_wrapper dt-bootstrap4 no-footer" id="example">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Spotify Profile </th>
                                    <th> Apple Music Profile </th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($artists as $index=>$artist)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$artist->name}}</td>
                                        <td>{{$artist->spotify_profile_link}}</td>
                                        <td>{{$artist->apple_music_profile_link}}</td>
                                        <td>
                                            <a href="{{ route('admin.artist.edit',['id' => $id,'artist_id' => $artist->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        </td>
                                        
                                    </tr>
                                @empty
                                @endforelse
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
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<script src="{{asset('admin/js/settings.js')}}"></script>
<script src="{{asset('admin/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/js/dashboard.js')}}"></script>
<!-- End custom js for this page -->
<!-- Adding Charst to sharplinedistro -->
<script src="{{asset('admin/js/chart.js')}}"></script>
<script type="">
    $(document).ready(function () { $('#example').DataTable(); });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
@endpush
