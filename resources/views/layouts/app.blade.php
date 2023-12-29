<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Pankaj kothari" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.5, user-scalable">
    <meta name="p:domain_verify" content="48acfde8082e85c11ceeff27237a1e4a" />
    <title>@yield('title')</title>
    <meta name="keywords"
        content="Intellippt, summarize, summarizer, summary, text simplifier, simplifier, simplification, create summary, summarization tool, paragraph summarizer, summarizing tool, best summarizer, free summarizer, ai summarizer, summarize article, summarize online, abstractive summarization, extractive summarization, summary generator, summary maker, summary paragraph, article summarizer, summary maker, Summarization, Google Slides, Google presentation, Google workspace, G-Suite, add-on, marketplace, powerpoint, ppt, ai content, ai content to human, ai content to human converter" />
    @section('meta_desc')
    <meta name="description"
        content="Intellippt is an online tool for summarization. An AI summary writer, automatic text summarizer, summary generator, text simplifier that help to summarize articles, text, paragraph, PDF & documents. Register for free and start summarizing." />
    <meta name="verify-admitad" content="6b1af40611" />
    @show
    <?php
$fullurl = ($_SERVER['REQUEST_URI']);
$trimmed = trim($fullurl, ".php");
$canonical = rtrim($trimmed, '');
?>
    <?php
$fullurl = ($_SERVER['REQUEST_URI']);
$trimmed = trim($fullurl, ".php");
$index = "index, follow";
if (str_contains($trimmed, 'login') || str_contains($trimmed, 'register') || str_contains($trimmed, 'reset')) {
	$index = "noindex, nofollow";
}
?>
    <link rel="canonical" href="https://www.intellippt.com<?php echo $canonical ?>" />
    <meta name="robots" content="<?php echo $index ?>">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->

    <!--<title>{{ config('app.name', 'IntelliPPT.com') }} - PDF Summarizing tool | Summary Generator | Article & Paragraph Summarizer</title>-->

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logos/favicon2.png') }}">
    <link rel="icon" href="{{ asset('assets/img/logos/favicon2.png') }}" sizes="16x16" type="image/png">

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/popup-style.css') }}" />

    <!-- search css -->
    <link rel="stylesheet" href="{{ asset('assets/search/search.css') }}" />

    <!-- quform css
	<link rel="stylesheet" href="{{ asset('assets/quform/css/base.css') }}"> -->
    <!-- Rev slider css -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/rev_slider/settings.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/rev_slider/layers.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/rev_slider/navigation.css') }}" /> -->

    <!-- custom css -->
    <link href="{{ asset('assets/css/styles-2.css') }}" rel="stylesheet" id="colors" async defer media="print"
        onload="this.media='all'">

    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet"
        / media="print" onload="this.media='all'">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com/">
    <link href="https://www.googletagmanager.com/gtag/js?id=UA-92615125-2" rel="preload" as="script">

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:500);

        .google-btn {
            width: 200px;
            height: 42px;
            background-color: #4285f4;
            border-radius: 2px;
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);
        }

        .google-icon-wrapper {
            position: absolute;
            margin-top: 1px;
            margin-left: 1px;
            width: 40px;
            height: 40px;
            border-radius: 2px;
            background-color: #fff;
        }

        .google-icon {
            position: absolute;
            margin-top: 11px;
            margin-left: 11px;
            width: 18px;
            height: 18px;
        }

        .btn-text {
            float: right;
            margin: 9px 10px 0 0;
            color: #fff;
            font-size: 14px;
            letter-spacing: .2px;
            font-family: "Roboto";
        }

        .btn-text:hover {
            box-shadow: 0 0 6px #4285f4;
        }

        .btn-text:active {
            background: #1669F2;
        }

        .header-style2 .navbar-header-custom {
            border-right-width: 0px !important;
        }

        .navbar-header-custom {
            padding: 0px !important;
        }

        .documents {
            display: none;
        }
    </style>
    <style>
        html,
        body {
            margin: 0;
        }

        .banner {
            background: #7BC456;
        }

        .banner__content {
            padding: 10px;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: center;
        }

        .banner__text {
            flex-grow: 1;
            line-height: 1.4;
            font-family: "Quicksand", sans-serif;
        }

        .banner__close {
            background: none;
            border: none;
            cursor: pointer;
        }

        .banner__text,
        .banner__close>span {
            color: #ffffff;
        }
    </style>
    @stack('styles')
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <!-- Google Tag Manager -->
    <!--<script> (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGC65RB'); </script>-->
    <script defer>
        setTimeout(function () {
            (function (w, d, s, l, i) {
                w[l] = w[l] || []; w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                }); var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-MGC65RB');
        }, 5000)
    </script>
    <!--<script>function loadgtm(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
};$(window).load(function(){loadgtm(window,document,'script','dataLayer','GTM-MGC65RB');});</script>-->

    <!--<script> const script = document.createElement('script');
script.type = 'text/javascript';
script.async = true;
// specifically this line below makes PageView get's properly triggered and fired
script.onload = () => { dataLayer.push({ event: 'gtm.js', 'gtm.start': (new Date()).getTime(), 'gtm.uniqueEventId': 0 }); }
script.src = 'https://www.googletagmanager.com/gtm.js?id=UA-92615125-2'
document.head.appendChild(script);</script>-->
    <!-- End Google Tag Manager -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-92615125-2"></script>
    <script defer>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-92615125-2');
    </script>

    <!--<script src="https://cdn.jsdelivr.net/ga-lite/latest/ga-lite.min.js" async></script>
<script>
var galite = galite || {};
galite.UA = 'UA-92615125-2'; // Insert your tracking code here
</script>-->

    <!-- Google Tag Manager (noscript) -->
    <!-- Viswanath<noscript><iframe loading="lazy" src="https://www.googletagmanager.com/ns.html?id=GTM-MGC65RB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google ads -->

    <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9760176721504208"
     crossorigin="anonymous"></script>-->
</head>

<body>
    <!--<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <center><strong>KeyPoints for Google Slides. Create slides faster using our AI-powered tool.
    <a href="/keypoints" style='color: #0073dc;text-decoration:underline;'>Check it out</a> </strong></center>
</div> -->
    <!-- start page loading -->
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <!-- end page loading -->

    <!-- start main-wrapper section -->
    <div class="main-wrapper">

        <!-- start header section -->

        <header class="header-style2" style="background-color: #fff; ">
            <div class="navbar-default">

                <!-- start top search -->
                <div class="top-search bg-theme">
                    <div class="container-fluid">
                        <form class="search-form" action="search.html" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search font-size18 text-white"
                                        type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off"
                                    placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search"><i
                                        class="fas fa-times font-size18 line-height-28 margin-5px-top"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="/" class="navbar-brand"><img id="logo" width="100%" height="100%"
                                                src="{{ asset('assets/img/logos/intellitppt.png') }}" alt="logo"></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- menu area -->
                                    <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                        <li><a href="/">Home</a></li>
                                        <!--<li><a href="/keypoints">KeyPoints Add-On</a></li>-->
                                        <li><a href="/convert_to_ppt1">Convert to PPT</a></li>
                                        <li><a href="/summarization">Summarizer</a></li>
                                        <li><a href="/#features">Features</a></li>
                                        <li><a href="/#pricing">Pricing</a></li>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/#contact_us">Contact Us</a></li>


                                        @guest
                                        <li>
                                            <a href="/login?status=1">{{ __('Login') }}</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="#!">{{ Auth::user()->name }}</a>
                                            <ul>
                                                <?php
                                                        if (Auth::user()->is_admin)
                                                        {
                                                            echo "<li><a href='/admin/home'>Admin Dashboard</a></li>";
                                                        }

                                                    ?>
                                                @if(Auth::id())
                                                <li><a href="{{ url('/account') }}">My Account</a></li>
                                                @endif
                                                @if(Auth::id())
                                                <li><a href="{{ url('/account_keypoints') }}">Keypoints Account</a></li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                        @endguest
                                    </ul>
                                    <!-- end menu area -->



                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>


        @yield('content')
        <!-- start footer section -->
        <footer class="footer-style9 bg-white">


            <div class="footer-bar xs-font-size13">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-left xs-text-center xs-margin-5px-bottom">
                            <p>&copy; Copyright Intellippt.com 2022
                                <!--<script>
                                    document.write(new Date().getFullYear())
                                </script>-->. <a href="/privacy">Privacy Policy</a> | <a href="/terms">License
                                    Agreement</a>
                            </p>
                        </div>
                        <div class="col-md-6 text-right xs-text-center">
                            Developed by: Intellippt.com Team
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer section -->

    </div>
    <!-- end main-wrapper section -->

    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top" aria-label="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popup-style.js') }}"></script>
    <!-- Viswanath <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>-->
    <script src="{{ asset('assets/js/jquery-ui-viswa.js') }}"></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" ></script> -->
    <!-- Viswanath <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js" ></script> -->
    <!--<script src= "https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"> </script> -->

    <script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <!-- popper js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- navigation -->
    <script src="{{ asset('assets/js/nav-menu.js') }}"></script>

    <!-- tab -->
    <script src="{{ asset('assets/js/easy.responsive.tabs.js') }}"></script>

    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>

    <!-- stellar js -->
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>

    <!-- jquery.magnific-popup js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- isotope.pkgd.min js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>

    <!-- thumbs js -->
    <script src="{{ asset('assets/js/owl.carousel.thumbs.js') }}"></script>

    <!-- animated js -->
    <script src="{{ asset('assets/js/animated-headline.js') }}"></script>

    <!--  clipboard js -->
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>
    <!-- revolution slider js files start -->
    <!-- <script src="{{ asset('assets/js/rev_slider/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets/js/rev_slider/extensions/revolution.extension.video.min.js') }}"></script>
  -->
    <!-- custom scripts -->
    <script src="{{ asset('assets/js/main.js') }}"> </script>

    <!-- all js include end -->

    <style>
        .btn-primary {
            color: white !important;
        }
    </style>

    @stack('scripts')




    <script>
        $(document).ready(function () {


            $(".toolbox").click(function () {

                $(".toolbox").removeClass('btn-outline-primary');
                $(".toolbox").addClass('btn-outline-primary');
                $(".toolbox").removeClass('btn-primary');
                $(this).addClass('btn-primary');

                if ($(this).attr('data-id') == "text") {
                    $(".texts").show();
                    $(".documents").hide();
                } else {
                    $(".texts").hide();
                    $(".documents").show();
                }

            });

            $(".project-grid").keyup(function () {

                // console.log($(this).text().length);

                if ($(this).text().length > 520) {


                    $(".project-grid").css("min-height", 'unset');
                    $(".project-grid").css("max-height", 'unset');
                    var curentheight = parseInt($(".project-grid").height()) + 30;
                    $(".project-grid").css("min-height", curentheight + 'px');
                    $(".project-grid").css("max-height", curentheight + 'px');
                    var plusadd = parseInt(curentheight) + 80;
                    $(".gallery").css("height", plusadd + 'px');


                } else {

                    $(".project-grid").css("min-height", '250px');
                    $(".project-grid").css("max-height", '250px');
                    if (screen.width < 800) {
                        $(".gallery").css("height", '522px');


                    }
                    else {
                        $(".gallery").css("height", '266px');

                    }
                }

            });

            //  $(".buyfeature").click(function(){


            //      if('{{ Auth::check() }}' == true){
            //         window.location.href = "/login?buystatus=yes";
            //      }else{
            //         window.location.href = "/handle";
            //      }

            //  });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".accoundetails").click(function () {

                var id = $(this).attr('id');

                $.ajax({
                    url: '{{ url("/accoutdetails") }}',
                    method: 'GET',
                    data: { id: id },
                    success: function (res) {
                        $(".modal-contents").html(res);
                    }
                });

            });


        });
    </script>

    @if(!empty(request()->session()->get('buystatus')))

    @if(request()->session()->get('buystatus') == "yes")


    @php(session(['buystatus' => '']))
    <script>
        $(document).ready(function () {
            window.location.href = "/handle";
        });
    </script>

    @endif

    @endif

    @if(!empty(request()->session()->get('keypoints_buystatus')))

    @if(request()->session()->get('keypoints_buystatus') == "yes")


    @php(session(['keypoints_buystatus' => '']))
    <script>
        $(document).ready(function () {
            window.location.href = "/keypointsdev";
        });
    </script>

    @endif

    @endif

    {{-- @if(@$_GET['buystatus'] == "yes")
    @php(session(['buystatus' => 'yes']))
    @endif --}}
</body>

</html>