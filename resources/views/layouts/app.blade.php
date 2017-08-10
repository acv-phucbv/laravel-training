<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @include('sections.head')

    @yield('style')

</head>
<body>
    <div id="app">
        <!-- Header -->
        @include('sections.header')
        <!--/Header -->
        <div class="main-content">
            <div class="row">
                <!-- Sidebar -->
                @include('sections.sidebar')

                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>


    </div>

    <!-- Footer -->
    @include('sections.footer')
    <!-- /Footer -->

    @yield('script')
</body>
</html>
