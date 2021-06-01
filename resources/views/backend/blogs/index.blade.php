@extends('layouts.master')
@section('title','Blogs')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Blogs
                        </h3>
                    </div>
                </div>

                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('admin.blogs.create') }}"
                               class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add Blogs</span>
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
                            <th> Name</th>
                            <th> Author Name</th>
                            <th> Categories</th>
                            <th> Tags</th>
                            <th> Features</th>
                            <th> Order</th>
                            <th> Status</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($blogs))
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ucfirst($blog->name)}}</td>
                                    <td>{{ucfirst($blog->author_name)}}</td>
                                    <td>
                                        <ul>
                                            @if(!empty($blog->categories) && count($blog->categories) >0)
                                                @foreach($blog->categories as $category)
                                                    <li>
                                                        {{ ucfirst($category->name) }}
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @if(!empty($blog->tags) && count($blog->tags) >0)
                                                @foreach($blog->tags as $tag)
                                                    <li>
                                                        {{ ucfirst($tag->name) }}
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        {{ ucfirst($blog->is_featured) }}
                                    </td>
                                    <td>
                                        {{ $blog->is_order }}
                                    </td>
                                    <td>{{ucfirst($blog->status)}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.blogs.edit',$blog->id)}}"
                                           class="btn btn-sm btn-info pull-left ">Edit</a>
                                        <form method="post" action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                              id="delete_{{ $blog->id }}">
                                            @method('delete')
                                            @csrf
                                            <a class="btn btn-sm btn-danger m-left"
                                               href="javascript:void(0)"
                                               onclick="if(confirmDelete()){ document.getElementById('delete_<?=$blog->id?>').submit(); }">
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
                {orderable: false, targets: [5]}
            ],
        });
    </script>
@endpush
