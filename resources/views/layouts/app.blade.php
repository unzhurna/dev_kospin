<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Material Admin</title>

        <!-- CSS -->
        @include('partials.stylesheet')
    </head>
    <body>
        <header id="header" class="clearfix" data-ma-theme="blue">
            <ul class="h-inner">
                <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="hi-logo hidden-xs">
                    <a href="index.html">Koperasi Simpan Pinjam</a>
                </li>

                <li class="pull-right">
                    <ul class="hi-menu">

                        <li class="dropdown">
                            <a data-toggle="dropdown" href=""><i class="him-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="divider hidden-xs"></li>
                                <li class="hidden-xs">
                                    <a data-ma-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Fullscreen</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile') }}"><i class="zmdi zmdi-account"></i> Profile</a>
                                </li>
                                <li>
                                    <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-time-restore"></i>  Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </header>

        <section id="main">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="s-profile">
                    <a href="" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                            <img src="{{ asset('img/demo/profile-pics/1.jpg') }}" alt="{{ Auth::user()->name }}">
                        </div>

                        <div class="sp-info">
                            {{ Auth::user()->name }}
                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="{{ route('profile') }}"><i class="zmdi zmdi-account"></i> Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-time-restore"></i>  Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li><a href="{{ route('home') }}"><i class="zmdi zmdi-chart"></i> Beranda</a></li>
                    <li><a href="{{ route('member.index') }}"><i class="zmdi zmdi-accounts"></i> Anggota</a></li>
                    <li><a href="{{ route('saving.index') }}"><i class="zmdi zmdi-local-atm"></i> Simpanan</a></li>
                    <li><a href="{{ route('loan.index') }}"><i class="zmdi zmdi-local-atm"></i> Pinjaman</a></li>
                    <li class="sub-menu">
                        <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-print"></i> Laporan</a>
                        <ul>
                            <li><a href="">SHU</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>

            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>@yield('title')</h2>
                    </div>

                    <!-- Main Content -->
                    @yield('content')
                    <!-- Main Content -->

                </div>
            </section>
        </section>

        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript Libraries -->
        @include('partials.javascript')

    </body>
 </html>
