<script type="text/javascript">
    const BASE_URL = "{{url('/')}}";
    const CSRF_TOKEN = "{{csrf_token()}}"
</script>

<!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{-- <script src="{{asset('assets/vendor/datatables/FixedHeader/js/fixedHeader.bootstrap5.min.js')}}"></script> --}}

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

<!-- App -->
<script src="{{ asset('assets/js/toggle-check-all.js') }}"></script>
<script src="{{ asset('assets/js/check-selected-row.js') }}"></script>
<script src="{{ asset('assets/js/dropdown.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-mini.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
{{-- custom --}}
<script src="{{asset('assets/js/dashboard-custom.js')}}"></script>
<script src="{{asset('assets/js/common.js')}}"></script>

<!-- App Settings (safe to remove) -->
<script src="{{ asset('assets/js/app-settings.js') }}"></script>
