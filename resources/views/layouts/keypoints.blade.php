
@push('styles')

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Pankaj kothari" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="p:domain_verify" content="48acfde8082e85c11ceeff27237a1e4a"/>
	<meta name="keywords" content="IntelliPPT, summarize, summarizer, summary, create summary, summarization tool, summarizing tool, best summarizer, free summarizer, ai summarizer, summarize article, summarize online, abstractive summarization, extractive summarization, summary generator, summary maker, summary paragraph, article summarizer, summary maker, Summarization, Google Slides, Google presentation, Google workspace, G-Suite, add-on, marketplace, powerpoint, ppt" />
<meta name="description" content="IntelliPPT brings you the tool to create your study notes faster using Keypoints Add-on" />
<?php
$fullurl = ($_SERVER['REQUEST_URI']);
$trimmed = trim($fullurl, ".php");
$canonical = rtrim($trimmed, '/') . '/';
?>
<link rel="canonical" href="https://www.intellippt.com<?php echo $canonical ?>" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Keypoints - Google Presentation Slides Add-on | Intellippt</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/img/logos/favicon.png') }}">
    <link rel="icon" href="{{ asset('assets/img/logos/favicon.png') }}" sizes="16x16" type="image/png">

	<!-- plugins -->
	<link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />

	<!-- search css -->
	<link rel="stylesheet" href="{{ asset('assets/search/search.css') }}" />

	<!-- quform css -->
	<!--<link rel="stylesheet" href="{{ asset('assets/quform/css/base.css') }}">-->

	<!-- custom css -->
	<!--<link href="{{ asset('assets/css/styles-2.css') }}" rel="stylesheet" id="colors">-->

	<!--<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />-->

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Roboto:500);
        .google-btn{width:200px; height:42px;background-color:#4285f4;border-radius:2px;box-shadow:0 3px 4px 0 rgba(0,0,0,.25);}
        .google-icon-wrapper{position:absolute;margin-top:1px;margin-left:1px;width:40px;height:40px;border-radius:2px;background-color:#fff;}
        .google-icon{position:absolute;margin-top:11px;margin-left:11px;width:18px;height:18px;}
        .btn-text{float:right;margin:9px 10px 0 0;color:#fff;font-size:14px;letter-spacing:.2px;font-family:"Roboto";}
        .btn-text:hover{box-shadow:0 0 6px #4285f4;}
        .btn-text:active{background:#1669F2;}

        .header-style2 .navbar-header-custom{border-right-width: 0px !important;}
        .navbar-header-custom{padding: 0px !important;}
	.documents{display: none;}
        /* The hero image */
        .hero-image { background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("assets/img/demos/background1.jpg");
                      height: 50%; background-position: center; background-repeat: no-repeat; background-size: cover; position: relative; }

        .hero-text { text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; }
    </style>
	@stack('styles')
    <!-- Global site tag (gtag.js) - Google Analytics -->



<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-92615125-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-92615125-2');
</script>-->


</head>
<body>

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
                                    <button class="search-form_submit fas fa-search font-size18 text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search"><i class="fas fa-times font-size18 line-height-28 margin-5px-top"></i></span>
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
                                        <a href="/" class="navbar-brand"><img id="logo" src="{{ asset('assets/img/logos/keypoints.png') }}" alt="logo" width: 200%;></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler"></div>

                                    <!-- menu area -->
                                    <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/keypointsdev">KeyPoints Pricing</a></li>
                                        <li><a href="/blog">Blog</a></li>
                                       @guest
											<li>
												<a href="/login?status=2">{{ __('Login') }}</a>
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
                                                        <li><a href="{{ url('/account_keypoints') }}"   >Keypoints Account</a></li>
                                                    @endif
													<li>
														<a  href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
														{{ __('Logout') }}
														</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
															@csrf
														</form>
													</li>
												</ul>
											</li>
										@endguest										
                                        <li><a href="/#contact_us">Contact Us</a></li>
                                    </ul>
                                    <!-- end menu area -->



                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
	    </div>
            <section class="bg-light-gray" style="padding-top: 15px;">
		<div class="container">
               <div class="row">
                    <div class="col-md-12">
                        <center><h1>KeyPoints Add-On For Google Slides</h1></center>
                    </div>
                </div>
                <center> <img src="assets/img/logos/keypoints.png" alt="KeyPoints" display=block; margin-left=auto; margin-right=auto height="120" width="120"> </center>
                </div>
            </section>
            <section class="bg-light-gray" style="padding-top: 1px;">
		<div class="container">
                <center>
		<div class="section-heading title-style8">
	            <h2>Our Benefits</h2>
		</div>
		    <div>
                        <h1>Modern tool to create your study notes faster</h1>
                        <h2>KeyPoints Add-on for Google Presentation Slides</h2>
                    </div>
                </center>
            <center>
            <section class="bg-light-gray" style="padding-top: 15px;">
                <div class="container">
                   <iframe width="600" height="450"
                   src="https://www.youtube.com/embed/tUiwdXWFuUc?autoplay=1">
                   </iframe> 
                </div>
            </section>
            </center>

                    <div class="row mt-60">
                        <div class="col-lg-12 col-md-12 margin-30px-bottom ">
                            <div class="service-block h-100">
                                <div class="service-desc">
                                    <h4>Improves productivity by 10X</h4>
				    <p>Artificial Intelligence built into KeyPoints helps boost user productivity by 10X!</p>
                                    <p>Harness the power of AI to quickly and effortlessly transform any PDF, Word Doc, or Google Doc into a custom Slide Presentation with the KeyPoints Add-On for Google Workspace!  The AI built into KeyPoints scans your PDFs and/or Docs to analyze the content and extract the most important subject matter, conveniently highlighting and providing you with the most important content for your presentation.</p>
                                    <p>Choose how detailed you want your presentation to be by selecting the Summarization Percentage.  For more complicated information you may want the AI in KeyPoints to summarize 75% or more of your content; for a High-Level overview 50% or less may be perfect for your needs!</p>
                                    <p>No more messing with PDF conversions and messy Copy/Paste, let the AI do all of the hard work for you so you can focus on creating amazing presentations!</p>
                                    <br>
					<center>
					    <img src=assets/img/demos/google_workspace_logo.png>
                                            <br>
                                            <br>
                                            <a href="http://workspace.google.com/marketplace/app/appname/331682014610">
					    <button id="sumarize_btn" type="button" class="butn theme"><span>Click Here</span></button>
                                            </a>
                                        </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-60">
                        <div class="col-lg-12 col-md-12 margin-30px-bottom ">
                            <div class="service-block h-100">
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <h4>How it works!</h4>
                                    <ul style="list-style-type: disc;">
                                        <li>Quickly and easily Upload a PDF or Word Document and click NEXT</li>
                                        <li>KeyPoints AI scans the document and conveniently displays the content to the right-side of your Slide presentation. The display is fully editable for customization!</li>
                                        <li>Next, you choose the percentage of summarization, anywhere from 0% up to 100%, and click the Summarize button</li>
                                        <li>The AI in KeyPoints uses the Summary Percentage to determine which portions of your content are the most important for your presentation; the AI then seamlessly and automatically displays the KeyPoints in the right-side display.</li>
                                        <li>Simply click on a Summary Point in the sidebar and add it to your Presentation!</li>
                                        <li>Check out our Demo below for a walkthrough of KeyPoints in action!</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- start page title section -->
            <center>
                    <div class="section-heading">
                        <h2>Screenshots</h2>
		    </div>
	    <br>
            <div class="w3-content w3-section" style="max-width:500px" style="padding-top: 15px;">
            <img class="demo" src="assets/img/demos/10xfaster.png">
            <img class="demo" src="assets/img/demos/first_card.png">
            <img class="demo" src="assets/img/demos/second_card.png">
	    <img class="demo" src="assets/img/demos/third_card.png">
	    </div>
            </center>
            <script>
               var myIndex = 0;
               carousel();

               function carousel() {
                 var i;
                 var x = document.getElementsByClassName("demo");
                 for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";  
                 }
                 myIndex++;
                 if (myIndex > x.length) {myIndex = 1}    
                 x[myIndex-1].style.display = "block";  
                 setTimeout(carousel, 3000); // Change image every 3 seconds
               }
            </script>
        <!-- start footer section -->
        <footer class="footer-style9 bg-white">


            <div class="footer-bar xs-font-size13">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-left xs-text-center xs-margin-5px-bottom">
                            <p>&copy; Copyright Intellippt.com
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>. <a href="/privacy">Privacy Policy</a> | <a href="/terms">License Agreement</a></p>
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
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

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

    <!-- custom scripts -->
    <!--script src="{{ asset('assets/js/main.js') }}"></script-->


    <!-- all js include end -->

    <style>
        .btn-primary{
            color: white !important;
        }
        </style>

    @stack('scripts')




    <script>
        $(document).ready(function(){


            $(".toolbox").click(function(){

                $(".toolbox").removeClass('btn-outline-primary');
                $(".toolbox").addClass('btn-outline-primary');
                $(".toolbox").removeClass('btn-primary');
                $(this).addClass('btn-primary');

                if($(this).attr('data-id') == "text"){
                    $(".texts").show();
                    $(".documents").hide();
                }else{
                    $(".texts").hide();
                    $(".documents").show();
                }
                
            });

            $(".project-grid").keyup(function(){

                // console.log($(this).text().length);

                if($(this).text().length > 520){


                    $(".project-grid").css("min-height",'unset');
                    $(".project-grid").css("max-height",'unset');
                    var curentheight = parseInt($(".project-grid").height()) + 30;
                    $(".project-grid").css("min-height",curentheight+'px');
                    $(".project-grid").css("max-height",curentheight+'px');
                    var plusadd = parseInt(curentheight) + 80;
                    $(".gallery").css("height",plusadd+'px');


                }else{

                    $(".project-grid").css("min-height",'250px');
                    $(".project-grid").css("max-height",'250px');
                    $(".gallery").css("height",'322px');

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

            $(".accoundetails").click(function(){

                var id = $(this).attr('id');

                $.ajax({
                    url : '{{ url("/accoutdetails") }}',
                    method : 'GET',
                    data : {id:id},
                    success:function(res){
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
          $(document).ready(function(){
              window.location.href="/handle";
          });
      </script>

@endif

@endif
{{-- @if(@$_GET['buystatus'] == "yes")
@php(session(['buystatus' => 'yes']))
@endif --}}
</body>
</html>
