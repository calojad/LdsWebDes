<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('layouts.heads')
    @yield('styles')

</head>
<body data-background-color="bg3">

<div class="wrapper">
    <!-- NavBar -->
    @include('layouts.navbar')

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Body -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">

                    @yield('pageHeader')

                </div>

                <div class="page-category">

                    @yield('content')

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.themekita.com">ThemeKita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript: void(0);">Licenses</a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright ml-auto">2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
                </div>
            </div>
        </footer>
    </div>

</div>

<!-- Scripts -->
@include('layouts.scipts')
@yield('scripts')
</body>
</html>