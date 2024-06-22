<div class="table-responsive border-bottom pb-3 mt-n5">
    <table class="table px-4 mb-0 ">
        <thead>
            <tr>
                <th class="w-75 ps-4">Partner</th>
                <th class="text-right">Streams</th>
            </tr>
        </thead>
        <tbody>
            @php $count= 0; @endphp
            @forelse(revenueTotals() as $key=>$value)
                @php $validate = validateStoreStatus($key); @endphp
                @if($validate != false)
                    <tr>
                        <td class="ps-4 text-left">
                            <img src="{{ asset('assets/icons/'.$validate)}}" width="35" height="35" alt="" >&nbsp;


                            {{$key}}
                        </td>
                        <td class="text-right">
                            ${{$value}}
                        </td>
                    </tr>
                    @php $count++; @endphp
                @endif
            @empty
            <tr>
                <td colspan="2" class="text-center">No record found</td>
            </tr>
            @endforelse
        </tbody>


    </table>
</div>

<div class="row mt-4 mb-2 px-lg-4">
    <div class="d-sm-flex justify-content-between align-items-center text-center">
        <div>
            <p class="m-0">
                Showing {{$count}} entries
            </p>
        </div>
        <div class="d-flex gap-3 align-items-center justify-content-center mt-sm-0 mt-3 d-none">
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
