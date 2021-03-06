@extends('layouts.master')
@section('title','Profile')
@push('css')
    <style>
        .profile-image {
            width: 85% !important;
            /*height: 120px;*/
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="">
                <div class="">
                    <div class="m-portlet">
                        <div class="container">
                            <div class="m-portlet__body">
                                <div class="serviceBoxMain">
                                    <div class="serverInnerDetails">
                                        <div class="row ">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-right mt-20">
                                                <a href="{{ route('admin.update.password') }}"
                                                   class="btn buttonMain hvr-bounce-to-right">Reset
                                                    Password</a>
                                                <a href="{{ route('admin.update.phone') }}"
                                                   class="btn buttonMain hvr-bounce-to-right">Update
                                                    Phone
                                                    Number</a>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 bannerFields">
                                                <form method="post" enctype="multipart/form-data" id="submit-image"
                                                      action="javascript:void(0)">
                                                    <h4>Account Profile &nbsp;
                                                        @csrf
                                                        <input type="hidden" name="user_id" id="user_id"
                                                               value="{{ $user->id}}">

                                                        <label for="image">
                                                            <img src="{{ asset('frontend/images/fileupload.png') }}"
                                                                 style="width: 40px;cursor: pointer;"/>
                                                        </label>

                                                        <input type="file" name="image" id="image" style="display: none"
                                                               onchange="readURL(this);"
                                                               accept=".png, .jpg, .jpeg"/>

                                                    </h4>
                                                </form>
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td><img class="profile-image"
                                                                 src="{{asset("/uploads/user_profiles/".$user->profile_pic)}}"
                                                                 alt="{{$user->profile_pic}}">
                                                        </td>
                                                        <td width="30%"><strong>{{ $user->fullName() }} </strong>
                                                            <span>{{ $user->email ?? '--' }}</span>
                                                            <span>{{ $user->phone_number ?? '--' }}</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h4>General Profile &nbsp; <a
                                                        href="{{ route('admin.profile.edit') }}"
                                                        class=""><i class="fa fa-pencil-alt"></i></a></h4>
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                    <tbody>
                                                    <tr>
                                                        <td><strong>ADDRESS</strong></td>
                                                        <td>{{ $user->address ?? '--' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>CNIC</strong></td>
                                                        <td>{{ $user->cnic ?? '--' }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function readURL(input, id) {
            if (input.files && input.files[0]) {


                var formData = new FormData($('#submit-image')[0]);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.profile.edit.image') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        toastr[response.status](response.message);
                        window.location.reload();
                    },
                    error: function () {
                        toastr['error']("Something Went Wrong.");
                    }
                });

                // reader.readAsDataURL(input.files[0]);
                // }
            }
        }
    </script>
@endpush
