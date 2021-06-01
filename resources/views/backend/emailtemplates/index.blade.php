@extends('layouts.master')
@section('title','Email Templates')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Email Templates
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
                            <th> Name</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($emails))
                            @foreach($emails as $email)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ucfirst($email->title)}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.emailtemplates.edit',$email->id)}}"
                                           class="btn btn-sm btn-info pull-left ">Edit</a>
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
            "columnDefs": [
                {orderable: false, targets: [2]}
            ],
        });
    </script>
@endpush
