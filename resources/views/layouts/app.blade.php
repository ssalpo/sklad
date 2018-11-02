@include('layouts._partials.header')

@auth

    @include('layouts._partials.top_nav')

@endauth

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

    @auth
        @include('layouts._partials.sidebar')
    @endauth

    <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                @auth
                    @include('_partials.alerts')
                @endauth

                @yield('content')

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


@include('layouts._partials.footer')