@extends('layouts.portal_revamp_scaffold')
@section('content')
<div class="row  px-lg-4">
    <div class="">
        <div>
            <h2 class="user-name">
                <span>Credit Balance</span>
            </h2>
        </div>
    </div>

    <div class="row  mb-2 pe-0">
        <div class="col-lg-5 col-md-6 mx-auto pe-0">
            <div class="balance text-center p-4">
                <h3>
                    Credit Balance
                    <br>
                    ${{ currentStatus(auth()->user()->id) }}
                </h3>
                <a href="{{route('user.banks.create')}}">
                    <button class="btn btn-primary mt-3">Payout</button>
                </a>

            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body px-0">
                <div class="card-header d-flex justify-content-between bg-transparent border-0 py-0">
                    <p>History</p>
                    <div class="dropdown d-none">
                        <button class="btn btn-secondary bg-transparent border-0" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Last 15 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 45 Days</a></li>
                            <li><a class="dropdown-item" href="#">Last 60 Days</a></li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive mt-n1">
                    <table class="table px-4 mb-0">
                        <tr>
                            <th class="ps-4 w-25">#</th>
                            <th class="w-25">Amount($)</th>
                            <th class="w-25">Description</th>
                            <th class="pe-4 w-25">Date</th>
                        </tr>
                        @forelse ($credit as $index=>$item)
                        <tr>
                            <td class="ps-4 py-3">{{++$index}}</td>
                            <td class="py-3">{{$item->amount}}</td>
                            <td>{{ isset($item->description) ? $item->description : '-' }}</td>
                            <td class="pe-4 py-3">{{getDateFormat($item->date)}}</td>
                        </tr>
                        @empty

                        @endforelse

                    </table>
                </div>

                <div class="row mt-4 mb-2 px-4 d-none">
                    <div class="d-flex justify-lg-content-end justify-content-center align-items-center gap-3">
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
@endsection
