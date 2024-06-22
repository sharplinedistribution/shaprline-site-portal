@extends('layouts.portal_revamp_scaffold')
@push('styles')
<style>
    .profile-pic {
        width: 200px;
        max-height: 200px;
        display: inline-block;
    }


    .circle {
            border-radius: 100% !important;
            overflow: hidden;
            width: 50px;
            height: 50px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
            top: 0px;
    }


    img {
            max-width: 100%;
            height: auto;
        }
        .p-image {
        position: absolute;
        top: 160px;
        right: 238px;
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }


    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
      background-color: #FFF301;
       cursor: pointer;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
@endpush
@section('content')
<div class="row mt-2 px-lg-4">
    <div class="col-12 text-left mb-3">
       <h2 class="page-title">Artists</h2>
    </div>
    <div class="col-12">
        <form action="">
            <div class="position-relative search-icon d-none">
                <input type="text" placeholder="Search Artist" class="form-control search" onKeyup="searchArtist($(this))">
                <i class="fa fa-search"></i>
            </div>

        </form>
    </div>
    <div class="table-responsive">
        <table id="table" class="table  table-hover mt-5" width="100%">
            <thead>
                <tr>
                    <th width="5%">Name</th>
                    <th width="45%">&nbsp;</th>
                    <th width="50%">Artist ID</th>
                </tr>
            </thead>
            <tbody id="searchContent">
                @forelse ($artists as $artist)
                    <tr onClick=" return window.location.href= '{{ route('user.rightsHolders.detail',$artist->id) }}'">
                        <td >
                            <div class="circle">
                                @if(isset($artist->avatar))
                                <img class="profile-pic" src="{{ asset(config('upload_path.artist_avatar').$artist->avatar) }}">
                                @else
                                <img class="profile-pic" src="{{ asset('assets/portal-revamp/img/svg/profile-picture-placeholder-white.svg') }}">
                                @endif
                            </div>
                        </td>
                        <td>
                            <h5 class="mt-2">{{ $artist->name }}</h5>
                        </td>
                        <td><p class="mt-2">{{ ($artist->id + 10000 ) }}</p></td>
                    </tr>
                @empty

                @endforelse

            </tbody>

        </table>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
    <script>

        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 100,
                "paging" : false,
            });
            $("#table_paginate").hide();
        });
        function searchArtist(elm){
            var query = elm.val();
            $.ajax({
                type : "GET",
                url  : "",
                data : {
                    'query' : query,
                },
                success : function(res){

                },
                error   : function(res){

                }
            });
            // searchContent
        }
    </script>
@endpush
