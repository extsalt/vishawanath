@extends('layouts.app')
@section('title', 'Online Summarization Tool | PDF Summarizer | Summarize articles, text, documents with IntelliPPT')
@push('styles')
<style type="text/css">
    div.project-grid {
        min-height: 250px;
        max-height: 250px;
        overflow-y: auto;
        text-align: left;
        border: 1px solid #eee;
        overflow-x: hidden;
        padding: 10px;
        border-radius: 10px;
        background-color: #fff;
    }

    div.button_operations {
        border: 0px solid #eee;
        border-radius: 10px;
        min-height: 60px;
    }

    div.gallery {
        border: 1px solid #a0a0a0;
        border-radius: 10px;
        background-color: #a0a0a0;
    }

    div.percent {
        position: absolute;
        right: -35px;
        top: 13px;
        font-weight: bold;
        color: black !important;
    }

    div.ui-slider-range {
        background-color: green;
    }

    div.sumarize_percentage {
        padding-top: 20px;
    }

    div.characters_used {
        font-size: 14px;
        color: #fff;
        font-weight: bold;
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    #inputboxppt[placeholder]:empty:before {
        content: attr(placeholder);
        color: grey;
    }

    #intell_loader {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 99999;
        width: 100%;
        height: 100%;
        overflow: visible;
        background: #fff;
        display: table;
        text-align: center;
        display: none;
    }

    #message_para {
        font-weight: bold;
        text-align: center;
    }

    #uploadStatus {
        text-align: center;
    }

    #uploadStatus img, #muploadStatus img {
        width: 75px;
    }

    #file_upload_progress {
        margin-top: 10px;
    }

    .qq {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    #summary_file_upload {
        position: absolute;
        left: 39.5%;
        top: 49%;
    }

    .summary_file_upload_btn {
        background-color: rgba(243, 243, 243, 0.37);
        color: #333;
        padding: 2px 10px;
        cursor: hand;
        cursor: pointer;
        font-size: 14px;
        border: 1px solid rgba(243, 243, 243, 1);
    }

    .summary_file_upload_btn:hover {
        color: #2a8ae2;
        cursor: hand;
        cursor: pointer;
    }

    #tag_title {
        font-size: 26px;
    }

    #tag_subtitle {
        font-size: 22px;
    }

    @media screen and (max-width: 600px) {
        /* .col-md-4 { -ms-flex: 0 0 33%; flex: 0 0 33%; max-width: 33%;}
        .col-md-3 { -ms-flex: 0 0 25%; flex: 0 0 25%; max-width: 25%;} */
        div.percent {
            position: absolute;
            right: 24px;
            top: 33px;
            font-weight: bold;
            color: #fff;
        }
    }


</style>
@endpush
@section('content')
<!-- start project section -->
<section class="bg-light-gray no-padding-bottom" style="padding: 90px 0px;">
    <div class="container">
        <div class="row">
            <br>
        </div>
        <div class="row">
            <div class="filtering col-sm-12 text-center">
                <h1>AI-Powered Online Summarization Tool</h1>
                <h2>Summarization by simplification</h2>
                <h3>Summarize Text/PDF/DOCX</h3>
                <p style="font-size:140%;">Summarize any piece of text into brief and easily understandable content. Go
                    through long and complex sentences 3X-5X faster.</p>
                <br>
                <a href="#summarization">
                    <button id="sumarize" type="button" class="butn theme"><span>SUMMARIZE NOW - IT'S FREE</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="bg-light-gray no-padding-bottom" style="padding: 10px -150px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="padding-5px-tb sm-no-padding-top sm-padding-10px-bottom">
                    <div class="section-heading half left">
                        <h4>AI-Summarization by Simplification</h4>
                    </div>
                    <strong><p>Summarize the content by splitting long sentences and abridging them. Useful in
                            studying:</p>
                        <ul class="list-style-5">
                            <li>Research reports</li>
                            <li>Articles</li>
                            <li>Work/professional emails</li>
                            <li>Technical and white papers</li>
                        </ul>
                    </strong>
                    <br>
                    <a href="#summarization">
                        <button id="sumarize2" type="button" class="butn theme"><span>SUMMARIZE NOW</span></button>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12" ; style=" margin-top: -150px;">
                <video height="640" width="100%" autoplay loop muted="" controls>
                    <source src="/assets/video/intellippt-explainer.mp4">
                </video>
            </div>
        </div>
    </div>
</section>
<section class="bg-light-gray no-padding-bottom" style="padding: 10px 0px;" id="howdoes">
    <div class="container">
        <div class="section-heading">
            <h2>How does AI-summarizer work?</h2>
        </div>
        <strong><p>Whether you are reading an academic article or a business report or a blog, you may want to go
                through the text fast without skipping any sentence. Intellippt splits long sentences and abridges them,
                so that you can go through the content very fast.</p></strong>
        <div class="row margin-50px-bottom sm-margin-30px-bottom">
            <div class="col-12">
                <div class="horizontaltab">
                    <ul class="resp-tabs-list hor_1">
                        <li><i class="fas fa-university"></i> Academic Article</li>
                        <li><i class="fas fa-book"></i> Business report</li>
                        <li><i class="fas fa-blog"></i> Blog</li>
                    </ul>
                    <div class="resp-tabs-container hor_1">
                        <div>

                            <!--vertical Tabs-->

                            <div class="childverticaltab">
                                <ul class="resp-tabs-list ver_1">
                                    <li>Article</li>
                                    <li>Summary</li>
                                </ul>
                                <div class="resp-tabs-container ver_1">
                                    <div>
                                        Turner provided evidence in his Gordon R. Willey speech that two catastrophic
                                        droughts contributed to the downfall and depopulation of a civilisation that not
                                        only possessed colossal building but also a profound grasp of mathematics and
                                        astronomy.Aspects of this hypothesis have existed for a very long time.
                                        Archaeologists theorised that climatic change led to the demise of the Maya as
                                        early as 1912, and by the 1970s, it was widely believed that Maya lands had been
                                        heavily inhabited and industrialised.
                                    </div>
                                    <div>
                                        Two catastrophic droughts contributed to depopulation says Turner. <br>This
                                        hypothesis has existed for a very long time says Turner. <br>Climate change led
                                        to Maya's demise says Archaeologists.<br>Maya lands were heavily inhabited by
                                        1970s.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="childverticaltab">
                                <ul class="resp-tabs-list ver_1">
                                    <li>Report</li>
                                    <li>Summary</li>
                                </ul>
                                <div class="resp-tabs-container ver_1">
                                    <div>
                                        The overall number of passengers using public transportation in September 2010
                                        increased by 7 percent compared to the same month in 2009. September saw a 27.2%
                                        increase in rail ridership, demonstrating the continued growth of rail's
                                        popularity. Bus ridership increased by 4.4%, while ferry ridership decreased by
                                        2.2%. There has also been a continuous growth in the use of public
                                        transportation over the past three months, with a 6.2% increase over the same
                                        period last year. Consequently, rail usage is up 18.2%, bus usage is up 4.7%,
                                        and ferry usage is down 0.4% compared to the previous year. The Northern Express
                                        continues to see remarkable growth, with September ridership up 20.2% and
                                        year-to-date ridership up 20.0% compared to the same time period in the previous
                                        year.
                                    </div>
                                    <div>
                                        September 2010 passenger numbers increase 7 percent. <br> September saw 27.%
                                        increase in rail ridership.<br>Bus ridership rises by 4.%, ferry ridership down.<br>Public
                                        transport use continues to increase.<br>It rises by 6% compared to same period
                                        last year.<br>Rail, bus usage up 18.%, ferry usage down 0.1%.<br>Northern
                                        Express continues to grow.<br>Ridership increases 20 percent in September.
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div>
                            <div class="childverticaltab">
                                <ul class="resp-tabs-list ver_1">
                                    <li>Blog</li>
                                    <li>Summary</li>
                                </ul>
                                <div class="resp-tabs-container ver_1">
                                    <div>City of Bayside Osaka, the country's third biggest metropolis, is a major
                                        centre for the country's economy, culture, and history. Osaka takes great pride
                                        in her rich history, which has earned her the nicknames "City of Merchants" and
                                        "Japan's Kitchen." This area has been inhabited for thousands of years, and due
                                        to its strategic positioning, it served as the cornerstone of early Japanese
                                        culture. The city of Osaka was already a cultural powerhouse back when Tokyo was
                                        but a backwater known as Edo. Unfortunately, throughout WWII, Osaka suffered and
                                        was extensively damaged by bombings that almost entirely devastated the city.
                                        Despite the devastating blows she had taken, she quickly rose from the ashes and
                                        was rebuilt. I'll be honest: Osaka isn't the most aesthetically pleasing
                                        metropolis, and that's because its quick reconstruction prioritised practicality
                                        above aesthetics.
                                    </div>
                                    <div>Osaka is the 3rd biggest metropolis.<br>Osaka takes great pride in rich
                                        history, nicknames 'City of Merchants'.<br>This area was inhabited for thousands
                                        of years.<br>Osaka was already a cultural powerhouse back then.<br>WWII, Osaka
                                        suffered and was severely damaged.<br>Despite devastating blows, she quickly
                                        rose from ashes.<br>Osaka not most aesthetically pleasing metropolis says I'll
                                        be honest.<br>Quick reconstruction prioritizes practicality over aesthetics.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-very-light-gray no-padding-bottom" style="padding: 10px 0px;" id="summarization">
    <br><br>
    <div class="container">
        <div class="section-heading">
            <h2>Summarizer</h2>
        </div>
        <div class="row">
            <div class="tools mb-2 ml-3" style="display: flex; width: 100%">
                <div style="flex-grow: 1">
                    <button type="button" class="qq toolbox toolbox1  btn-primary " data-id="text"><i
                            class="fas fa-spell-check"></i> Text
                    </button>
                    <button type="button" class="qq toolbox toolbox2 btn-outline-primary" data-id="document"><i
                            class="fas fa-file"></i> Documents
                    </button>
                </div>

                <div class="--dev-text-file-button" style="flex-grow: 1; display: flex; margin-left: -40px">
                    <button type="button" class="qq btn-outline-primary" data-id="" id="btn-text">
                        <i class="fas fa-spell-check"></i> Text
                    </button>

                    <div style="position: relative; margin-left: 0.5rem">
                        <button type="button" class="qq btn-outline-primary" id="btn-file">
                            <i class="fas fa-file"></i>
                            File
                        </button>
                        <img src="/assets/img/beta-48.png" alt="beta banner"
                             style="position: absolute; right: -30px; top: -30px">
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 documents --dev-file-chooser"
             style="background-color: white;height: 190px;border-radius: 10px;border: 8px solid #a0a0a0;">

            <div class="py-4">
                <h5 class="text-center">Choose a document</h5>
                <div id="summary_file_upload">
                    <form id="read_doc" action="/" method="post" enctype="multipart/form-data">
                        <label for="read_doc_file">
                            <div class="summary_file_upload_btn"
                                 style="background-color: #007bff;border-color: #007bff;border-radius: 5px;background: white;">
                                <span style="display: block; color: blue;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; Browse for a </span><span
                                    style="color: blue">pdf / docx file</span><span style="color: blue"> for summarization</span>
                            </div>
                            <input type="file" id="read_doc_file" name="read_doc_file" style="display: none;"
                                   accept="application/pdf, .docx">
                        </label>
                    </form>
                </div>
            </div>

        </div>

        <div class="gallery texts text-center form-row"
             style="border-radius: 21px;height: 384px;background-color: #043d5e;position: relative;">

            <div class="col-md-6 items ">
                <div class="project-grid inputbox" id="inputboxppt" contenteditable="true"
                     placeholder="Intellippt summarizes your text. Start by writing or pasting something here and then press the Summarize button. You can also upload an article in PDF or DOCX format. Summarize by simplifying the text."></div>
                <div class="ss"></div>
            </div>
            <div class="col-md-6 items" id="output-container">
                <div class="project-grid outputbox --dev-api-result" id="outputboxppt">
                </div>

                <div class="project-grid outputbox --dev-api-result" id="output-file">

                </div>
            </div>


            <!--div class="col-md-12 items">
				<div class="col-md-6 " style="padding-left: 0px;">
					<div class="button_operations form-row">
						<div class="characters_used col-md-4" style="padding-top: 13px;" id="characters_used">
							0/<?= $text_char_limit ?> Characters
						</div>
						<div class="sumarize_percentage col-md-3 ">
							<div class="bar"></div>
							<div class="percent"/>40%</div>
						</div>
						<div class="col-md-4 offset-md-1">
							<button id="sumarize_btn" type="button" class="butn theme btn-block" style="margin-top: 2px; border-radius: 5px; z-index: 1;"><span>Summarize</span></button>
						</div>
					</div>
				</div>
				<div class="col-md-6 ">

				</div>
			</div-->
        </div>

        <!-- end project section -->

        <div class="button_operations row form-row" style=" background-color: white; ">
            <div class="characters_used col-12 col-md-2" style="margin-bottom: auto;margin-top: auto;text-align: center;
          color: black;padding-left: 10px!important; padding-top: 7px;" id="characters_used"> 0/<?= $text_char_limit ?>
                Characters
            </div>
            <div class="col-12 col-md-3 sumarize_percentage " style="color:black; margin-left: 40px; ">
                <div class="d-flex" style='color: blue;'>
                    <strong><span class="mr-2">Key Sentences</span>
                        <div class="custom-control custom-switch" style='color: blue;'>
                            <input type="checkbox" class="custom-control-input" id="customSwitch2" style='color: blue;'>
                            <label class="custom-control-label" id="AIcheck" for="customSwitch2">AI Summarizer</label>
                    </strong>
                </div>
            </div>
        </div>
        <div class="col-10 sumarize_percentage col-md-3" id="sumsize" style=" margin-left: 40px; ">
            <div class="sumsize" style=" margin-top: -10px; ">
                <div style="font-size: 15px;color:blue">Summary Size</div>
                <div class="bar"></div>
                <div class="percent" style="color:black;padding-top: 10px;">40%</div>
            </div>
            <div class="aioption d-none" style=" margin: auto; text-align: center; ">
                <div class="d-flex">
                    <span class="mr-2" style="font-size: 15px;color:blue"> Split Long Sentences Yes</span>
                    <div class="custom-control custom-switch" style="font-size: 15px;color:blue">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3">
                        <label class="custom-control-label" for="customSwitch3">No</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 offset-md-1  col-md-2" style="margin-left: 70px;">
            <button id="sumarize_btn" type="button" class="butn theme "
                    style="margin-top: 10px; border-radius: 5px; z-index: 1;"><span>Summarize</span></button>
        </div>
    </div>
    <div class="row">
        <div class="alert alert-warning shownonregister d-none" role="alert">
            @guest

            <strong><a href='/register?status=1' style='color: #0073dc; aria-label="register"'>Sign Up</a> and get AI
                summaries. Get 100 advanced AI summaries for Free when you sign up. <a
                    href='/blog/summarization-with-simplification' style='color: #0073dc;' aria-label="simplification">Know
                    More </a>about how AI summarization works.</strong>

            @endguest

            @auth
            <?php if (!$user_signed_in and $numofai >= 100) { ?>
                <strong>You have exceeded the maximum number allowed for free uses. <a
                        style='color: #0073dc;text-decoration:underline;' href='/#pricing'>Please subscribe the
                        plan.</a></strong>
            <?php } else { ?><?php } ?>

            @endauth
        </div>
    </div>
    <div class="row alert alert-warning d-none loadingbar" style=" color: black; ">
        <div class="col-md-12">
            <div class="d-flex justify-content-center"><p class="h3">Loading... </p>
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<br> <br>
<span id="convert_to_ppt" style="display: block; height:45px; margin-top: -45px; visibility: hidden;"></span>
<section class="bg-light-gray no-padding-bottom" style="padding-top: 12px;">
    <div class="container">
        <div class="row">

            <div class="filtering col-sm-12 text-center">
                <h2>Summarize PDF/DOCX and create slides in seconds!</h2>
            </div>
            <div class="col-sm-12 col-lg-6 offset-lg-3 col-md-6 offset-md-3">
                <form id="file_upload" action="/createppt" method="post" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="userfile"
                               accept="application/pdf, .docx">
                        <label class="custom-file-label" for="customFile">Choose file</label>

                    </div>

                    <div class="file_upload_details">
                        <!--button id="upload_btn" type="button" class="butn theme btn-block"><span>Upload</span></button-->
                        <div class="progress" id="file_upload_progress" style="display: none;">
                            <div class="progress-bar"></div>
                        </div>
                        <div id="uploadStatus"></div>
                        <a href="#" id="download_btn" class="btn btn-success btn-block" style="display: none;"
                           target="_blank">Download PPT</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
<!-- start benefits section -->
<section class="lg bg-transparent bg-img cover-background " data-overlay-dark="0"
         data-background="{{ asset('assets/img/bg/shape-01.png')}}" style="padding-top:20px;">
    <br><br><br>
    <div class="container">
        <div class="section-heading title-style8">
            <h2>Our Benefits</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 margin-30px-bottom sm-margin-20px-bottom">
                <div class="feature-box-05 padding-40px-tb md-padding-30px-tb padding-20px-lr bg-white h-100">
                    <div class="row">
                        <div class="col-2">
                            <div class="features-icon">
                                <i class="icon-profile-male"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <h3 class="font-weight-600 font-size20 md-font-size18 sm-font-size16 margin-10px-bottom sm-margin-8px-bottom">
                                Intelligent</h3>
                            <p class="no-margin-bottom">Intellippt uses Artificial Intelligence to summarize article
                                DOCX and PDF format.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 margin-30px-bottom sm-margin-20px-bottom">
                <div class="feature-box-05 padding-40px-tb md-padding-30px-tb padding-20px-lr bg-white h-100">
                    <div class="row">
                        <div class="col-2">
                            <div class="features-icon">
                                <i class="icon-adjustments"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <h3 class="font-weight-600 font-size20 md-font-size18 sm-font-size16 margin-10px-bottom sm-margin-8px-bottom">
                                Simplifies your job</h3>
                            <p class="no-margin-bottom">Converts document to presentable PPT. Saves time in creating
                                presentations.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 xs-margin-20px-bottom">
                <div class="feature-box-05 padding-40px-tb md-padding-30px-tb padding-20px-lr bg-white h-100">
                    <div class="row">
                        <div class="col-2">
                            <div class="features-icon">
                                <i class="icon-recycle"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <h3 class="font-weight-600 font-size20 md-font-size18 sm-font-size16 margin-10px-bottom sm-margin-8px-bottom">
                                Saves time</h3>
                            <p class="no-margin-bottom">Saves time to go through the document and make presentation from
                                it</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="feature-box-05 padding-40px-tb md-padding-30px-tb padding-20px-lr bg-white h-100">
                    <div class="row">
                        <div class="col-2">
                            <div class="features-icon">
                                <i class="icon-grid"></i>
                            </div>
                        </div>
                        <div class="col-10">
                            <h3 class="font-weight-600 font-size20 md-font-size18 sm-font-size16 margin-10px-bottom sm-margin-8px-bottom">
                                Support</h3>
                            <p class="no-margin-bottom">We offer great support. Mail us to <a
                                    href="mailto:info@intellippt.com">info@intellippt.com</a> for any support queries
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end benefits section -->

<style>

    section.pricing {
        background: #f7faff;
        /* background: linear-gradient(to right, #0062E6, #33AEFF); */
    }

    .pricing .card {
        border: none;
        border-radius: 1rem;
        transition: all 0.2s;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .pricing hr {
        margin: 1.5rem 0;
    }

    .pricing .card-title {
        margin: 0.5rem 0;
        font-size: 0.9rem;
        letter-spacing: .1rem;
        font-weight: bold;
    }

    .pricing .card-price {
        font-size: 3rem;
        margin: 0;
    }

    .pricing .card-price .period {
        font-size: 0.8rem;
    }

    .pricing ul li {
        margin-bottom: 1rem;
    }

    .pricing .text-muted {
        opacity: 0.7;
    }

    .pricing .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        opacity: 0.7;
        transition: all 0.2s;
    }

    /* Hover Effects on Card */

    @media (min-width: 992px) {
        .pricing .card:hover {
            margin-top: -.25rem;
            margin-bottom: .25rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        }

        .pricing .card:hover .btn {
            opacity: 1;
        }
    }

    .razorpay-payment-button {
        display: none;
    }

    .badge-overlay {
        position: absolute;
        left: 0%;
        top: 0px;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 100;
        -webkit-transition: width 1s ease, height 1s ease;
        -moz-transition: width 1s ease, height 1s ease;
        -o-transition: width 1s ease, height 1s ease;
        transition: width 0.4s ease, height 0.4s ease
    }

    .top-left {
        position: absolute;
        top: 0;
        left: 0;
        -ms-transform: translateX(-30%) translateY(0%) rotate(-45deg);
        -webkit-transform: translateX(-30%) translateY(0%) rotate(-45deg);
        transform: translateX(-30%) translateY(0%) rotate(-45deg);
        -ms-transform-origin: top right;
        -webkit-transform-origin: top right;
        transform-origin: top right;
    }

    .badge.orange {
        background: #007bff;
    }

    .badge {
        margin: 0;
        padding: 0;
        color: white;
        padding: 4px 10px;
        font-size: 13px;
        text-align: center;
        line-height: normal;
        text-transform: uppercase;
    }

    .badge::before, .badge::after {
        content: '';
        position: absolute;
        top: 0;
        margin: 0 -1px;
        width: 100%;
        height: 100%;
        background: inherit;
        min-width: 55px
    }

    .badge::before {
        right: 100%
    }

    .badge::after {
        left: 100%
    }
</style>

<!-- start pricing -->
<section class="bg-light-gray" id="pricing">
    <div class="container">

        <div class="section-heading">
            <h2>Our Pricing</h2>
        </div>
        <section class="pricing py-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <!-- Free Tier -->
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h6 class="card-price text-center">$0</h6>
                                <div class="badge-overlay">
                                    <!-- Change Badge Position, Color, Text here-->
                                    <span class="top-left badge orange" style="    top: 18px;background: #6c757d;">&emsp;&emsp;Free</span>
                                </div>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Allowed for below
                                            3000 characters Summarization</strong></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Free 100 AI
                                            summarization</strong></li>

                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>File Upload upto 1 MB
                                    </li>
                                </ul>
                                <a href="javascript:;"
                                   class="btn btn-block btn-primary text-uppercase disabled">Free</a>
                            </div>
                        </div>
                    </div>
                    <!-- Plus Tier -->
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h6 class="card-title text-center"></h6>
                                <h6 class="card-price text-center">$5<span class="period">/month</span></h6>
                                <div class="badge-overlay">
                                    <!-- Change Badge Position, Color, Text here-->
                                    <span class="top-left badge orange">Premium</span>
                                </div>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upto 50000
                                            characters Summarization</strong></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upto 3000
                                            characters AI Summarization</strong></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited AI
                                            summarization</strong></li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>File Upload upto 5 MB
                                    </li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Convert to PPT</li>
                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>NO
                                            AUTO-RENEWAL</strong></li>
                                    {{--
                                    <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly
                                        Status Reports
                                    </li>
                                    --}}
                                </ul>

                                <a @if(!empty(Auth::id())) href="/handle" @else href="/login?status=1&buystatus=yes"
                                   @endif class="btn btn-block btn-primary text-uppercase buyfeature">Buy</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- end pricing -->

<form action="{{ url('/payment_check') }}" method="POST">
    @csrf
    <script
        data-key="rzp_test_KrTaPREUKeeYSr"
        data-amount="300"
        data-currency="INR"
        data-buttontext="Pay with Razorpay"
        data-name="Intellippt"
    <!--data-image="https://intellippt.b-cdn.net/images/logo.png"-->
    data-image="{{ asset('assets/img/logos/intellitppt.png') }}"
    data-prefill.name="{{ @Auth::user()->name }}"
    data-prefill.email="{{ @Auth::user()->email }}"
    data-theme.color="#F37254"
    ></script>
</form>


<!-- start features section -->
<section class="bg-light-gray" id="features">
    <div class="container">

        <div class="section-heading">
            <h2>Our Features</h2>
        </div>

        <div class="row mt-60">
            <div class="col-lg-4 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                <div class="service-block4 h-100">
                    <div class="service-icon">
                        <i class="fas fa-assistive-listening-systems"></i>
                    </div>
                    <div class="service-desc">
                        <h3>AI for presenters</h3>
                        <ul>
                            <li>The online Intellippt PDF to PPT converter uses artificial intelligence to make
                                presenters' jobs easier.
                            </li>
                            <li>In the world we live in now, a good visual presentation of your story is more powerful
                                than just text.
                            </li>
                            <li>Converting PDF to PPT is a very complicated process.</li>
                            <li>With our AI converter tool, we work hard to give you great quality.</li>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                <div class="service-block4 h-100">
                    <div class="service-icon">
                        <i class="icon-layers"></i>
                    </div>
                    <div class="service-desc">
                        <h3>Creates ppt by summarizing the document</h3>
                        <p>Intellippt PDF to ppt converter can do a good job of summarising a PDF document so that you
                            don't have to read through it over and over again.<br>If you want to convert PDF to ppt, you
                            don't have to go through the document yourself and mark each page as a separate slide.</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                <div class="service-block4 h-100">
                    <div class="service-icon">
                        <i class="icon-presentation"></i>
                    </div>
                    <div class="service-desc">
                        <h3>Make presentations</h3>
                        <h3>with less effort</h3>
                        <p>As we have seen the PDF to powerpoint presentation is completed in a few minutes with very
                            little effort on our part. <br>Intellippt just have to go through the 3 step process and
                            click on the upload button and our work of converting PDF to presentation is taken care of.
                            <br>It takes your document and converts it to a presentable ppt. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 sm-margin-30px-bottom xs-margin-20px-bottom">
                <div class="service-block4 h-100">
                    <div class="service-icon">
                        <i class="icon-clock"></i>
                    </div>
                    <div class="service-desc">
                        <h3>Save time and money</h3>
                        <p>Intellippt is the ultimate time saving PDF to ppt converter tool. <br>It is essential in
                            today’s fast paced world where output is an instantaneous requirement. <br>With the huge
                            amount of content available on the internet in the current scenario; any content which
                            stands out is welcome and is most effective in putting a point across to the audience.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 xs-margin-20px-bottom">
                <div class="service-block4 h-100">
                    <div class="service-icon">
                        <i class="icon-document"></i>
                    </div>
                    <div class="service-desc">
                        <h3>Takes Docx and </h3>
                        <h3>PDF as input</h3>
                        <p>Even though currently we only take PDF input we also offer other services that is available
                            which will let you easily convert word document to ppt effectively and in an impactful
                            manner; helping you to put your point across with authority.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features section -->

<section>
    <div class="container">
        <div class="section-heading">
            <h4>More info on Summarization</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="accordion" class="accordion-style">
                    <div class="card">
                        <div class="card-header" id="heading32">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse32"
                                        aria-expanded="true" aria-controls="heading32">Elements of a Good Summary
                                </button>
                            </h3>
                        </div>
                        <div id="collapse10" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div>A good summary should hold the following elements:</div>
                            <ul>
                                <li>The first sentence should contain both title and author's name.</li>
                                <li>The first sentence should also hold the thesis statement of the text. It also needs
                                    to cover the core ideas that the presenter showcases in their works.
                                </li>
                                <li>The length of the summary varies based on the size of the primary source document.
                                    Every short text needs to be reduced to a single paragraph, and ensure to make your
                                    writing short if you find your text quite long.
                                </li>
                                <li>Every summary needs to have arguments that are biased on the thesis statement. It
                                    needs to be in the text, and the critical thing you need to know here is you should
                                    not express your opinion. Instead, you need to make it based on the author's
                                    opinion.
                                </li>
                                <li>All your highlighting evidence needed to be showcased in single sentences should be
                                    represented in a one-paragraph summary.
                                </li>
                                <li>In case you have a multi-paragraph summary, you need to ensure every paragraph holds
                                    the topic sentence in its starting line.
                                </li>
                                <li>The conclusion needs to be in a way that conveys the complete text you have
                                    explained and highlights the critical information.
                                </li>
                                <li>Ensure your summary is not half longer than the original document to make is a
                                    summary. Omit some unwanted examples and details and make it short from the source
                                    materials; probably one-third would be the perfect pick.
                                </li>
                                <li>You need to note down before writing a summary to highlight the essential phrases,
                                    keywords, key points, topic sentences, conclusions, and outline every paragraph in
                                    the margin.
                                </li>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingfour">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="headingfour">Types of Summaries
                                </button>
                            </h3>
                        </div>
                        <div id="collapse11" class="collapse show" aria-labelledby="headingfour"
                             data-parent="#accordion">
                            <div>There are many various types of summaries, and below are some of the top summary
                                varieties listed.
                            </div>
                            <ul>
                                <li>Abstract: It belongs to the summary type and is mostly used for scientific papers.
                                    It holds rules and fixed structures that are considered to be strict when compared
                                    to other summaries. The abstract is essential when it comes to publishing a research
                                    paper, and also, you can find different automatic abstract generators come in handy.
                                </li>
                                <li>Executive Summary: This type of summary is used in political contexts or business.
                                    It's also represented as an official document that highlights every report
                                    fundamental so that it's easy for people to get stuck with the long paper.
                                </li>
                                <li>Synopsis: A brief summary is represented as a synopsis. It is mostly used in art
                                    context or literature. It usually contains the primary point of the provided story
                                    and concise plot versions. Most of the publishers use this summary for marketing.
                                </li>
                                <li>Outline: It highlights any document's basic framework. It deals with essential ideas
                                    but lacks discussion and examples. For instance, a writer plans an overview before
                                    composing the complete paper to organize their thoughts.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading5">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse5"
                                        aria-expanded="true" aria-controls="heading5">Summary & conclusion generators
                                    today
                                </button>
                            </h3>
                        </div>
                        <div id="collapse13" class="collapse show" aria-labelledby="heading5" data-parent="#accordion">
                            <div>You can find neural networks, artificial intelligence, and machine learning developing
                                rapidly in the present digital world. At this point, it's the best decision to make use
                                of the online PDF article summarizer to add up the development process. Modern and
                                updated summarizing tools provide you best results without considering the text's
                                summary length and complexity.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading10">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="heading10">Why our online PDF article
                                    summarizer tool is a must for you?
                                </button>
                            </h3>
                        </div>
                        <div id="collapse15" class="collapse show" aria-labelledby="headingTwo"
                             data-parent="#accordion">
                            <div>The summary tool from us provides a clear structure, and therefore, the text can be
                                easily found. In case you are working with significant summaries, then our summarizer
                                tool help divide the largest texts into complete paragraphs and significant parts. Our
                                summarizer tools are also influential in smooth transition making from general to
                                specific and also uncover any crucial details in the text. You acquire good readability
                                without any semantic flaws, broken-up sentences, dangling references, and information
                                noise.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseThree">Online PDF article
                                    summarizer's five practical advantages
                                </button>
                            </h3>
                        </div>
                        <div id="collapse16" class="collapse show" aria-labelledby="headingTwo"
                             data-parent="#accordion">
                            <ul>
                                <li>1.There is no chance of missing any important information from the provided text.
                                    Our summarizer tool scans the complete text and takes just the key points. It means
                                    you get the full and clear picture of your provided text in the shorter version.
                                </li>
                                <li>2.The online PDF article summarizer tool works instantly; you need to copy and paste
                                    the text in the summary box and then summarize the text.
                                </li>
                                <li>3.Our summarizer tool provides you accurate and precise points as short snippets,
                                    and therefore, it increases your total productivity.
                                </li>
                                <li>4. The result of study sessions is often the summaries, written answers, and notes.
                                    It means the summarizer tool can quickly boost your study process.
                                </li>
                                <li>5. Summary generators are becoming the best part of every review session and play an
                                    essential role when preparing for your exam or tests.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading16">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse12"
                                        aria-expanded="true" aria-controls="heading16">The three essential summary types
                                    of conclusion generators.
                                </button>
                            </h3>
                        </div>
                        <div id="collapse6" class="collapse show" aria-labelledby="heading6" data-parent="#accordion">
                            <ul>
                                <li>1. Extraction based: The summarizer tool extract snippers from the complete provided
                                    text without altering or changing them in any way. The process works the same as
                                    extracting key phrases, and the primary purpose of this deals with individual words
                                    or phrases which can be used as tags for the document or text. As a whole, an
                                    extraction-based summarizer takes the essential information from the preliminary
                                    test and collects the pieces to create a detailed summary.
                                </li>
                                <li>2. Abstraction based: The next stage of extraction is based on an advanced summary.
                                    This state's main thing is paraphrasing the text parts that you put into the
                                    summarizer tool initially. This type of summary efficiently delivers results that
                                    work best when compared to the extraction-based summaries. Currently, most of the
                                    generating tools are extraction-based.
                                </li>
                                <li>3. Aided summarization: The summary tool of these type of merge findings from the
                                    fields of information retrieval, text mining, and machine learning to enhance the
                                    automatic summary generation process
                                </li>
                            </ul>
                        </div>
                        <div class="card-header" id="heading7">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="heading7">More about summarizer
                                </button>
                            </h3>
                        </div>
                        <div id="collapse17" class="collapse show" aria-labelledby="heading7" data-parent="#accordion">
                            <ul>
                                <li> Summarization Tool: Intellippt is AI based paragraph summarizer that uses both
                                    extractive summarization as well as abstractive summarization mechanisms. One can
                                    summarize online using Intellippt and it is the best summarizer. The summarize tool
                                    takes input of paragraph and generate the summary paragraph.
                                <li> Summary Maker: Intellippt is not only a summarize tool but also a text simplifier.
                                    Intellippt is a free summarizing tool.
                                <li> Summarizer online: It is an online summarize tool, a word summarizer, simplifier
                                    and professional summary maker.
                                <li> Free Summarizing Tool: Intellippt is a summarizer online, free summarizing tool and
                                    word summarizer.
                                <li> Free Online PDF summarizer: Intellippt takes PDF as input. It is a summarize
                                    article generator.
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- start faq section -->
<section>
    <div class="container">
        <div class="section-heading">
            <h4>Frequently Asked Questions</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="accordion" class="accordion-style">
                    <div class="card">
                        <div class="card-header" id="heading31">
                            <h3 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="heading31">Tips for the online article
                                    summarizing
                                </button>
                            </h3>
                        </div>
                        <div id="collapse18" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">Summary generators are referred to as the online tool that summarizes
                                articles automatically. They explore and extract accurate data from the provided text.
                                You can find many free summarizers found on different websites. It's relatively easy to
                                use a summarizing tool. You just need to copy and paste the text, set the words' length
                                as you require, and get your text summarized.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading14">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse14"
                                        aria-expanded="false" aria-controls="collapse14"> Why do you need to summarize?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                The primary use of summarizing is to provide the reader with the best idea of what the
                                relevant text deals with. You need to make up points by using your own words. A useful
                                summary tool holds the ability to highlight the critical parts, clarify the text
                                meaning, and shows how properly the author has understood the material.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading23">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse25"
                                        aria-expanded="false" aria-controls="collapse25"> How do you summarize a book?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="heading24" data-parent="#accordion">
                            <div class="card-body">
                                Reading it thoroughly is the first step you need to do when summarizing a book. Makes
                                notes of the critical events while reading. Start writing once you become familiar with
                                the line. Use the keywords from the quick notes you have taken from the books. Once
                                completed, summarize them, read or edit your work as per your requirements.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Do you have any app for the article summarizing?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                There are many summary makers for the article summarizing, and you can find them in the
                                Google Play or Apple Store. There are also free summarizing tools available. You can use
                                our summary generator article summarizer to get your text summarized uniquely.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h3 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Tips for article summarization without plagiarizing?
                                </button>
                            </h3>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                                Read the article multiple times so that you get an exact point out of the content.
                                • Go through the introduction clearly to find the thesis statement and paraphrase them.
                                • Note down the crucial phrases and key points so that you will not miss them.
                                • Check out your notes and compose your summary in a shorter version.
                                • List down every source you referred.
                                • You can also use our online PDF summarizer tool for accurate results.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end faq section -->

<!-- start contact-us section -->
<section class="bg-light-gray" style="padding-top: 45px;" id="contact_us">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-12 sm-margin-30px-bottom">

                <div class="padding-30px-right sm-no-padding-right">
                    <div class="row">
                        <div class="col-12">

                            <div class="section-heading left half">
                                <h4 class="font-weight-600">Contact Us</h4>
                            </div>

                        </div>

                        <div class="col-12 margin-5px-top">
                            <div
                                class="padding-25px-bottom sm-padding-20px-bottom border-bottom border-color-medium-gray">
                                <span
                                    class="d-inline-block font-size26 sm-font-size22 xs-font-size20 line-height-30 text-theme-color vertical-align-top width-30px xs-width-25px"><i
                                        class="fas fa-phone vertical-align-top"></i></span>
                                <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                    <h5 class="margin-5px-bottom text-uppercase font-size15 xs-font-size14">Phone
                                        Number</h5>
                                    <p class="no-margin line-height-normal">(+91) 81979 05105</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="padding-25px-tb sm-padding-20px-tb border-bottom border-color-medium-gray">
                                <span
                                    class="d-inline-block font-size26 sm-font-size22 xs-font-size20 line-height-30 text-theme-color vertical-align-top width-30px xs-width-25px"><i
                                        class="fas fa-map-marker-alt vertical-align-top"></i></span>
                                <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                    <h5 class="margin-5px-bottom text-uppercase font-size15 xs-font-size14">
                                        Location</h5>
                                    <p class="no-margin line-height-normal">GF-003, A Block, Greenaly Signature,
                                        Hulimavu, Bangalore, India. PIN: 560076</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="padding-25px-tb sm-padding-20px-tb border-bottom border-color-medium-gray">
                                <span
                                    class="d-inline-block font-size26 sm-font-size22 xs-font-size20 line-height-30 text-theme-color vertical-align-top width-30px xs-width-25px"><i
                                        class="far fa-envelope vertical-align-top"></i></span>
                                <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                    <h5 class="margin-5px-bottom text-uppercase font-size15 xs-font-size14">Email</h5>
                                    <p class="no-margin line-height-normal">info@intellippt.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="padding-25px-tb sm-padding-20px-tb">
                                <span
                                    class="d-inline-block font-size26 sm-font-size22 xs-font-size20 line-height-30 text-theme-color vertical-align-top width-30px xs-width-25px"><i
                                        class="icon-tools vertical-align-top" style="font-weight: bold"></i></span>
                                <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                    <h6 class="margin-5px-bottom text-uppercase font-size15 xs-font-size14">Social
                                        Media</h6>
                                    <p class="no-margin line-height-normal"><a
                                            href="https://www.facebook.com/Intellippt-108013524370072/"
                                            aria-label="facebook"><i class="fab fa-facebook-f"></i></a> | <a
                                            href="https://twitter.com/intellippt" aria-label="twitter"><i
                                                class="fab fa-twitter"></i></a></p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-6 col-md-12">
                <div class="contact-form-box">


                    <div class="section-heading left half">
                        <h4 class="font-weight-600">Drop us a message</h4>
                    </div>

                    <!-- start form here -->
                    <form class="quform" action="" method="post" enctype="multipart/form-data" onclick="">
                        <div class="quform-elements">
                            <div class="row">
                                <!-- Begin Text input element -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <input id="cname" type="text" name="cname" placeholder="Your name here"/>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Text input element -->

                                <!-- Begin Text input element -->
                                <div class="col-md-6">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <input id="cemail" type="text" name="cemail" placeholder="Your email here"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Text input element -->


                                <!-- Begin Textarea element -->
                                <div class="col-md-12">
                                    <div class="quform-element form-group">
                                        <div class="quform-input">
                                            <textarea id="cmessage" name="cmessage" rows="3"
                                                      placeholder="Tell us a few words"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Textarea element -->

                                <!-- Begin Captcha element -->
                                <div class="col-md-12">
                                    <div class="quform-element">
                                        <div class="form-group">
                                            <div class="">
                                                <!--input id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word" /-->
                                                <div id="grecaptcha" class="g-recaptcha"
                                                     data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Captcha element -->

                                <!-- Begin Submit button -->
                                <div class="col-md-12">
                                    <div class="quform-submit-inner">
                                        <button id="contact_btn" class="butn" type="submit"><span>Send Message</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Submit button -->

                            </div>

                        </div>

                    </form>

                    <!-- end form here -->

                </div>
            </div>

        </div>
    </div>
</section>
<!-- end advice form section -->

<div class="modal " tabindex="-1" id="modalMsg">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Intellippt.com Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="message_para"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal " tabindex="-1" id="modalUploadProgress">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Uploading</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <div class="progress" id="mfile_upload_progress">
                    <div class="progress-bar"></div>
                </div>
                <div id="muploadStatus"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="js-template d-none">
    <div id="js-template-success">
        <div style="width: 100%; display: flex; justify-content: end; margin-bottom: 0.5rem">
            <a class="qq btn-sm btn-primary" id="pdf-save-btn" target="_blank">
                <i class="fas fa-file-download"></i> Download
            </a>
        </div>

        <div style="width: 100%" class="js-render-pdf-here" >
            <object style="width: 100%; height: 450px" data="" id="pdf-render-object"></object>
        </div>
    </div>

    <div id="js-template-loading">
        <div style="width: 100%; display: flex; justify-content: center">
            <img src="/assets/img/loader.gif" alt="loader">
        </div>
    </div>

    <div id="js-template-error">
        <div style="width: 100%; display: flex; justify-content: center">
            <h5 style="color: orangered">Ah! some error has happened, try again later.</h5>
        </div>
    </div>

    <div id="js-template-initial">
        <div style="width: 100%; display: flex; justify-content: center; align-items: center">
            <h5 style="color: red">Select file  first</h5>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script async defer src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&hl=en" async defer></script>
<script type="text/javascript">
    var onloadCallback = function () {
        console.log("grecaptcha is ready!");
        grecaptcha.render('grecaptcha', {
            'sitekey': '{{ config("services.recaptcha.sitekey") }}'
        });
    };

</script>

<script>

    function sendForm() {
        document.getElementById('contactForm').submit();
    }

    // Function that loads recaptcha on form input focus
    function reCaptchaOnFocus() {
        var head = document.getElementsByTagName('head')[0]
        var script = document.createElement('script')
        script.type = 'text/javascript';
        script.src = 'https://www.google.com/recaptcha/api.js'
        head.appendChild(script);

        // remove focus to avoid js error:
        document.getElementById('subName').removeEventListener('focus', reCaptchaOnFocus)
        document.getElementById('subEmail').removeEventListener('focus', reCaptchaOnFocus)
    };
    // add initial event listener to the form inputs
    document.getElementById('subName').addEventListener('focus', reCaptchaOnFocus, false);
    document.getElementById('subEmail').addEventListener('focus', reCaptchaOnFocus, false);

</script>

<!-- MDB -->
<!-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"
></script> -->
@guest
<script type="text/javascript">

    $("#customSwitch2").click(function (event) {
            event.preventDefault();
            $('.shownonregister').removeClass('d-none');
//showMessage("Please Signup <a href='/register?status=1' style='color: #0073dc;text-decoration:underline;'>HERE</a> and get AI Summaries. <br>Get 100 advanced AI summaries for Free when you sign up.<br>");
        }
    );

</script>


@endguest

@auth
@if (!$user_signed_in and $numofai>=100)

<script type="text/javascript">

    $("#customSwitch2").click(function (event) {
            event.preventDefault();
            $('.shownonregister').removeClass('d-none');
        }
    );

</script>
@else
<script type="text/javascript">

    $("#customSwitch2").click(function (event) {
            var isai = $('#customSwitch2').is(':checked');
            console.log(isai);
            validate_charcount();

            if (isai == true) {
                $('.sumsize').addClass('d-none');

                $('.aioption').removeClass('d-none');

            } else {
                $('.aioption').addClass('d-none');

                $('.sumsize').removeClass('d-none');

            }
            if ($(".project-grid").text().length > 520) {


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

// $(".gallery").css("height",'266px');
                if (screen.width < 800) {
                    $(".gallery").css("height", '522px');


                } else {
                    $(".gallery").css("height", '266px');

                }

            }
            validate_charcount();

        }
    );

</script>
@endif

@endauth
<script type="text/javascript">
    function toolbox() {
        $(".toolbox1").click();
    }


    var numofai = <?=$numofai?>;
    var content_id = 'inputboxppt';
    var max = <?=$text_char_limit?>;
    var char_limit = <?=$text_char_limit?>;

    var file_upload_size = <?=$file_upload_size?>;
    var buy_validate = '<?php echo @$buy_validate; ?>';
    <?php
    if ($user_signed_in)
        echo 'var userSignedIn=true; ';
    else
        echo 'var userSignedIn=false; ';
    ?>

    //binding keyup/down events on the contenteditable div
    $('#' + content_id).keyup(function (e) {
        check_charcount(content_id, max, e);
    });
    $('#' + content_id).keydown(function (e) {
        check_charcount(content_id, max, e);
    });

    document.querySelector("div[contenteditable]").addEventListener("paste", function (e) {
        e.preventDefault();
        var text = e.clipboardData.getData("text/plain");
        document.execCommand("insertHTML", false, text);
        if ($('#' + content_id).text().length > max) {
            $('#' + content_id).text($('#' + content_id).text().substring(0, max));
            if ($('#' + content_id).text().length == 0)
                $("#summary_file_upload").show();
            else
                // $("#summary_file_upload").hide();
                e.preventDefault();
        }
    });

    function downloadFile(btn) {
        $('#uploadStatus').html('<p style="color:#28A74B; font-weight:bold;">File Downloaded.</p>');
        $("#download_btn").attr("href", "#");
        $("#download_btn").hide();
    }

    function validate_charcount() {
        if (userSignedIn) {
            isai = $('#customSwitch2').is(':checked');
            if (isai) {
                char_limit = 3000;

            } else {
                char_limit = 50000;

            }
        } else {
            char_limit = 3000;
        }

        if ($('#' + content_id).text().length > char_limit) {
            if (!userSignedIn)
                showMessage("Registered users can summarize upto 50,000 characters.<br/> <a style='color: #0073dc;text-decoration:underline;' href='/#pricing' >Please subscribe the plan.</a>");

            $('#' + content_id).text($('#' + content_id).text().substring(0, char_limit));
        }

        $("#characters_used").html($('#' + content_id).text().length + "/" + char_limit + " Characters");

        if ($('#' + content_id).text().length == 0)
            $("#summary_file_upload").show();
        else
            // $("#summary_file_upload").hide();

        if ($('#' + content_id).text().length > char_limit) {
            $('#' + content_id).text($('#' + content_id).text().substring(0, char_limit));
        }
    }

    function check_charcount(content_id, max, e) {
        validate_charcount();

        if (e.which != 8 && $('#' + content_id).text().length > max) {
            $('#' + content_id).text($('#' + content_id).text().substring(0, max));
            e.preventDefault();
        }
    }

    function showMessage(msg) {
        $("#message_para").html(msg);
        $('#modalMsg').modal('show');
        return false;
    }

    $("#contact_btn").click(function (e) {
        e.preventDefault();

        var captcha = $('textarea[id="g-recaptcha-response"]').val();

        if (captcha != undefined && captcha != '') {
            var name = $('#cname').val();
            var email = $('#cemail').val();
            var message = $('#cmessage').val();

            if (name == '' || email == '' || message == '') {
                showMessage("Please enter your name, email &amp; message.");
            } else {
                //showMessage(captcha);
                $("#contact_btn").hide();
                $.ajax({
                    type: "POST",
                    url: "/contactus",
                    data: {
                        "name": name,
                        "email": email,
                        "message": message,
                        "recaptcha": captcha,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (result) {
                        if (result != undefined && result['message'] != undefined)
                            showMessage(result['message']);

                        $("#contact_btn").show();
                    },
                    error: function (result) {

                        result = result.responseJSON;
                        if (result != undefined && result['message'] != undefined)
                            showMessage(result['message']);

                        $("#contact_btn").show();
                    }
                });
            }
        } else {
            showMessage("Verify Recaptcha");
        }
    });


    $("#sumarize_btn").click(function (e) {
        e.preventDefault();
        var inputTxt = $('#' + content_id).text();
        $(".loadingbar").removeClass('d-none');

        if (inputTxt.length <= max) {
            $.ajax({
                type: "POST",
                url: "/summarize",
                data: {
                    "text": $('#' + content_id).text(),
                    "perc": $('.sumarize_percentage .percent').text(),
                    "isai": $('#customSwitch2').is(':checked'),
                    "splittext": $('#customSwitch3').is(':checked'),
                    "signedin": userSignedIn,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (result) {
                    $(".loadingbar").addClass('d-none');

                    if (result != undefined && result['text'] != undefined) {
                        $(".texts").show();
                        $(".documents").hide();
                        $(".toolbox").removeClass('btn-primary');
                        $(".toolbox").addClass('btn-outline-primary');
                        $(".toolbox1").addClass('btn-primary');

                        $("#summary_file_upload").show();
                        $("#outputboxppt").html(result['text']);
                        window.__intellipptState.set('summarization', true);
                    }
                },
                error: function (result) {
                    $(".loadingbar").addClass('d-none');
                    showMessage("Error occurred. Please try again.");
                }
            });
        } else {
            showMessage("Only " + max + " characters allowed to summarize.");

        }
    });


    /*percentage*/
    $('.sumarize_percentage').each(function () {
        var $projectBar = $(this).find('.bar');
        var $projectPercent = $(this).find('.percent');
        var $projectRange = $(this).find('.ui-slider-range');
        $projectBar.slider({
            range: "min",
            animate: true,
            value: 40,
            min: 0,
            max: 100,
            step: 1,
            slide: function (event, ui) {
                $projectPercent.html(ui.value + "%");
            },
            change: function (event, ui) {
                var $projectRange = $(this).find('.ui-slider-range');
                var percent = ui.value;
                $projectPercent.css({
                    'color': '#fff'
                });
                $projectRange.css({
                    'background': 'green'
                });

            }
        });
    });


    $("#read_doc_file").on("change", function (event) {

        myfile = $(this).val();
        var ext = myfile.split('.').pop();
        if (ext == "pdf" || ext == "docx") {
            var fileName = $(this).val().split("\\").pop();
            var files = event.target.files;

            if (files != undefined && files[0] != undefined) {
                if (files[0].size > file_upload_size) {
                    if (userSignedIn)
                        showMessage("Please select file of less than 5mb size.");
                    else {
                        showMessage("Please select file of less than 1mb size. <br/>Registered users can upload file upto 5mb size.<br/><a href='/register?status=1'>Register FREE</a> / <a href='/login?status=1'>Sign In</a> / <a style='color: #0073dc;text-decoration:underline;' href='/#pricing' >Please subscribe the plan.</a>");
                    }

                    return false;
                }

            }
            var formData = new FormData();

            $.each(files, function (key, value) {
                formData.append("userfile", value);
            });

            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "/convert_document",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    window.__intellipptState.set('files', files);
                    $("#modalUploadProgress").hide();
                    if (result != undefined) {
                        if (result['text'] != undefined && result['text'] != '') {
                            $(".toolbox1").click();
                            var trimafterresult = $.trim(result['text']);
                            $("#inputboxppt").html(trimafterresult);
                            // $("#summary_file_upload").hide();
                            validate_charcount();

                            if ($(".project-grid").text().length > 520) {

                                $(".project-grid").css("min-height", 'unset');
                                $(".project-grid").css("max-height", 'unset');
                                var curentheight = parseInt($(".project-grid").height()) + 30;
                                $(".project-grid").css("min-height", curentheight + 'px');
                                $(".project-grid").css("max-height", curentheight + 'px');
                                var plusadd = parseInt(curentheight) + 80;
                                $(".gallery").css("height", plusadd + 'px');
                                //since request is successful, storing file for future usage


                            } else {
                                $(".project-grid").css("min-height", '250px');
                                $(".project-grid").css("max-height", '250px');
                                $(".gallery").css("height", '266px');
                            }

                        } else {
                            showMessage(result['message']);
                        }
                    }
                },
                error: function (result) {
                    $("#modalUploadProgress").hide();

                    if (result != undefined)
                        result = result.responseJSON;

                    if (result != undefined && result['message'] != undefined) {
                        showMessage(result['message']);
                    } else {
                        showMessage("File upload failed, please try again.");
                    }
                },
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    $("#modalUploadProgress").show();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $("#modalUploadProgress .progress-bar").width(percentComplete + '%');
                            $("#modalUploadProgress .progress-bar").html(percentComplete + '%');
                            if (percentComplete == 100) {
                                $('#muploadStatus').html('<p style="color:#2f55ff; font-weight:bold;">Processing the file. Please wait.</p><img src="/assets/img/loader.gif"/>');
                            }
                        }
                    }, false);
                    return xhr;
                },
                beforeSend: function () {
                    $("#modalUploadProgress .progress-bar").width('0%');
                    $('#muploadStatus').html('<img src="/assets/img/loader.gif"/>');
                },
            });

        } else {
            showMessage("Please select PDF or DOCX files only.");
        }
    });

    $(".custom-file-input").on("change", function (event) {

        $("#download_btn").hide();
        $("#download_btn").attr("href", "#");
        $(".progress-bar").width('0%');


        if (buy_validate == "yes") {


            myfile = $(this).val();
            var ext = myfile.split('.').pop();
            if (ext == "pdf" || ext == "docx") {


                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

                var files = event.target.files;
                var formData = new FormData();

                $.each(files, function (key, value) {
                    formData.append("userfile", value);
                });

                formData.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    url: "/createppt",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result != undefined) {
                            if (result['file_id'] != undefined && result['file_id'] != '') {
                                $('#file_upload')[0].reset();
                                $('#uploadStatus').html('<p style="color:#28A74B; font-weight:bold;">' + result['message'] + '</p>');
                                $("#download_btn").attr("href", "/download?file_id=" + result['file_id']);
                                $("#download_btn").show();

                            } else {
                                $('#file_upload')[0].reset();
                                $("#download_btn").hide();
                                $("#download_btn").attr("href", "#");
                                $('#uploadStatus').html('<p style="color:#EA4335; font-weight:bold;">' + result['message'] + '</p>');
                            }
                        }
                    },
                    error: function (result) {
                        $("#file_upload_progress").hide();
                        if (result != undefined)
                            result = result.responseJSON;

                        if (result != undefined && result['message'] != undefined) {
                            $('#uploadStatus').html('<p style="color:#EA4335; font-weight:bold;">' + result['message'] + '</p>');
                        } else
                            $('#uploadStatus').html('<p style="color:#EA4335; font-weight:bold;">File upload failed, please try again.</p>');
                    },
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                                if (percentComplete == 100) {
                                    $('#uploadStatus').html('<p style="color:#2f55ff; font-weight:bold;">Processing the file. Please wait.</p><img src="/assets/img/loader.gif"/>');
                                }
                            }
                        }, false);
                        return xhr;
                    },
                    beforeSend: function () {
                        $("#file_upload_progress").show();
                        $(".progress-bar").width('0%');
                        $('#uploadStatus').html('<img src="/assets/img/loader.gif"/>');
                    },
                });


            } else {
                showMessage("Please select PDF or DOCX files only.");
            }


        } else {
            showMessage("You are not a paid user. <a style='color: #0073dc;text-decoration:underline;' href='/#pricing' >Please subscribe the plan.</a>");
        }


    });

    var fileOutputContainer = document.getElementById('output-file');

    $(document).ready(function () {
        var textOutputContainer = $('#outputboxppt');
        var fileOutputContainer = $('#output-file');
        //default on load
        textOutputContainer.show();
        fileOutputContainer.hide();
        renderFileInitialState();

        $('#btn-text').on('click', function () {
            textOutputContainer.show();
            fileOutputContainer.hide();
        });

        $('#btn-file').on('click', function () {
            textOutputContainer.hide();
            fileOutputContainer.show();
            var f = file();
            if (f) {
                var formData = new FormData();
                formData.append('file', f);
                formData.append('paiduser', buy_validate);
                formData.append('percentage' ,$('.sumarize_percentage .percent').text().split('%')[0]);
                renderFileOutputLoadingState();
                fetch("/highlight_pdf", {
                    method: 'post',
                    body: formData,
                }).then(function (res) {
                    if (res.ok) return res.json();
                    throw new Error('Failed to highlight pdf');
                })
                    .then(function (json) {
                        var renderer = document.getElementById('pdf-render-object');
                        renderer.data = json.file;
                        var inputBoxPPT = document.getElementById('inputboxppt')
                        if (inputBoxPPT) {
                            renderer.style.maxHeight = inputBoxPPT.style.maxHeight;
                            renderer.style.minHeight = inputBoxPPT.style.minHeight;
                        }
                        var pdfSaveBtn = document.getElementById('pdf-save-btn');
                        pdfSaveBtn.href = json.file;
                        renderFileOutputSuccessState();
                        if (window.__intellipptState) {
                            window.__intellipptState.set('highlighting', true);
                        }
                    })
                    .catch(function (e) {
                        renderFileOutputErrorState();
                        console.log(e);
                    })
                    .finally(function () {
                        console.log('request complete');
                    })
            }
        });

        initState();
    });

    function renderFileInitialState() {
        var template = document.getElementById('js-template-initial').cloneNode(true);
        fileOutputContainer.innerHTML = '';
        fileOutputContainer.appendChild(template);
    }

    function renderFileOutputLoadingState() {
        var template = document.getElementById('js-template-loading').cloneNode(true);
        fileOutputContainer.innerHTML = '';
        fileOutputContainer.appendChild(template);
    }

    function renderFileOutputSuccessState() {
        var template = document.getElementById('js-template-success').cloneNode(true);
        fileOutputContainer.innerHTML = '';
        fileOutputContainer.appendChild(template);
    }

    function renderFileOutputErrorState() {
        var template = document.getElementById('js-template-error').cloneNode(true);
        fileOutputContainer.innerHTML = '';
        fileOutputContainer.appendChild(template);
    }

    function initState() {
        window.__intellipptState = new Map();
        return true;
    }

    function file() {
        if (window.__intellipptState) {
            return window.__intellipptState.get('files').item(0);
        }

        return null;
    }

    function destroyState() {
        if(window.__intellipptState) {
            window.__intellipptState = new Map();
        }
    }

    function isFilePresent() {
        if(window.__intellipptState) {
           var fileList = window.__intellipptState.get('files');

           return fileList instanceof FileList && fileList.length > 0
        }

        return false;
    }

    /**
     * Check if file has extension pdf,
     * proper check should be done at backend
     * @param file
     */
    function checkIfFileIsPdf(file) {
      return file instanceof File && file.name.split('.').pop() === 'pdf';
    }


    /**
     *
     */
    function isDocumentHighlightingDone() {
        if(window.__intellipptState) {
            return window.__intellipptState.get('highlighting') === true;
        }

        return false;
    }

    function isHighlightingRequired() {
        if (!isFilePresent()) return false;

        if (!checkIfFileIsPdf()) return false;

        if (isDocumentHighlightingDone()) return false;

        return true;
    }
</script>
@endpush

