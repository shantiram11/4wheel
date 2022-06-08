@extends('layouts.customer-dashboard')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">My Bookings</h1>
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
                    <h3 class="card-title">Bookings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="bookingsDatatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Booked Date</th>
                            <th>Return Date</th>
                            <th>Total cost</th>
                            <th>Vehicle Owner</th>
                            <th>Pickup Location</th>
                            <th>Return Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                            <th>Booked Date</th>
                            <th>Return Date</th>
                            <th>Total cost</th>
                            <th>Vehicle Owner</th>
                            <th>Pickup Location</th>
                            <th>Return Location</th>
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
@include('customer_dashboard.bookings._shared')
<script>
    $(function(){
        $("#bookingsDatatable").DataTable({

            "serverSide": true,
            "ajax": {
                "url": BASE_URL + '/customer-dashboard/customer-bookings',
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
                { "data": "book_date",},
                { "data": "return_date" },
                { "data": "total_cost"},
                { "data": "vehicle_owner"},
                { "data": "pickup_location"},
                { "data": "return_location"},
                { "data": "booked_by"},
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
            .buttons().container().appendTo('#bookingsDatatable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
