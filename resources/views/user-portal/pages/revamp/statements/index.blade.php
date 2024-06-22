@extends('layouts.portal_revamp_scaffold')
@push('title')
    Statements -
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
@endpush
@section('content')
<div  class="row px-lg-4 mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body px-0">

                <div class="col-12 px-3">
                    <p class="tab-title mt-0 mb-4 ms-2">Statements List</p>
                </div>
                <div class="table-responsive">
                    <table id="example" class="datatables-basic table">
                        <thead>
                          <tr>
                            <th class="ps-4">#</th>
                            <th>Statement</th>
                            <th>Royalty Collection</th>
                            <th class="pe-4 text-nowrap">Download Statement</th>
                          </tr>
                        </thead>
                        <tbody>

                        @if(!empty($records) && $records->count()>0)
                        @foreach($records as $index=>$value)

                            <tr>
                                <td  class="ps-4 py-4"> {{++$index}} </td>
                                <td class="py-4">{{isset($value->statement_month) && !empty($value->statement_month) ? date('M Y' , strtotime($value->statement_month)) : '-'}}</td>
                                <td class="py-4">
                                    {{isset($value->collection_start_date) && !empty($value->collection_start_date) ? getDateFormat($value->collection_start_date) : '-'}}
                                    -
                                    {{isset($value->collection_end_date) && !empty($value->collection_end_date) ? getDateFormat($value->collection_end_date) : '-'}}

                                </td>
                                <td class=" pe-4 py-4 text-nowrapr">
                                    @if(statementExcel($value->id) != false)
                                            <a href="javascript:;" onClick="test('{{$value->id}}')" class="download-btn me-2">
                                                <i class="fa-solid fa-arrow-down me-2"></i> CSV
                                            </a> &nbsp;
                                            <div class="modal fade" id="statement_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="background: #151515;">

                                                    <div class="modal-body">
                                                        <h4 class="text-center">Revenue Report</h4>
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                    <td>#</td>
                                                                    <td>File</td>
                                                                    <td>Action</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse(statementExcel($value->id) as $index=>$file)
                                                                    <tr>
                                                                        <td>{{++$index}}</td>
                                                                        <td ><a href="{{asset(config('upload_path.csv') . $file->file)}}" style="color:#FFF301">{{$file->file}}</a></td>
                                                                        <td>
                                                                            <a href="{{asset(config('upload_path.csv') . $file->file)}}"  class="download-btn me-2">
                                                                                <i class="fa-solid fa-arrow-down me-2"></i> Download
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                @endforelse
                                                            </tbody>



                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="closeModal('{{$value->id}}')">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if(!empty($value->pdf))
                                        <a href="{{asset(config('upload_path.pdf') . $value->pdf)}}" download="" class="download-btn me-2">
                                            <i class="fa-solid fa-arrow-down me-2"></i> PDF
                                        </a>
                                        @endif


                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                      </table>
                </div>
                <div class="row mt-4 mb-2 px-lg-4 d-none">
                    <div class="d-sm-flex justify-content-between align-items-center text-center">
                        <div>
                            <p class="m-0">
                                Showing 1 to 1 of 1 entries
                            </p>
                        </div>
                        <div class="d-flex gap-3 align-items-center justify-content-center mt-sm-0 mt-3">
                            <span class="pagination-btn d-block">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                            <span>1/12</span>
                            <span class="pagination-btn d-block">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script>
    function test(id){
        $("#statement_"+id).modal('show');
    }
    function closeModal(id){
        $("#statement_"+id).modal('hide');

    }
      $(document).ready(function() {
    $('#example').DataTable();

});
</script>
@endpush
