@extends('layouts.master')
@section('title','Partners')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Partners
                        </h3>
                    </div>
                </div>

                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('admin.partners.create') }}"
                               class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add Partner</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="m-portlet__body">

                <div class="box">
                    <div class="col-md-12">
                        <div class="box-body">
                            <form action="{{ route('admin.partners.export') }}" method="post" id="form-data">
                                @csrf
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <button type="submit" id="download_list"
                                                 style="float: right;margin-bottom: 10px;"
                                                class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air"><span>
                                                        <i class="la la-download"></i>
                                                        <span>Export</span>
                                                    </span>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="responsiveTable">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                        <tr>

                            <th> Sr No</th>
                            <th> Full Name</th>
                            <th> Email</th>
                            <th> Mobile Number</th>
                            <th> CNIC</th>
                            <th> Role</th>
                            <th> Status</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($users))
                            @foreach($users as $user)
                                @if($user->user_type != 'admin')
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ucfirst($user->fullname())}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td>{{$user->cnic}}</td>
                                        <td>{{ucfirst($user->user_type)}}</td>
                                        <td style="width: 10%;">{{ucfirst($user->status)}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('admin.partners.edit',$user->id)}}"
                                               class="btn btn-sm btn-info pull-left ">Edit</a>
                                            <form method="post"
                                                  action="{{ route('admin.partners.destroy', $user->id) }}"
                                                  id="delete_{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-sm btn-danger m-left"
                                                   href="javascript:void(0)"
                                                   onclick="if(confirmDelete()){ document.getElementById('delete_<?=$user->id?>').submit(); }">
                                                    Delete
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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
                {orderable: false, targets: [7]}
            ],
        });


    </script>
@endpush
