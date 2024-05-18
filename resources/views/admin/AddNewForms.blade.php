@extends('admin.layouts.app')
@section('main')
    <link href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css" />


    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE --><br>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add College</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="clg">Enter College Name</label>
                                <form method="POST" id="addClg">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="clg_id">
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" name="clg_full_name" class="form-control" id="full_clg"
                                                placeholder="College Full Name" required />
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="clg_short_name" class="form-control" id="short_clg"
                                                placeholder="College Short Name" required />
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="submit" data-type="addclg_btn"
                                                    class="btn btn-block bg-gradient-primary rounded-pill"></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add Department</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <form method="post" id="addDep">
                                @csrf
                                <input type="hidden" value="" name="id" id="dep_id">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select College</label>
                                        <select class="form-control select2" name="clg_id" id="clg_drop_dep"
                                            style="width: 100%;">
                                            <option selected disabled>Select</option>
                                            @foreach ($clgs as $clg)
                                                <option value="{{ $clg->id }}">{{ $clg->short_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="clg">Enter Department Name</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" name="full_dep" class="form-control" id="fulldep"
                                                placeholder="Dep Full Name" required />
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="short_dep" class="form-control" id="shortdep"
                                                placeholder="Dep Short Name" required />
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit"
                                                    class="btn btn-block bg-gradient-primary btn-sm">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <small>Remeber: if Data already exiest then it will update </small>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add Assignment</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('addass') }}" enctype="multipart/form-data" id="submit_ass">
                            @csrf
                            <div class="col-md-6">
                                <input type="hidden" value="" name="id" id="ass_id">
                                <div class="form-group">
                                    <label>Select College</label>
                                    <select class="form-control select2" name="clg_id" id="clg_drop" style="width: 100%;">
                                        <option selected disabled>Select</option>
                                        @foreach ($clgs as $clg)
                                            <option value="{{ $clg->id }}">{{ $clg->short_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Department</label>
                                    <select class="form-control select2" name="dep_id" id="ass_dep_drop"
                                        style="width: 100%;" required>
                                        <option selected disabled>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="clg">Enter Assignment Title</label>
                                            <input type="text" name="ass_title" class="form-control" id="a_title"
                                                placeholder="Title" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="clg">Enter Sem with Year</label>
                                            <input type="text" name="ass_sem" class="form-control" id="ass_sem"
                                                placeholder="Sem 20xx-xx" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="clg">Type</label>
                                            <select class="form-control" name="ass_type" id="ass_type">
                                                <option disabled selected>Select</option>
                                                <option value="Practical">Practical</option>
                                                <option value="Theory">Theory</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="clg">Enter Assignment Description</label>
                                    <textarea class="form-control" id="ass_dec" name="ass_dec" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-12" for="url">Enter URL</label>
                                    <div class="col-12 d-flex align-items-center">
                                        <input type="url" id="url" name="url" class="form-control col-5"
                                            placeholder="Enter Url" name="file_upload" />
                                        <span class="ml-5">OR</span>
                                        <input type="file" name="ass_file" class="ml-5" name="url"
                                            class="ml-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end align-items-end">
                                    <button type="submit" class="btn btn-block bg-gradient-primary btn-sm">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Show Lists</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table width="100%" id="myTable">
                        <thead>
                            <th>
                                Clg
                            </th>
                            <th>
                                Dep
                            </th>
                            <th>
                                Sem(year)
                            </th>
                            <th>
                                Ass Title
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($assignment as $ass)
                                <tr>
                                    <td>{{ $ass->clg->short_name }}</td>
                                    <td>{{ $ass->dep->short_name }}</td>
                                    <td>{{ $ass->year }}</td>
                                    <td>{{ $ass->title }}</td>
                                    <td>{{ $ass->type }}</td>
                                    <td>
                                        <button class="btn btn-primary" data-id="{{ $ass->id }}"
                                            id="detailUpdate"><i class="fas fa-arrow-alt-circle-up"
                                                aria-hidden="true"></i></button>
                                        <button class="btn btn-danger" data-id="{{ $ass->id }}" id="delete"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                </div>
            </div>
            <!-- /.card -->
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@section('script')
    {{-- modal --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete?Are You Sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="deleteThing">
                    @csrf
                    <input type="hidden" name="ass_id" id="modal_ass_id"/>
                    <div class="modal-body">
                        <p>Select Which Things You want to delete</p>
                        <div class="form-group">
                            <input type="checkbox" name="ass" id="ass" /><label for="ass">This
                                Assignment</label><br>
                            <input type="checkbox" name="dep" id="dep" /><label for="dep">This
                                Department</label><br>
                            <input type="checkbox" name="clg" id="clg" /><label for="clg">This
                                College</label>
                        </div>
                        <small>Remember:- if any assiginemnt/department/college assosiated with any one then it will be not
                            delete</small>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Summernote -->
    {{-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    <script>
        var editor;
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            let table = new DataTable('#myTable');
            @if (session('message'))
                toastr.success('Opration Successfull.');
            @endif


            //if ass submit form drop down select
            $('#clg_drop').on('change', function() {
                $.ajax({
                    url: "{{ route('getdep') }}",
                    type: "get",
                    data: {
                        'clg_id': $(this).val(), // Retrieve the selected value of #clg_drop
                    },
                    success: function(res) {
                        res = $.parseJSON(res);
                        $('#ass_dep_drop').empty();
                        $('#ass_dep_drop').append(`<option selected disabled>Select</option>`);
                        $.each(res.deps, function(index, dep) {
                            $('#ass_dep_drop').append(
                                `<option value="${dep['id']}">${dep['short_name']}</option>`
                            );
                        });
                    },
                    error: function(err) {
                        alert('Something went wrong!!');
                        console.log(err);
                    }
                });
            });

            //add College
            $('#addClg').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('addclg') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        res = $.parseJSON(res);
                        console.log(res.mess);
                        if (res.mess == 'success') {
                            $('#addClg')[0].reset();
                            toastr.success('Added Successfully.');
                        } else {
                            toastr.info('Alert!! ' + res.mess);
                        }
                    },
                    error: function(err) {
                        toastr.error('Something Want Wrong!!!')
                    }
                });
            });

            // add dep
            $('#addDep').on('submit', function(e) {
                e.preventDefault();
                var clg = $('#clg_drop_dep').select2('data')[0]['id'];
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('add_dep') }}",
                    type: "post",
                    data: formData,
                    success: function(res) {
                        res = $.parseJSON(res);
                        console.log(res);
                        if (res.mess == 'success') {
                            $('#addDep')[0].reset();
                            toastr.success('Added Successfully.');
                        } else {
                            toastr.info('Alert!! ' + res.mess);
                        }
                    },
                    error: function(err) {
                        toastr.error('Something Want Wrong!!!')
                        console.log(err);
                    }
                });
            });

            // Update Details
            $(document).on('click', '#detailUpdate', function() {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('getFromData') }}",
                    type: "GET",
                    data: {
                        'id': id,
                    },
                    success: function(res) {
                        res = $.parseJSON(res);
                        console.log(res);

                        $('#ass_dec').summernote('destroy');

                        $('#url').val(res.link);
                        $('#ass_id').val(res.id);
                        $('#clg_id').val(res.clg.id);
                        $('#dep_id').val(res.dep.id);

                        $('#full_clg').val(res.clg.full_name);
                        $('#short_clg').val(res.clg.short_name);

                        $('#clg_drop').val(res.clg_id);
                        $('#clg_drop').val(res.clg_id).trigger('change.select2');
                        $('#clg_drop').trigger('change');

                        $('#ass_type').val(res.type);
                        $('#ass_type').select2();

                        $('#clg_drop_dep').val(res.clg_id);
                        $('#clg_drop_dep').select2();

                        // editor.destroy().catch( error => {
                        //     console.log( error );
                        // } );

                        // $('#ass_dec').empty();
                        // $('#ass_dec').append(res.dec);
                        $('#a_title').val(res.title);
                        $('#ass_sem').val(res.year);
                        $('#fulldep').val(res.dep.full_name);
                        $('#shortdep').val(res.dep.short_name);
                        $('#ass_dec').val(res.dec);
                        setTimeout(() => {
                            $('#ass_dep_drop').val(res.dep_id);
                            $('#ass_dep_drop').select2();
                            ckeditor();
                        }, 200);
                    },
                    error: function(err) {}
                });
            });
            $(document).on('click', '#delete', function() {
                $('#modal-default').modal('show');
                alert($(this).attr('data-id'));
                $('#modal_ass_id').val($(this).attr('data-id'));
            });
            $(document).on('submit', '#deleteThing', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{route('deleteass')}}",
                    type: "DELETE",
                    data: formData,
                    success:function(res){
                        res = $.parseJSON(res);
                        if(res.type == 'success'){
                            $('#modal-default').modal('hide');
                            toastr.success(res.mesage);
                        }else{
                            $('#modal-default').modal('hide');
                            toastr.error(res.mesage);
                        }
                    },
                    error:function(err){
                        toastr.error("Something Want wrong Please Refresh the page and try again!");
                        console.log(err);
                    }
                });
            });
        });

        function ckeditor() {
            // ClassicEditor
            // .create(document.querySelector('#ass_dec'), {
            //     // plugins: [ Image ],
            //     ckfinder: {
            //         uploadUrl: "{{ asset('news/connector') }}?_token={{ csrf_token() }}&command=QuickUpload&type=Files&responseType=json",
            //     }
            // })
            // .then(editor => {
            //     window.editor = editor;
            // })
            // .catch(error => {
            //     console.error(error);
            // });

            // Summernote
            $('#ass_dec').summernote();

        }
        ckeditor();
    </script>
@endsection
