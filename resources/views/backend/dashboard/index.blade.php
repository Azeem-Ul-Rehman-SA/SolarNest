@extends('layouts.master')
@section('title','Dashboard')
@push('css')
    <style>
        .map-image {
            height: 60px;
            width: 60px;
            border-radius: 50px !important;
            margin-right: 15px;
            float: left;
        }

    </style>
@endpush
@section('content')
    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">

            <div class="m-portlet__body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('admin.partners.index') }}">
                            <div class="visual">
                                <i class="fa fa-globe"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                          data-value="{{ $users_count }}">{{ $users_count }}</span>
                                </div>
                                <div class="desc"> Total Partners</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('admin.customers.index') }}">
                            <div class="visual">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                          data-value="{{ $customers_count }}">{{ $customers_count }}</span>
                                </div>
                                <div class="desc">Total Customers</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dashboard-stat-v2 green"
                           href="{{ route('admin.orders.index') }}">
                            <div class="visual">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                          data-value="{{ $orders_count }}">{{ $orders_count }}</span>
                                </div>
                                <div class="desc"> Confirmed/Completed Orders</div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>


        </div>
    </div>
@endsection
@push('js')



@endpush
