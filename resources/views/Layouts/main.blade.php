<!DOCTYPE html>
<html lang="en">

<head>

@include('includes.head')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
       @include('includes.hmobile')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('includes.sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->     
        <div class="page-container">
            <!-- HEADER DESKTOP-->
          @include('includes.hdesktop')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @include('includes.script_footer')
    @yield('js')
</body>

</html>
<!-- end document-->

