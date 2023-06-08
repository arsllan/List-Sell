<!doctype html>
<html lang="en">
<head>
    <title>List & Sell - Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="{{ asset('public/backend/css/all.css')}}">-->
    <link rel="icon" type="image/png" href="{{ asset('public/backend/images/favicon.ico')}}"/>
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/bootstrap.min.css')}}">-->
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/theme-style.css')}}">-->
    
    
    <!--new files-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/newFiles/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/newFiles/css/theme-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/newFiles/css/theme-responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('public/backend/newFiles/css/font-awesome.min.css')}}">
    
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('public/backend/js/canvasjs.min.js')}}"></script>
</head>
<body>
    <!-- ================================start header============================== -->
    <!--<div class="wrapper">-->
    <!--    <nav id="sidebar" class="">-->
    <!--        <div class="sidebar-header">zxcz</div>-->
    <!--        <div class="l-sidebar__content">-->
    <!--            <div class="theme-navbar side-main-menu">-->
    <!--                <div class="scrollable">xczc</div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </nav>-->
    <!--    <div id="content">-->
    <!--        <div class="l-header">cccc</div>-->
    <!--        <div class="l-main">-->
    <!--            <div class="content-wrapper">-->
    <!--                <div class="container-fluid">cccccc</div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- ================================start header============================== -->
    <div class="wrapper stretch-card-dashboard">
        <!-- Sidebar Holder -->
        @include('includes.backend.sidebar')
        <!-- Page Content Holder -->
        <div id="content">
            @include('includes.backend.header')
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-center align-items-center">
                        <div class="col-xl-12">
                            <p>© 2023 List & Sell. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- bootstap bundle js -->
    
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
    
    
    <!--<script src="{{ asset('public/backend/js/bootstrap.bundle.js')}}"></script>-->
    <script src="{{ asset('public/backend/js/main.js')}}"></script>
    
    <!--new files-->
    <script src="{{ asset('public/backend/newFiles/js/bootstrap.bundle.js')}}"></script>
    <!--<script src="{{ asset('public/backend/newFiles/js/main.js')}}"></script>-->
    
</body>
</html>