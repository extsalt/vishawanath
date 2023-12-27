<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Pankaj kothari" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="IntelliPPT, Summarize, Presentation, Summarization, Summarization Tool" />
    <meta name="description" content="Intellippt is a simple tool that help to Summarize articles, text, websites, essays and documents for free. Best Summary tool, Article summarizer, Conclusion Generator Tool." />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IntelliPPT.com') }}-  Free Summarizer Tool to Summarize Any Text Online | Fast & Free</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/img/logos/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('admin/img/logos/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('admin/img/logos/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('admin/img/logos/apple-touch-icon-114x114.png') }}">

    <!-- common plugins -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/uniform/css/default.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/switchery/switchery.min.css') }}" />

    <!-- datatables plugin -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/css/jquery.datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/css/jquery.datatables_themeroller.css') }}" />

    <!-- bootstrap-datepicker plugin -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-datepicker/css/datepicker.css') }}" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}" />

    @stack('styles')
</head>

<body>
    <!-- start page loading -->
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <!-- end page loading -->

    <!-- start page container -->
    <div class="page-container">
        <!-- start page sidebar -->
        <div class="page-sidebar">
            <a class="logo-box" href="/admin/home">
                <span>Intellippt</span>
                <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                <i class="icon-close" id="sidebar-toggle-button-close"></i>
            </a>
            <div class="page-sidebar-inner">
                <div class="page-sidebar-menu">
                    <ul class="accordion-menu">
                        <li>
                            <a href="/admin/home">
                                <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/subscribe') }}">
                                <i class="menu-icon icon-home4"></i><span>Subscribers</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/users_export">
                                <i class="menu-icon icon-inbox"></i><span>Export Users</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- end page sidebar -->

        <!-- start page content -->
        <div class="page-content">
            <!-- start page header -->
            <div class="page-header">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <div class="logo-sm">
                                <a href="#!" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                <a class="logo-box" href="/admin"><span>Intellippt</span></a>
                            </div>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <i class="fa fa-angle-down"></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="#!" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                <li><a href="#!" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('admin/img/avatars/user-dropdown.jpg')}}" alt="" class="rounded-circle"></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/home">Back to summarizer</a>
                                            <a  href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </div>
            <!-- end page header -->
            <!-- start page inner -->
            <div class="page-inner">
                <div class="page-title">
                    <h3 class="breadcrumb-header">Subscribers</h3>
                </div>
                <!-- start page main wrapper -->
                <div id="main-wrapper">

                    <!-- Row -->
                    <div class="row">

                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <div class="card card-white stats-widget">
                                <div class="card-body">
                                    <div class="float-left">
                                        <span class="stats-number">3</span>
                                        <p class="stats-info">Subscribers</p>
                                    </div>
                                    <div class="float-right">
                                        <i class="fas fa-tasks stats-icon text-success success"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress mb-0 mt-3">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="sr-only">100% Complete</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <div class="card card-white stats-widget">
                                <div class="card-body">
                                    <div class="float-left">
                                        <span class="stats-number">$ {{ @$value }}</span>
                                        <p class="stats-info">Total Cost</p>
                                    </div>
                                    <div class="float-right">
                                        <i class="fas fa-tasks stats-icon text-success success"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress mb-0 mt-3">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="sr-only">100% Complete</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <label>From Date : </label>
                            <input type="date" class="form-control fromdate" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <label>End Date : </label>
                            <input type="date" class="form-control todate" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 pt-4">
                            <label>&nbsp; </label>
                             <input type="button" class="btn btn-primary mt-1  searchrecords" value="Search">
                        </div>
                     </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-white">
                                <div class="card-heading clearfix">
                                 </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display table" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subscription Date</th>
                                                    <th>Premium Date</th>
                                                    <th>Subscription Status</th>
                                                    <th>Premium Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="appenddata">
                                                @foreach($result as $results)
                                                    <tr>
                                                    <td>{{ @$results->orderdetails->name }}</td>
                                                    <td>{{ @$results->orderdetails->email }}</td>
                                                    <td>{{ @$results->trial_account_date }}</td>
                                                    <td>{{ @$results->buy_account_date }}</td>
                                                    <td> 
                                                    
                                                        @if(@$results->trial_account_status == "inprogress")
                                                        Active
                                                    @endif
                                                    @if(@$results->trial_account_status == "cancelled")
                                                        Cancelled
                                                    @endif
                                                    @if(@$results->trial_account_status == "completed")
                                                        Inactive
                                                    @endif
                                                    
                                                    </td>
                                                    <td>@if(@$results->buy_account_status == "inprogress")
                                                            Active
                                                        @endif
                                                        @if(@$results->buy_account_status == "cancelled")
                                                            Cancelled
                                                        @endif
                                                        @if(@$results->buy_account_status == "completed")
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    </tr>
                                                @endforeach
                                             </tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- end page main wrapper -->
                <div class="page-footer">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Intellippt.com</p>
                </div>
            </div>
            <!-- end page inner -->

        </div>
        <!-- end page content -->
    </div>
    <!-- end page container -->

    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery-3.1.0.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- slimscroll -->
    <script src="{{ asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- uniform -->
    <script src="{{ asset('admin/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>

    <!-- switchery -->
    <script src="{{ asset('admin/plugins/switchery/switchery.min.js') }}"></script>

    <!-- datatables -->
    <script src="{{ asset('admin/plugins/datatables/js/jquery.datatables.min.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- table-data -->
    <script src="{{ asset('admin/js/pages/table-data.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <!-- all js include end -->

    @stack('scripts')


<script>
    $(document).ready(function(){
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


          $(".searchrecords").click(function(){

                var fromdate = $(".fromdate").val();
                var todate = $(".todate").val();

                if(fromdate == ""){
                    alert("Please select a from date");
                    return false;
                }
                if(todate == ""){
                    alert("Please select a to date");
                    return false;
                }

                $.ajax({
                    url: "{{ url('/filterrecord') }}",
                    method: 'post',
                    data: {
                        fromdate:fromdate,todate:todate
                    },
                    success: function(result) {
                        $(".appenddata").html(result);
                    }
                });

        });
    });
</script>



</body>

</html>
