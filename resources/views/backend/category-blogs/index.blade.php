@extends('layouts.master')
@section('title','Category')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Category
                        </h3>
                    </div>
                </div>

                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('admin.category-blogs.create') }}"
                               class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add Category</span>
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

                            <th> Sr No.</th>
                            <th> Name</th>
                            <th> Slug</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ucfirst($category->name)}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.category-blogs.edit',$category->id)}}"
                                           class="btn btn-sm btn-info pull-left ">Edit</a>
                                        <form method="post"
                                              action="{{ route('admin.category-blogs.destroy', $category->id) }}"
                                              id="delete_{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a \ class="btn btn-sm btn-danger m-left"
                                               href="javascript:void(0)"
                                               onclick="if(confirmDelete()){ document.getElementById('delete_<?=$category->id?>').submit(); }">
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
            "columnDefs": [
                {orderable: false, targets: [3]}
            ],
        });
    </script>
@endpush
