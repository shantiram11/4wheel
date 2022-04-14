@extends('layouts.dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">photos</h1>
            </div>
            <div class="col-sm-3">
            <a href="{{route('photos.create')}}" class=""><button class="btn btn-block bg-gradient-primary btn-lg">Add photos</button></a>
              </div>
            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">photos Databale</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="photosDatatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Vehicle Number</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>owner</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                            <th>Company Name</th>
                            <th>Vehicle Number</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Owner</th>
                            <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div>
</div>
@endsection
@section('page_level_script')
@include('dashboard.photos._shared')
    <script>
        $(function(){
            $("#photosDatatable").DataTable({

                "serverSide": true,
                    "ajax": {
                        "url": BASE_URL + '/dashboard/photos',
                        "dataType": "json",
                        "type": "GET",
                        "data": {
                            "_token": CSRF_TOKEN
                        },
                        "tryCount" : 0,
                        "retryLimit" : 3,
                        error: function(xhr, ajaxOptions, thrownError) {
                        }
                    },
                    "columns": [
                        { "data": "company_name",},
                        { "data": "vehicle_number" },
                        { "data": "description"},
                        { "data": "location"},
                        { "data": "status"},
                        { "data": "owner"},
                        {
                            "data": "action",
                            "searchable": false,
                            "orderable": false
                        }
                    ],
                    "rowId": 'id',
                    "order": [
                        [1, "asc"]
                    ],
                    // "lengthMenu": [[100, 200, 500, -1], [ 100, 200, 500, 'All']],
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    "pageLength": 25,
                    "deferRender": true,
                    'fixedHeader': true,
                    // "pagingType": "simple",
                    "searchable": false,
                    "language": {
                        "emptyTable": " "
                    },
                    'dom':"<B><'ks-table-entry-header'lf><rt><'ks-table-entry-footer'ip>",
                    // "bDestroy": true,

            "responsive": true,
            // "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            })
            .buttons().container().appendTo('#photosDatatable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
