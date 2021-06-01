@extends('layouts.master')
@section('title','Profile')
@push('css')
    <style>
        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            background-color: #fcefe1;
            opacity: 1;
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
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 bannerFields">
                                                <h4>Edit Profile</h4>
                                                <form action="{{ route('admin.update.user.profile') }}"
                                                      method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="first_name">First Name</label>
                                                                <input type="text" id="first_name" name="first_name"
                                                                       class="form-control"
                                                                       value="{{ $user->first_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="last_name">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                       name="last_name" id="last_name"
                                                                       value="{{ $user->last_name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" id="email"
                                                                       readonly
                                                                       name="email" value="{{ $user->email }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" class="form-control disabledDiv"
                                                                       name="address" id="address"
                                                                       value="{{ $user->address }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="cnic">CNIC </label>
                                                                <input type="text" class="form-control " name="cnic"
                                                                       id="cnic" value="{{ $user->cnic }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                                            <a href="{{ route('admin.profile.index') }}"
                                                               class="btn buttonMain hvr-bounce-to-right">
                                                                Cancel
                                                            </a>
                                                            <button type="submit"
                                                                    class="btn buttonMain hvr-bounce-to-right">Save
                                                                Changes
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
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

    </script>
@endpush
