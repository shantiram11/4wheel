<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('_partials._dashboard._head')

<body class="layout-default">

    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        @include('_partials._dashboard._header')

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    <div class="container-fluid page__heading-container">
                        <div class="page__heading d-flex align-items-center">
                            <div class="flex">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}"><i
                                                    class="material-icons icon-20pt">home</i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>

                                    </ol>
                                </nav>
                                {{-- <h1 class="m-0">Admin Panel</h1> --}}
                            </div>

                            {{-- <a href="" class="btn btn-success ml-1">Action</a> --}}
                        </div>
                    </div>

                    <div class="container-fluid page__container">
                        @yield('content')
                    </div>

                </div>
                <!-- // END drawer-layout__content -->

                @include('_partials._dashboard._sidebar')

            </div>
            <!-- // END drawer-layout -->

        </div>
        <!-- // END header-layout__content -->

    </div>
    <!-- // END header-layout -->

    <!-- App Settings FAB -->
    <div id="app-settings" class="d-none">
        <app-settings layout-active="default" :layout-location="{
      'default': 'blank.html',
      'fixed': 'fixed-blank.html',
      'fluid': 'fluid-blank.html',
      'mini': 'mini-blank.html'
    }"></app-settings>
    </div>


    @include('_partials._dashboard._footer')
</body>

</html>
