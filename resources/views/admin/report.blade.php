@extends('admin.layouts.app')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <h4>Open</h4>
            @php $count=0; @endphp
            @foreach ($opens as $open)
            @php $count++; @endphp
                <div class="card card-default" style="padding: 1% 2% 0% 2%;">
                    <div class="card-header">
                        {{-- <lable class="badge badge-danger right">close</lable> --}}
                        <h3 class="card-title badge badge-success"><b>Ticket No</b> #{{$open->id}}</h3>

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
                        <div class="row">
                            <b>Subject</b>
                            <div class="ml-1 form-control col-3">{{$open->title}}</div>
                            <b class="ml-2">Clg.</b>
                            <div class="ml-1 form-control col-3">{{$open->clg->short_name}}</div>
                            <b class="ml-2">Dep.</b>
                            <div class="ml-1 form-control col-3">{{$open->dep->short_name}}</div>
                        </div>
                        <div class="row mt-3 col-12">
                                <b>Sender Name</b>
                                <div class="ml-1 form-control col-3">{{$open->sender_name ?? 'Anonymous' }}</div>
                                <b class="ml-2">Email</b>
                                <div class="ml-1 form-control col-3">{{$open->sender_email ?? 'Not Provided' }}</div>
                        </div>
                        <div class="row">
                            <b>Description</b>
                            <textarea disabled class="form-control" style="height: auto">{{$open->dec}}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button data-id="{{$open->id}}" class="btn btn-danger float-right rounded-pill">Close Ticket</button>
                    </div>
                </div>
            @endforeach
            @if ($count < 1)
                hurreh No Ticket Open!
            @endif
            <h4>Closed</h4>
            @foreach ($closes as $close)
                <div class="card card-default" style="padding: 1% 2% 0% 2%;">
                    <div class="card-header">
                        {{-- <lable class="badge badge-success right">open</lable> --}}
                        <h3 class="card-title badge badge-danger"><b>Ticket No</b> #{{$close->id}}</h3>
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
                        <div class="row">
                            <b>Subject</b>
                            <div class="ml-1 form-control col-3">{{$close->title}}</div>
                            <b class="ml-2">Clg.</b>
                            <div class="ml-1 form-control col-3">{{$close->clg->short_name}}</div>
                            <b class="ml-2">Dep.</b>
                            <div class="ml-1 form-control col-3">{{$close->dep->short_name}}</div>
                        </div>
                        <div class="row">
                            <b>Description</b>
                            <textarea disabled class="form-control" style="height: auto">{{$close->dec}}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-warning float-right rounded-pill">ReOpen Ticket</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- modal --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Confirm To Delete?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <b>If this ticket is resolved or created for the wrong reason, Then only it can be closed.</b>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close Modal</button>
              <button type="button" id="ticket-close" class="btn btn-primary">Close Ticket</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- Toastr -->
<link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
<script>
    $(document).ready(function(){
        $('.fa-minus').trigger('click');
        

        $(document).on('click', '.btn-danger', function(){
            $('#ticket-close').attr('data-id', $(this).attr('data-id'));
            $('#modal-default').modal('show');
        });
        $('#ticket-close').on('click', function(){
            $.ajax({
                url: "{{route('closeTicket')}}",
                type: "PATCH",
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': $(this).attr('data-id'),
                },
                success:function(res){
                    var newres = jQuery.parseJSON(res);
                    if(newres.type == 'success'){
                        toastr.info('Ticket Sussfully closed!!');
                        $('.modal').modal('hide');
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                    else{
                        toastr.warning(newres.message);
                    }
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    });
</script>
@endsection