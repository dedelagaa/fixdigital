<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('layouts.shared.head', ['title' => $title])
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        @include('layouts.shared.header')

        @include('layouts.shared.sidebar')

        <div class="page-wrapper">

            @yield('content')

            @include('layouts.shared.footer')
        </div>

    </div>

    @include('layouts.shared.script')

</body>

</html>