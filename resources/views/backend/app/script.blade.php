<!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script src="{{ asset('backend/assets/plugins/nprogress/nprogress.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sleek.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart.js') }}"></script>
<script src="{{ asset('backend/assets/js/date-range.js') }}"></script>
<script src="{{ asset('backend/assets/js/map.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

{{-- data tables --}}
<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('#myTable').DataTable();
    // });


    $('#myTable').DataTable( {
    responsive: {
        details: true
    }
} );
</script>


{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{-- toast js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

@stack('script')
