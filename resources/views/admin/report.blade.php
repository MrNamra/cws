@extends('admin.layouts.app')
@section('main')
    <section class="content">
        <div class="container-fluid">
            <h5>Open</h5>
            <div class="card card-default">
                <div class="card-header">
                    {{-- <lable class="badge badge-danger right">close</lable> --}}
                    <h3 class="card-title badge badge-success"><b>Ticket No</b> #123</h3>

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
                        <div class="ml-1 form-control col-3">Here Subject</div>
                        <b class="ml-2">Clg.</b>
                        <div class="ml-1 form-control col-3">Here Clg Short Name</div>
                        <b class="ml-2">Dep.</b>
                        <div class="ml-1 form-control col-3">Dep Short Name</div>
                    </div>
                    <div class="row mt-3 col-12">
                            <b>Sender Name</b>
                            <div class="ml-1 form-control col-3">Here Subject</div>
                            <b class="ml-2">Email</b>
                            <div class="ml-1 form-control col-3">Here Clg Short Name</div>
                    </div>
                    <div class="row">
                        <b>Description</b>
                        <textarea disabled class="form-control" style="height: auto">Here Full Description asdasasd sdsdsa Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias iusto quasi aut labore, ipsam voluptatem culpa nemo provident ab dolore. Eaque numquam illo nihil. Illo, hic consequatur cumque blanditiis, facilis incidunt nobis ea odio officiis possimus, nam nostrum molestiae voluptatum nihil minima expedita eius. Ab repellat ea a, obcaecati nihil odio incidunt.</textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-danger float-right rounded-pill">Close Ticket</button>
                </div>
            </div>
            <h5>Closed</h5>
            <div class="card card-default">
                <div class="card-header">
                    {{-- <lable class="badge badge-success right">open</lable> --}}
                    <h3 class="card-title badge badge-danger"><b>Ticket No</b> #123</h3>
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
                        <div class="ml-1 form-control col-3">Here Subject</div>
                        <b class="ml-2">Clg.</b>
                        <div class="ml-1 form-control col-3">Here Clg Short Name</div>
                        <b class="ml-2">Dep.</b>
                        <div class="ml-1 form-control col-3">Dep Short Name</div>
                    </div>
                    <div class="row">
                        <b>Description</b>
                        <textarea disabled class="form-control" style="height: auto">Here Full Description asdasasd sdsdsa Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias iusto quasi aut labore, ipsam voluptatem culpa nemo provident ab dolore. Eaque numquam illo nihil. Illo, hic consequatur cumque blanditiis, facilis incidunt nobis ea odio officiis possimus, nam nostrum molestiae voluptatum nihil minima expedita eius. Ab repellat ea a, obcaecati nihil odio incidunt.</textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button class="btn btn-warning float-right rounded-pill">ReOpen Ticket</button>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.fa-minus').trigger('click');
    })
</script>
@endsection