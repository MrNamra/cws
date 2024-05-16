@extends('admin.layouts.app')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE --><br>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add News</h3>
                </div>
                <form action="{{route('postnewscontent')}}" method="post" enctype="multipart/form-data" >
                    @csrf
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
                                                placeholder="News Title" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>News Short Description</label>
                                            <input type="text" name="shortDec" class="form-control" id="dep"
                                                placeholder="Enter News Short Discription" required />
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
                                <textarea name="dec" id="newsdec"></textarea>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success col-12">Post</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function(){
            $('#newsdec').summernote();
            // ClassicEditor
            // .create(document.querySelector('#newsdec'), { // Add closing parenthesis here
            //     ckfinder: {
            //         uploadUrl: "{{asset('news/connector')}}?_token={{csrf_token()}}&command=QuickUpload&type=Files&responseType=json",
            //     }
            // })
            // .catch(error => {
            //     console.error(error);
            // });
        });
        @if(session('message'))
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
