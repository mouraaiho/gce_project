<!DOCTYPE html>
<html lang="" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GCE Project') }} - @yield('Title')</title>
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.rtl.css') }}">
    </head>
    <body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="assets/images/logo/logo.png" alt="Logo" srcset="">برنامج استهلاك الماء الصالح للشرب </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">إختبارات</li>
                        <li class="sidebar-item {{ $current_menu == 'dashboard' ? 'active':'' }} ">
                            <a href="{{ URL::route('dashboard.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>الصفحة الرئيسية</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $current_menu == 'client' ? 'active':'' }} ">
                            <a href="{{ URL::route('client.index') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>المشتركين</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ $current_menu == 'counter' ? 'active':'' }}">
                            <a href="{{ URL::route('counter.index') }}" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span>عدادات الماء</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ $current_menu == 'consumption' ? 'active':'' }}">
                            <a href="{{ URL::route('consumption.index') }}" class='sidebar-link'>
                                <i class="bi bi-bar-chart-line-fill"></i>
                                <span>استهلاك الماء</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $current_menu == 'invoice' ? 'active':'' }} ">
                            <a href="{{ URL::route('invoice.index') }}" class='sidebar-link'>
                                <i class="bi bi-calculator-fill"></i>
                                <span>الفواتير</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $current_menu == 'payment' ? 'active':'' }} ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-credit-card-fill"></i>
                                <span>الأداءات </span>
                            </a>
                        </li>
                        <li class="sidebar-title">إعدادات البرنامج</li>
                        <li class="sidebar-item {{ $current_menu == 'config' ? 'active':'' }} ">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>الإعدادات</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ $current_menu == 'user' ? 'active':'' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>المستخدمين</span>
                            </a>
                        </li>
                        <li class="sidebar-item  {{ $current_menu == 'about' ? 'active':'' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-info-circle-fill"></i>
                                <span>عن البرنامج</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
