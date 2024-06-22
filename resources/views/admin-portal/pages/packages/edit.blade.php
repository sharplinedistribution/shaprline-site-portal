@extends('layouts.admin_scaffold')
@push('title')
- {{isset($title) && !empty($title)  ? $title : '-'}}  
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4 w-100 align-items-center">
                        <div class="col-md-6">
                            <h3 class="card-title mb-0">Edit Packages</h3>
                        </div>
                    </div>
                    <form class="w-100 d-block" action="{{route('admin.packages.update', $edit->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row w-100">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alTitle">Name</label>
                                    <input type="text" name="name" class="form-control" id="alTitle" value="{{isset($edit->name) && !empty($edit->name) ? $edit->name : ''}}" placeholder="Enater plan name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alTitle">Price</label>
                                    <input type="number" name="price" class="form-control" id="alTitle" value="{{isset($edit->price) && !empty($edit->price) ? $edit->price : ''}}" placeholder="">
                                </div>
                            </div>

                            <div class="row input-group-list w-100 m-0">
                                <div class="col-lg-12">
                                    <label for="artist">Feature</label>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <input type="text" name="feature[]" id="" class="form-control" placeholder="Feature"  >
                                    </div>
                                </div>

                                <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 ">
                                    <div class="form-group d-flex align-items-center form-remove-add">
                                        <a href="#" class="addInput">+</a>
                                    </div>
                                </div>

                            </div>
                            <div class="w-100" id="main_div">
                                @if(!empty($edit->details))
                                @foreach($edit->details as $index=>$value)
                                <div class="row input-group-list w-100 m-0">
                                    <div class="col-lg-12">
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <input type="text" name="feature[]" id="" class="form-control" value="{{isset($value->feature) && !empty($value->feature) ? $value->feature : ''}}" placeholder="Feature">
                                        </div>
                                    </div>

                                    <div class="col-lg-1 d-flex align-items-center justify-content-between p-0 ">
                                        <div class="form-group d-flex align-items-center form-remove-add">
                                            <a href='#' class='removeInput'>x</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn  btn-lg" style="background-color:#fbda03; color: #333;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script>
    $(document).ready(function() {

        var count = 0;
        // append new Row
        $(".addInput").click(function() {
            count++;
            var append = "<div class='row input-group-list w-100 m-0'>" +
                "<div class='col-lg-7'>" +
                "<div class='form-group'>" +
                "<input type='text' name='feature[]' id='' class='form-control' placeholder='Feature'  >" +
                "</div>" +
                "</div>" +
                "<div class='col-lg-1 d-flex align-items-center justify-content-between p-0 '>" +
                "<div class='form-group d-flex align-items-center form-remove-add'>" +
                "<a href='#' class='removeInput'>x</a>" +
                "</div>" +
                "</div>" +
                "</div>";

            $("#main_div").append(append);




        });

        $(document).on('click', '.removeInput', function() {
            // console.log($(this).parent().parent().parent());
            $(this).parent().parent().parent().remove();
        });

    });
</script>


@endpush