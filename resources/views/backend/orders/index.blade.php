@extends('layouts.master')
@section('title','Customer Orders')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Customer Offers
                        </h3>
                    </div>
                </div>

            </div>

            <div class="m-portlet__body">
                <div class="responsiveTable">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>

                            <th> Sr No</th>
                            <th> Partner Name</th>
                            <th> User Name</th>
                            <th> Proposal Number</th>
                            <th> Proposal Document</th>
                            <th> Order Date</th>
                            <th> Status</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($orders))
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('admin.offers.edit',$order->offer_id)}}">{{$order->partner ? ucfirst($order->partner->fullname()) : ''}}</a>
                                    </td>
                                    <td>{{$order->user ? ucfirst($order->user->fullname()) : ''}}</td>
                                    <td>{{$order->proposal_number }}</td>
                                    <td>
                                        <a href="{{ url('/storage/uploads/proposals/' . $order->id . '/solarnest.pdf' ) }}"
                                           target="_blank">Solarnest.pdf</a></td>
                                    <td>{{ date('d-m-Y',strtotime($order->created_at)) }}</td>
                                    <td style="width: 15%;">
                                        @if($order->status == 'completed')
                                            {{ucfirst($order->status)}}
                                        @else
                                            <select id="status"
                                                    class="form-control update-status @error('status') is-invalid @enderror"
                                                    name="status" autocomplete="status"
                                                    data-order-id="{{$order->id}}">
                                                <option
                                                    value="pending" {{ $order->status == 'pending' ? 'selected'  : '' }}>
                                                    Pending
                                                </option>
                                                <option
                                                    value="confirmed" {{ $order->status == 'confirmed' ? 'selected'  : '' }}>
                                                    Confirmed
                                                </option>
                                                <option
                                                    value="inprogress" {{ $order->status == 'inprogress' ? 'selected'  : '' }}>
                                                    In Progress
                                                </option>
                                                <option
                                                    value="completed" {{ $order->status == 'completed' ? 'selected'  : '' }}>
                                                    Completed
                                                </option>
                                            </select>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <form method="post"
                                              action="{{ route('admin.orders.destroy', $order->id) }}"
                                              id="delete_{{ $order->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-danger m-left"
                                               href="javascript:void(0)"
                                               onclick="if(confirmDelete()){ document.getElementById('delete_<?=$order->id?>').submit(); }">
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
            "order": [[0, "desc"]],
            "columnDefs": [
                {orderable: false, targets: [5,7]}
            ],
        });
        $(document).on('change', '.update-status', function () {

            form = $(this).closest('form');
            node = $(this);
            var status = $(this).val();
            var order_id = $(this).data('order-id');
            var request = {"status": status, "order_id": order_id};
            if (status !== '') {
                $.ajax({
                    type: "GET",
                    url: "{{ route('ajax.update.status') }}",
                    data: request,
                    dataType: "json",
                    cache: true,
                    success: function (response) {
                        if (response.status == "success") {
                            toastr['success']("Order Status Changed Successfully");
                        }
                    },
                    error: function () {
                        toastr['error']("Something Went Wrong.");
                    }
                });
            } else {
                toastr['error']("Please Select Status");
            }

        });


    </script>
@endpush
