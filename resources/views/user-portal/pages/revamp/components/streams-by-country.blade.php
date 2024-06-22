<div class="table-responsive border-bottom pb-3 mt-n5">
    <table class="table px-4 mb-0 ">
        <thead>
            <tr>
                <th class="w-75 ps-4">Partner</th>
                <th class="text-right">Streams</th>
            </tr>
        </thead>
        <tbody>
            @forelse(countriesTotals() as $key=>$value)
            <tr>
                <td class="ps-4 text-left">
                    <img src="https://flagcdn.com/w80/{{countryCode($key)}}.png" width="35" class="me-2" alt="">

                    {{$key}}
                </td>
                <td class="text-right">
                    {{$value}}
                </td>
            </tr>
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
                Showing {{count(countriesTotals())}} entries
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
