@extends('layouts.master')
@section('title','Blogs')
@push('css')
{{--    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">--}}
@endpush


@section('content')

    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                {{--                <h3 class="m-subheader__title ">{{ __('Blogs') }}</h3>--}}
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Add {{ __('Blogs') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="col-lg-12">
                    <div class="m-portlet">
                        <form class="m-form" method="post" action="{{ route('admin.blogs.store') }}" id="create"
                              enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Name') }} <span
                                                    class="mandatorySign">*</span></label>

                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name"
                                                   value="{{ old('name') }}" autocomplete="name">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="slug"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Slug') }} <span
                                                    class="mandatorySign">*</span></label>

                                            <input id="slug" type="text"
                                                   class="form-control @error('slug') is-invalid @enderror"
                                                   name="slug"
                                                   value="{{ old('slug') }}" autocomplete="slug">

                                            @error('slug')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="categories"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Category') }}
                                                <span class="mandatorySign">*</span></label>

                                            <select id="categories"
                                                    class="form-control categories {{ $errors->has('categories') ? '  is-invalid' : '' }}"
                                                    name="categories[]" autocomplete="categories" multiple>
                                                <option value="">Select an option</option>
                                                @if(!empty($categories))
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}" {{ (old('categories') == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @if($errors->has('categories'))
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('categories') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tags"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Tags') }}
                                                <span class="mandatorySign">*</span></label>

                                            <select id="tags"
                                                    class="form-control tags {{ $errors->has('tags') ? '  is-invalid' : '' }}"
                                                    name="tags[]" autocomplete="tags" multiple>
                                                <option value="">Select an option</option>
                                                @if(!empty($tags))
                                                    @foreach($tags as $tag)
                                                        <option
                                                            value="{{$tag->id}}" {{ (old('tags') == $tag->id) ? 'selected' : ''}}>{{$tag->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                            @if($errors->has('tags'))
                                                <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('tags') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="summary"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Summary') }}
                                                <span class="mandatorySign">*</span></label>

                                            <textarea id="summary"
                                                      class="form-control @error('summary') is-invalid @enderror"
                                                      name="summary"
                                                      style="height: 200px !important;"
                                                      autocomplete="summary">{{ old('summary') }}</textarea>

                                            @error('summary')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="description"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Description') }}
                                                <span class="mandatorySign">*</span></label>

                                            <textarea id="description"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      name="description"
                                                      style="height: 200px !important;"
                                                      autocomplete="description">{{ old('description') }}</textarea>

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="image"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Image') }} (16:9)
                                                <abbr
                                                    title="Ratio is 16 means Width and 9 means Height">?</abbr>
                                                <span
                                                    class="mandatorySign"> *</span></label>
                                            <input value="{{old('image')}}" type="file"
                                                   class="form-control @error('image') is-invalid @enderror"
                                                   onchange="readURL(this)" id="image"
                                                   name="image" style="padding: 9px; cursor: pointer">
                                            <img width="300" height="200" class="img-thumbnail" style="display:none;"
                                                 id="img" src="#"
                                                 alt="your image"/>

                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="status"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Status') }} <span
                                                    class="mandatorySign">*</span></label>

                                            <select id="status"
                                                    class="form-control cities @error('status') is-invalid @enderror"
                                                    name="status" autocomplete="status">
                                                <option value="" {{ (old('status') == '') ? 'selected' : '' }}>Select an
                                                    option
                                                </option>
                                                <option
                                                    value="active" {{ (old('status') == 'active') ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option
                                                    value="inactive" {{ (old('status') == 'inactive') ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>

                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="is_featured"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Is Featured') }}
                                                <span
                                                    class="mandatorySign">*</span></label>

                                            <select id="is_featured"
                                                    class="form-control @error('is_featured') is-invalid @enderror"
                                                    name="is_featured" autocomplete="is_featured">
                                                <option
                                                    value="yes" {{ (old('is_featured') == 'yes') ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                                <option
                                                    value="no" {{ (old('is_featured') == 'no') ? 'selected' : '' }}>
                                                    No
                                                </option>
                                            </select>

                                            @error('is_featured')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="is_order"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Is Order') }}
                                                <span
                                                    class="mandatorySign">*</span></label>

                                            <select id="is_order"
                                                    class="form-control @error('is_order') is-invalid @enderror"
                                                    name="is_order" autocomplete="is_order">
                                                <option
                                                    value="0" {{ (old('is_order') == '0') ? 'selected' : '' }}>
                                                    0
                                                </option>
                                                <option
                                                    value="1" {{ (old('is_order') == '1') ? 'selected' : '' }}>
                                                    1
                                                </option>
                                                <option
                                                    value="2" {{ (old('is_order') == '2') ? 'selected' : '' }}>
                                                    2
                                                </option>
                                                <option
                                                    value="3" {{ (old('is_order') == '3') ? 'selected' : '' }}>
                                                    3
                                                </option>
                                            </select>

                                            @error('is_order')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="author_name"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Author Name') }}
                                                <span
                                                    class="mandatorySign">*</span></label>

                                            <input id="author_name" type="text"
                                                   class="form-control @error('author_name') is-invalid @enderror"
                                                   name="author_name"
                                                   value="{{ old('author_name') }}" autocomplete="author_name">

                                            @error('author_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="meta_title"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Meta Title') }} </label>

                                            <input id="meta_title" type="text"
                                                   class="form-control @error('meta_title') is-invalid @enderror"
                                                   name="meta_title"
                                                   value="{{ old('meta_title') }}" autocomplete="meta_title">

                                            @error('meta_title')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="meta_keywords"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Meta Keywords') }}</label>

                                            <input id="meta_keywords" type="text"
                                                   class="form-control @error('meta_keywords') is-invalid @enderror"
                                                   name="meta_keywords"
                                                   value="{{ old('meta_keywords') }}" autocomplete="meta_keywords">

                                            @error('meta_keywords')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <label for="meta_description"
                                                   class="col-md-4 col-form-label text-md-left">{{ __('Meta Description') }}</label>

                                            <textarea id="meta_description"
                                                      class="form-control @error('meta_description') is-invalid @enderror"
                                                      name="meta_description"
                                                      value="{{ old('meta_description') }}"
                                                      autocomplete="meta_description"></textarea>

                                            @error('meta_description')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit text-md-right">
                                <div class="m-form__actions m-form__actions">
                                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-info">Back</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('SAVE') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Portlet-->
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        //Initialize Select2 Elements
        $('.categories').select2();
        $('.tags').select2();
        $('#name').focusout(function () {

            var name = $(this).val();
            name = name.replace(/\s+/g, '-').toLowerCase();

            $('#slug').val(name);
        })
    </script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                fontSizes: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['fontsize', 'color']],
                    ['font', ['fontname']],
                    ['para', ['paragraph', 'ul', 'ol']],
                    ['insert', ['link', 'image', 'doc', 'video', 'picture', 'hr']], // image and doc are customized buttons
                    ['misc', ['codeview', 'fullscreen']],
                ],
                height: 400,
                dialogsInBody: true,
                callbacks: {
                    onInit: function () {
                        $('body > .note-popover').hide();
                    }
                },
            });
        });
    </script>
@endpush
