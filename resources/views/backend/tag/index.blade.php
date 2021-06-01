@extends('layouts.master')
@section('title','Tags')
@section('content')

    <div class="m-content">
        <!--Begin::Section-->
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Tags
                        </h3>
                    </div>
                </div>

                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('admin.tag.create') }}"
                               class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add Tag</span>
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

                            <th> Sr NO.</th>
                            <th> Name</th>
                            <th> Slug</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($tags) && count($tags) > 0)
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.tag.edit',$tag->id)}}"
                                           class="btn btn-sm btn-info pull-left ">Edit</a>
                                        <form method="post" action="{{ route('admin.tag.destroy', $tag->id) }}"
                                              id="delete_{{ $tag->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-danger m-left"
                                               href="javascript:void(0)"
                                               onclick="if(confirmDelete()){ document.getElementById('delete_<?=$tag->id?>').submit(); }">
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
