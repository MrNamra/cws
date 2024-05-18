@extends('admin.layouts.app')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE --><br>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add News</h3>
                </div>
                <form action="{{ route('postnewscontent') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $news->id ?? '' }}">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>News Title</label>
                                                <input type="text" name="newstitle" class="form-control" id="newsTitle"
                                                    placeholder="News Title" value="{{ !empty($news) ? $news->title : '' }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>News Short Description</label>
                                                <input type="text" name="shortDec" class="form-control" id="dep"
                                                    placeholder="Enter News Short Discription" value="{{ !empty($news) ? $news->short_dec : '' }}" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter News Description</label><br>
                                    <textarea name="dec" id="newsdec">{{ !empty($news) ? $news->dec : '' }}</textarea>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="col-12">
                            <button class="btn btn-success col-12">{{ (empty($news) ? 'Post' : 'Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @error('id')
        <div class="error">{{ $message }}</div>
    @enderror
    @error('newstitle')
        <div class="error">{{ $message }}</div>
    @enderror
    @error('dec')
        <div class="error">{{ $message }}</div>
    @enderror
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#newsdec').summernote();
        });
        @if (session('message'))
            toastr.success('{{ session('message') }}');
        @endif
    </script>
    <style>
        .ck-powered-by {
            display: none;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 200px;
        }
    </style>
@endsection
