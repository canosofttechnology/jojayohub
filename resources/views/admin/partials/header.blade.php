<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description"
          content="attendance, client management, finance, freelance, freelancer, goal tracking, Income Managment, lead management, payroll, project management, project manager, support ticket, task management, timecard">
    <meta name="keywords"
          content="	attendance, client management, finance, freelance, freelancer, goal tracking, Income Managment, lead management, payroll, project management, project manager, support ticket, task management, timecard">
    <title>Ecommerce Website</title>
            <link rel="icon" href="/frontend/img/logo.png" type="image/png">
        <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="/admin/css/font-awesome.min.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="/admin/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="/admin/css/animate.min.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->

    <!-- =============== APP STYLES ===============-->
                <!-- =============== BOOTSTRAP STYLES ===============-->
        <link rel="stylesheet" href="/admin/css/bootstrap.min.css" id="bscss">
        <link rel="stylesheet" href="/admin/css/app.css" id="maincss">
            <link id="autoloaded-stylesheet" rel="stylesheet"
              href="/admin/css/bg-danger-dark.css">


    <!-- SELECT2-->

    <link rel="stylesheet" href="/admin/css/select2.min.css">
    <link rel="stylesheet"
          href="/admin/css/select2-bootstrap.min.css">

    <!-- Datepicker-->
    <link rel="stylesheet" href="/admin/css/datepicker.min.css">

    <link rel="stylesheet" href="/admin/css/timepicker.min.css">

    <!-- Toastr-->
    <link rel="stylesheet" href="/admin/css/toastr.min.css">
    <!-- Data Table  CSS -->
    <link rel="stylesheet" href="/admin/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/admin/css/dataTables.colVis.min.css">
    <link rel="stylesheet" href="/admin/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/responsive.dataTables.min.css">
    <!-- summernote Editor -->

    <link href="/admin/css/summernote.min.css" rel="stylesheet"
          type="text/css">

    <!-- bootstrap-slider -->
    <link href="/admin/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- chartist -->
    <link href="/admin/css/morris.min.css" rel="stylesheet">

    <!--- bootstrap-select ---->
    <link href="/admin/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/admin/css/chat.min.css" rel="stylesheet">

    <!-- JQUERY-->
    <script src="/admin/js/jquery.min.js"></script>

    <link href="/admin/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/vendor/fancybox/jquery.fancybox.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}" media="screen">
    <script src="/admin/js/bootstrap-toggle.min.js"></script>
        <script>
        var total_unread_notifications = 0,
            autocheck_notifications_timer_id = 0,
            list = null,
            bulk_url = null,
            time_format = false,
            ttable = null,
            base_url = "https://ultimate.codexcube.com/",
            new_notification = "",
            credit_amount_bigger_then_remaining_credit = "Total credits amount is bigger then remaining credits",
            credit_amount_bigger_then_invoice_due = "Input credits amount is bigger then Invoice due amount",
            auto_check_for_new_notifications = 0,
            file_upload_instruction = "Drag-and-drop documents here <br /> or click to browse...",
            filename_too_long = "Filename is too long.";
        desktop_notifications = "1";
        lsetting = "Settings";
        lfull_conversation = "Full Conversation";
        ledit_name = "Edit Name";
        ldelete_conversation = "Delete Conversation";
        lminimize = "Minimize";
        lclose = "Close";
        lnew = "New";
        no_result_found = "No result found";
        searchType = "dashboard";
        available_tags = [];

    </script>

</head>


<script type="text/javascript">
    function startTime() {
        var c_time = new Date();
        var time = new Date(c_time.toLocaleString('en-US', {timeZone: 'Asia/Kolkata'}));
        var date = time.getDate();
        var month = time.getMonth() + 1;
        var years = time.getFullYear();
        var hr = time.getHours();
        var hour = time.getHours();
        var min = time.getMinutes();
        var minn = time.getMinutes();
        var sec = time.getSeconds();
        var secc = time.getSeconds();
        if (date <= 9) {
            var dates = "0" + date;
        } else {
            dates = date;
        }
        if (month <= 9) {
            var months = "0" + month;
        } else {
            months = month;
        }
                var ampm = ' ';

        if (hr < 10) {
            hr = " " + hr
        }
        if (min < 10) {
            min = "0" + min
        }
        if (sec < 10) {
            sec = "0" + sec
        }
        document.getElementById('txt').innerHTML = hr + ":" + min + ":" + sec + ampm;
        var t = setTimeout(function () {
            startTime()
        }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }

</script>
<body onload="startTime();" class="     ">
<div class="wrapper">
    <!-- top navbar-->

<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar topnavbar">
        <!-- START navbar header-->
                <div class="navbar-header">
                            <a href="#/" class="navbar-brand">
                    <div class="brand-logo">
                        <img style="width: 64%;height: auto;"
                             src="/admin/img/logo_tranparent.png" alt="App Logo"
                             class="img-responsive">
                    </div>
                    <div class="brand-logo-collapsed">
                        <img style="width: 100%;height: 48px;border-radius: 50px"
                             src="/uploads/logo_tranparent.png" alt="App Logo"
                             class="img-responsive">
                    </div>
                </a>
                    </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a href="#" data-toggle-state="aside-toggled" data-no-persist="true"
                       class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                    </a>
                </li>
                <!-- END User avatar toggle-->
                <!-- START lock screen-->
                <li class="hidden-xs">
                    <a href="" class="text-center" style="vertical-align: middle;font-size: 20px;">E-commerce Website</a>
                </li>
                <!-- END lock screen-->
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                    <ul class="dropdown-menu animated zoomIn">
                        <li>
                            <a href="{{ route('products.create') }}">New Product</a>
                        </li>
                        @if (Auth::user()->roles == 'admin')
                            <li>
                                <a href="{{ route('users.create') }}">New User</a>
                            </li>
                            <li>
                            <a href="{{ route('category.index') }}">New Category</a>
                            </li>
                            <li>
                                <a href="{{ route('blogs.create') }}">New Blog</a>
                            </li>

                            <li>
                                <a href="{{ route('ads.create') }}">New Ad</a>
                            </li>
                            <li>
                                <a href="{{ route('sales.create') }}">New Sale</a>
                            </li>
                            
                        @endif                       
                        
                    </ul>
                </li>
        
                <!-- START Alert menu-->
                <li class="dropdown dropdown-list notifications">
                    <a href="#" data-toggle="dropdown">
                    <em class="icon-bell"></em>
                    </a>
<!-- START Dropdown menu-->
                <ul class="dropdown-menu animated zoomIn notifications-list" data-total-unread="0"
                    style="width: 350px">
                    <li class="text-sm text-right" style="border-bottom: 1px solid rgb(238, 238, 238)">
                        <a href="#" class="list-group-item"
                           onclick="mark_all_as_read(); return false;">Mark all as read</a>
                    </li>
                                <li class="notification-li"
                                data-notification-id="91">
                                <!-- list item-->
                                <!-- list item-->
                                                <a href="https://ultimate.codexcube.com/admin/training/view_training_details/1"
                                   class="n-top n-link list-group-item ">
                                    <div class="n-box media-box ">
                                        <div class="pull-left">
                                                                        <img src="https://raw.githubusercontent.com/encharm/Font-Awesome-SVG-PNG/master/black/png/128/suitcase.png" alt="Avatar"
                                                 width="40"
                                                 height="40" class="img-thumbnail img-circle n-image">
                                        </div>
                                        <div class="media-box-body clearfix">
                                            <span class="n-title text-sm block">A new Training  By Android Apps Development   has been assigned to you</span>                            <small class="text-muted pull-left" style="margin-top: -4px"><i
                                                    class="fa fa-clock-o"></i> 2 years ago</small>
                                                                    </div>
                                    </div>
                                </a>
                            </li>
                            <li class="text-center">
                                    <a href="https://ultimate.codexcube.com/admin/user/user_details/1/notifications">View all notifications</a>
                            </li>
                    <!-- END list group-->
                </ul>

                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="{{ \Auth::user()->image }}" class="img-xs user-image"
                             alt="User Image"/>
                        <span class="hidden-xs">{{ \Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu animated zoomIn">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ \Auth::user()->image }}" class="img-circle" alt="User Image"/>
                            <p>
                                {{ \Auth::user()->name }}
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('users.show', \Auth::user()->id) }}"
                                   class="btn btn-default btn-flat">Update Profile</a>
                            </div>
                            <form method="post" action="{{ route('logout') }}"  class="form-horizontal">
                              @csrf
                                <input type="hidden" name="clock_time" value="" id="time">
                                <div class="pull-right">
                                    <button type="submit"
                                            class="btn btn-default btn-flat">Log Out</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END Right Navbar-->
        </div>
        <!-- END Nav wrapper-->
    </nav>
    <!-- END Top Navbar-->
</header>
@include('admin.partials.aside')
