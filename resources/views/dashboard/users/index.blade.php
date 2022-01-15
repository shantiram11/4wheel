@extends('dashboard.index')
@section('content')
<div class="container page__container">
    <div class="card">

        <div class="table-responsive">

            <div class="m-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="search-form search-form--light">
                            <input type="text"
                                   class="form-control search table-search"
                                   placeholder="Search">
                            <button class="btn"
                                    type="button"
                                    role="button"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('user.create')}}" class="btn btn-primary ml-1">Add</a>
                    </div>
                </div>
            </div>

            <table class="table mb-0 thead-border-top-0 table-striped user-Datatable">
                <thead>
                    <tr>
                        <th style="width: 18px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input js-toggle-check-all"
                                       data-target="#products"
                                       id="customCheckAll">
                                <label class="custom-control-label"
                                       for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                            </div>
                        </th>

                        <th class="">#ID</th>
                        <th class="">Name</th>
                        <th class="">Email</th>
                        <th class="">Password</th>
                        <th class="">Role ID</th>
                        <th class="">Actions</th>
                        {{-- <th style="width: 100px; text-align: right;">
                            <div class="dropdown pull-right">
                                <a href="#"
                                   data-toggle="dropdown"
                                   class="dropdown-toggle">Bulk</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)"
                                       class="dropdown-item"><i class="material-icons icon-18pt mr-1">work</i> Set Price</a>
                                    <a href="javascript:void(0)"
                                       class="dropdown-item"><i class="material-icons icon-18pt mr-1">archive</i> Archive</a>
                                </div>
                            </div>
                        </th> --}}
                    </tr>
                </thead>
                <tbody class="list"
                       id="products">

                </tbody>
            </table>
        </div>

        <div class="card-body text-right">
            15 <span class="text-muted">of 25</span> <a href="#"
               class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
        </div>

    </div>
    </div>
    @endsection
    @section('page_level_script')
    @include('dashboard.users._shared')
    <script>
            $(document).ready(function($) {
                let table = $('#userDatatable').DataTable({
                    "serverSide": true,
                    "ajax": {
                        "url": BASE_URL + '/dashboard/user',
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
                    "columns": [{
                        "data": "name",
                    },
                        {
                            "data": "email"
                        },
                        {
                            "data": "role"
                        },
                        {
                            "data": "created_at"
                        },
                        {
                            "data": "action",
                            "searchable": false,
                            "orderable": false
                        }
                    ],
                    "rowId": 'id',
                    "order": [
                        [0, "asc"]
                    ],
                    // "lengthMenu": [[100, 200, 500, -1], [ 100, 200, 500, 'All']],
                    "lengthMenu": [
                        [25, 50, 100, 500],
                        [25, 50, 100, 500]
                    ],
                    "pageLength": 25,
                    "deferRender": true,
                    fixedHeader: true,
                    // "pagingType": "simple",
                    "searchable": false,
                    "language": {
                        "emptyTable": " "
                    },
                    "bDestroy": true

                });
                $('.table-search').on('keyup', function() {
            // if(this.value.length > 2){
                table.search(this.value).draw();
            // }
        });
            });
        </script>
@endsection
