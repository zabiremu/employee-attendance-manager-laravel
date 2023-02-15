@php
  $id = Auth::user()->id;
  $user = App\Models\User::findOrFail($id);
@endphp
@include('backend.app.head')


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        @include('backend.app.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
           @include('backend.app.header')


            <div class="content-wrapper">
               @yield('content')
            </div>

            <footer class="footer mt-auto">
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

   @include('backend.app.script')


</body>

</html>
