<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ isset($title) ? $title . ' | ' : '' }}Dubai-Cloud</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-f8mUMCRNrJxPBDzPJx3n+Y5TC5xp6SmStstEfgsDXZJTcxBakoB5hvPLhAfJKa9rCvH+n3xpJ2vQByxLk4WP2g==" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        @stack('css')
        <script src="{{ asset('/js/libraries/jquery-3.6.0.js') }}"></script>
        <script src="{{ asset('/js/libraries/jquery.nicescroll.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/libraries/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/stisla.js') }}"></script>
        <!-- <script src="{{ asset('/js/scripts.js') }}"></script> -->
        <script src="{{ asset('/js/common.js') }}"></script>
        @stack('js')
    </head>
    @yield('modal')
    <body>
        <div id="app">
            <div class="main-wrapper">
                <!-- サイドバー　-->
                <div class="main-sidebar">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="">Dubai-Cloud</a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="index.html">St</a>
                        </div>
                        @if (Auth::user()->user_type == config('const.USER_TYPE.student'))
                        <ul class="sidebar-menu">
                            <li class="menu-header">レッスン</li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('lesson.studentIndex') }}">レッスン登録状況</a></li>
                                </ul>
                            </li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('lesson.index') }}">レッスン一覧</a></li>
                                </ul>
                            </li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="">スケジュール編集</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="sidebar-menu">
                            <li class="menu-header">ユーザー</li>
                            <li class="dropdown active">
                                <ul>
                                @if (Auth::user()->is_initial_setting == 0)
                                    <li class=active><a class="nav-link" href="{{ route('student.add') }}">ユーザー情報編集</a></li>
                                @else
                                    <li class=active><a class="nav-link" href="{{ route('student.edit', ['id' => Auth::id()]) }}">ユーザー情報編集</a></li>
                                @endif
                                </ul>
                            </li>
                        </ul>
                        @else
                        <ul class="sidebar-menu">
                            <li class="menu-header">スケジュール</li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('schedule.index') }}">スケジュール一覧</a></li>
                                </ul>
                            </li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('schedule.index') }}">スケジュール登録</a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif

                        @if (Auth::user()->user_type == config('const.USER_TYPE.teacher'))
                        <ul class="sidebar-menu">
                            <li class="menu-header">ユーザー</li>
                            <li class="dropdown active">
                                <ul>
                                @if (Auth::user()->is_initial_setting == 0)
                                    <li class=active><a class="nav-link" href="{{ route('teacher.add') }}">ユーザー情報編集</a></li>
                                @else
                                    <li class=active><a class="nav-link" href="{{ route('teacher.edit', ['id' => Auth::id()]) }}">ユーザー情報編集</a></li>
                                @endif
                                </ul>
                            </li>
                        </ul>
                        @else
                        <ul class="sidebar-menu">
                            <li class="menu-header">ユーザー</li>
                            <li class="dropdown active">
                                <ul class="">
                                    <li class=active><a class="nav-link" href="{{ route('manager.add') }}">ユーザー新規追加</a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    </aside>
                </div>
                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-body">
                            <x-alert />
                            @yield('content')
                        </div>
                    </section>
                </div>
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright © 2022 <div class="bullet"></div> Sun And Dear All rights received.</a>
                    </div>
                </footer>   
            </div>
        </div>
        <div class="loading">
            <i class="fas fa-spinner fa-5x fa-spin"></i>
        </div>
    </body>
</html>