@extends('layouts.master')
@section('title','Partner Offers')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Partner Offers
                        </h3>
                    </div>
                </div>

                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('admin.offers.create') }}"
                               class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add Offer</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="responsiveTable">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>

                            <th> Sr No</th>
                            <th> Partner Name</th>
                            <th> Net Metering Number</th>
                            <th> Status</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($offers))
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$offer->partner ? ucfirst($offer->partner->fullname()) : ''}}</td>
                                    <td>{{$offer->net_metering}}</td>
                                    <td style="width: 10%;">{{ucfirst($offer->status)}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.offers.edit',$offer->id)}}"
                                           class="btn btn-sm btn-info pull-left ">Edit</a>
                                        <form method="post"
                                              action="{{ route('admin.offers.destroy', $offer->id) }}"
                                              id="delete_{{ $offer->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-danger m-left"
                                               href="javascript:void(0)"
                                               onclick="if(confirmDelete()){ document.getElementById('delete_<?=$offer->id?>').submit(); }">
                                                Delete
                                            </a>
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
@endsection
@push('js')
    <script>
        $("#m_table_1").dataTable({
            "ordering": false,
            "order": [[0, "desc"]],
            "columnDefs": [
                {orderable: false, targets: [5]}
            ],
        });


    </script>
@endpush
