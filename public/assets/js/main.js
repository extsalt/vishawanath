!function(e){"use strict";var i=e(window);function o(){var o,t;o=e(".full-screen"),t=i.height(),o.css("min-height",t),function(){var o=e("header").height(),t=e(".screen-height"),a=i.height()-o;t.css("height",a)}()}e("#preloader").fadeOut("normall",(function(){e(this).remove()})),i.on("scroll",(function(){var o=i.scrollTop(),t=e(".navbar-brand img"),a=e(".navbar-brand.logodefault img"),l=e(".navbar-brand.logowhite img"),s=e(".navbar-brand.logowhite-dark img"),r=e(".navbar-brand.logo2 img"),n=e(".navbar-brand.logo3 img");o<=50?(e("header").removeClass("scrollHeader").addClass("fixedHeader"),t.attr("src","assets/img/logos/intellitppt.png"),a.attr("src","assets/img/logos/intellitppt.png"),l.attr("src","assets/img/logos/intellitppt.png"),s.attr("src","assets/img/logos/intellitppt.png"),r.attr("src","assets/img/logos/intellitppt.png"),n.attr("src","assets/img/logos/intellitppt.png")):(e("header").removeClass("fixedHeader").addClass("scrollHeader"),t.attr("src","assets/img/logos/intellitppt.png"),a.attr("src","assets/img/logos/intellitppt.png"),l.attr("src","assets/img/logos/intellitppt.png"),s.attr("src","assets/img/logos/intellitppt.png"),r.attr("src","assets/img/logos/intellitppt.png"),n.attr("src","assets/img/logos/intellitppt.png"))})),i.on("scroll",(function(){e(this).scrollTop()>500?e(".scroll-to-top").fadeIn(400):e(".scroll-to-top").fadeOut(400)})),e(".scroll-to-top").on("click",(function(i){i.preventDefault(),e("html, body").animate({scrollTop:0},600)})),e(".parallax,.bg-img").each((function(i){e(this).attr("data-background")&&e(this).css("background-image","url("+e(this).data("background")+")")})),e(".story-video,.about-video").magnificPopup({delegate:".video",type:"iframe"}),e(".popup-youtube").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),0!==e(".copy-clipboard").length&&(new ClipboardJS(".copy-clipboard"),e(".copy-clipboard").on("click",(function(){var i=e(this);i.text();i.text("Copied"),setTimeout((function(){i.text("Copy")}),2e3)}))),e(".source-modal").magnificPopup({type:"inline",mainClass:"mfp-fade",removalDelay:160}),e("#tab1").click((function(){e("#second, #third").fadeOut(),e("#first").fadeIn(1e3)})),e("#tab2").click((function(){e("#first, #third").fadeOut(),e("#second").fadeIn(1e3)})),e("#tab3").click((function(){e("#second, #first").fadeOut(),e("#third").fadeIn(1e3)})),i.resize((function(e){setTimeout((function(){o()}),500),e.preventDefault()})),o(),e(document).ready((function(){if(0!==e("#chBar").length){var i=document.getElementById("chBar");i&&new Chart(i,{type:"bar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{data:[350,365,425,475,525,575,625,675,725,775,825,875],backgroundColor:["rgba(28, 51, 65,0.8)","rgba(0, 135, 115,0.8)","rgba(107, 185, 131,0.8)","rgba(242, 201, 117,0.8)","rgba(237, 99, 83,0.8)","rgba(242, 190, 84,0.8)","rgba(240, 217, 207,0.8)","rgba(135, 174, 180,0.8)","rgba(21, 62, 92,0.8)","rgba(237, 85, 96,0.8)","rgba(201, 223, 241,0.8)","rgba(240, 217, 207,0.9)"]}]},options:{scales:{xAxes:[{barPercentage:.5,categoryPercentage:1}],yAxes:[{ticks:{beginAtZero:!1}}]},legend:{display:!1}}})}if(0!==e("#myPieChart").length){var o=document.getElementById("myPieChart").getContext("2d");new Chart(o,{type:"pie",data:{labels:["Red","Blue","Yellow","Green"],datasets:[{data:[10,15,20,30],backgroundColor:["rgba(255, 99, 132, 0.8)","rgba(54, 162, 235, 0.8)","rgba(255, 206, 86, 0.8)","rgba(75, 192, 192, 0.8)"]}]}})}var t,a;(e("#services-carousel").owlCarousel({loop:!0,responsiveClass:!0,dots:!1,nav:!0,navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],responsive:{0:{items:1,margin:0},768:{items:2,margin:0},992:{items:3,margin:0}}}),e(".carousel-style1 .owl-carousel").owlCarousel({loop:!0,dots:!1,nav:!0,navText:["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],autoplay:!0,autoplayTimeout:5e3,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:1,margin:0},481:{items:2,margin:5},500:{items:2,margin:20},992:{items:3,margin:30},1200:{items:4,margin:30}}}),e(".carousel-style2 .owl-carousel").owlCarousel({loop:!1,dots:!0,nav:!1,autoplay:!0,autoplayTimeout:5e3,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:1,margin:0},481:{items:2,margin:5},500:{items:2,margin:20},992:{items:3,margin:30},1200:{items:3,margin:30}}}),e(".blog-style-8").owlCarousel({loop:!0,dots:!1,nav:!1,autoplay:!0,autoplayTimeout:4e3,responsiveClass:!0,smartSpeed:900,autoplayHoverPause:!1,responsive:{0:{items:1,margin:15},481:{items:2,margin:15},500:{items:2,margin:20},992:{items:2,margin:30}}}),e("#service-grids").owlCarousel({loop:!0,dots:!1,nav:!1,autoplay:!0,autoplayTimeout:2500,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:1,margin:0},768:{items:2,margin:20},992:{items:3,margin:30}}}),e(".home-business-slider").owlCarousel({items:1,loop:!0,autoplay:!0,smartSpeed:800,nav:!0,dots:!1,navText:['<span class="fas fa-chevron-left"></span>','<span class="fas fa-chevron-right"></span>'],responsive:{0:{nav:!1},768:{nav:!0}}}),e("#clients").owlCarousel({loop:!0,nav:!1,dots:!1,autoplay:!0,autoplayTimeout:3e3,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:2,margin:20},768:{items:3,margin:40},992:{items:4,margin:60},1200:{items:5,margin:80}}}),e("#project-single").owlCarousel({loop:!1,nav:!1,responsiveClass:!0,dots:!1,responsive:{0:{items:1,margin:15},600:{items:2,margin:15},1e3:{items:3,margin:15}}}),e(".project-single-two .owl-carousel").owlCarousel({loop:!1,nav:!1,responsiveClass:!0,dots:!1,margin:15,responsive:{0:{items:1,margin:15},576:{items:2,margin:20},768:{items:3,margin:20},992:{items:3,margin:25},1200:{items:4,margin:30}}}),e(".slider-fade .owl-carousel").owlCarousel({items:1,loop:!0,margin:0,autoplay:!0,smartSpeed:500,mouseDrag:!1,animateIn:"fadeIn",animateOut:"fadeOut"}),e(".slider-fade-shop .owl-carousel").owlCarousel({items:1,loop:!0,margin:0,autoplay:!0,nav:!1,dots:!0,smartSpeed:500,mouseDrag:!1,animateIn:"fadeIn",animateOut:"fadeOut",responsive:{0:{items:1},1200:{dots:!1,nav:!0,navText:['<span class="fas fa-chevron-left"></span>','<span class="fas fa-chevron-right"></span>']}}}),e(".services-grids").owlCarousel({loop:!1,nav:!1,responsiveClass:!0,dots:!1,autoplay:!0,smartSpeed:500,mouseDrag:!1,responsive:{0:{items:1,margin:15,mouseDrag:!0},768:{items:2,margin:20,mouseDrag:!0},1200:{items:3,margin:25,mouseDrag:!1}}}),e(".owl-carousel").owlCarousel({items:1,loop:!0,dots:!1,margin:0,autoplay:!0,smartSpeed:500}),e(".slider-fade").on("changed.owl.carousel",(function(i){var o=i.item.index-2;e("h3").removeClass("animated fadeInUp"),e("h1").removeClass("animated fadeInUp"),e("p").removeClass("animated fadeInUp"),e(".butn").removeClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find("h3").addClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find("h1").addClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find("p").addClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find(".butn").addClass("animated fadeInUp")})),e(".slider-fade-shop").on("changed.owl.carousel",(function(i){var o=i.item.index-2;e("p").removeClass("animated fadeInUp"),e("h1").removeClass("animated fadeInUp"),e(".subheading").removeClass("animated fadeInUp"),e(".butn").removeClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find(".subheading").addClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find("h1").addClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find("p").addClass("animated fadeInUp"),e(".owl-item").not(".cloned").eq(o).find(".butn").addClass("animated fadeInUp")})),0!==e("#rev_slider_149_1").length)&&(a=jQuery)(document).ready((function(){null==a("#rev_slider_149_1").revolution?revslider_showDoubleJqueryError("#rev_slider_149_1"):a("#rev_slider_149_1").show().revolution({sliderType:"standard",jsFileLocation:"revolution/js/",sliderLayout:"fullwidth",dottedOverlay:"none",delay:9e3,snow:{startSlide:"first",endSlide:"last",maxNum:"400",minSize:"0.2",maxSize:"6",minOpacity:"0.3",maxOpacity:"1",minSpeed:"30",maxSpeed:"100",minSinus:"1",maxSinus:"100"},navigation:{keyboardNavigation:"off",keyboard_direction:"vertical",mouseScrollNavigation:"off",mouseScrollReverse:"default",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},arrows:{style:"uranus",enable:!0,hide_onmobile:!1,hide_onleave:!1,tmp:"",left:{h_align:"left",v_align:"center",h_offset:10,v_offset:0},right:{h_align:"right",v_align:"center",h_offset:10,v_offset:0}}},responsiveLevels:[1240,1024,778,480],visibilityLevels:[1240,1024,778,480],gridwidth:[1240,1024,778,480],gridheight:[868,768,960,720],lazyType:"none",scrolleffect:{blur:"on",maxblur:"20",on_slidebg:"on",direction:"top",multiplicator:"2",multiplicator_layers:"2",tilt:"10",disable_on_mobile:"off"},parallax:{type:"scroll",origo:"slidercenter",speed:400,levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55]},shadow:0,spinner:"spinner3",stopLoop:"off",stopAfterLoops:-1,stopAtSlide:-1,shuffle:"off",autoHeight:"off",fullScreenAutoWidth:"off",fullScreenAlignForce:"off",fullScreenOffsetContainer:"",fullScreenOffset:"60px",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:!1}})}));0!==e("#rev_slider_2").length&&(a=jQuery)(document).ready((function(){null==a("#rev_slider_2").revolution?revslider_showDoubleJqueryError("#rev_slider_2"):a("#rev_slider_2").show().revolution({sliderType:"standard",sliderLayout:"fullwidth",dottedOverlay:"none",delay:9e3,spinner:"spinner4",navigation:{keyboardNavigation:"off",keyboard_direction:"horizontal",mouseScrollNavigation:"off",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},arrows:{enable:!0,style:"metis",tmp:"",rtl:!1,hide_onleave:!0,hide_onmobile:!0,hide_under:0,hide_over:9999,hide_delay:200,hide_delay_mobile:1200,left:{container:"slider",h_align:"left",v_align:"center",h_offset:20,v_offset:0},right:{container:"slider",h_align:"right",v_align:"center",h_offset:20,v_offset:0}},bullets:{enable:!1}},responsiveLevels:[1240,1024,767,480],gridwidth:[1170,1170,767,480],gridheight:[700,700,600,600],lazyType:"none",shadow:0,shuffle:"off",autoHeight:"off"})}));0!==e("#rev_slider_1014_1").length&&(a=jQuery)(document).ready((function(){null==a("#rev_slider_1014_1").revolution?revslider_showDoubleJqueryError("#rev_slider_1014_1"):t=a("#rev_slider_1014_1").show().revolution({sliderType:"standard",jsFileLocation:"revolution/js/",sliderLayout:"fullscreen",dottedOverlay:"none",delay:9e3,navigation:{keyboardNavigation:"off",keyboard_direction:"horizontal",mouseScrollNavigation:"off",mouseScrollReverse:"default",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},arrows:{style:"uranus",enable:!1,hide_onmobile:!0,hide_under:768,hide_onleave:!1,tmp:"",left:{h_align:"left",v_align:"center",h_offset:20,v_offset:0},right:{h_align:"right",v_align:"center",h_offset:20,v_offset:0}}},responsiveLevels:[1240,1024,778,480],visibilityLevels:[1240,1024,778,480],gridwidth:[1240,1024,778,480],gridheight:[868,768,960,600],lazyType:"none",shadow:0,spinner:"off",stopLoop:"on",stopAfterLoops:0,stopAtSlide:1,shuffle:"off",autoHeight:"off",fullScreenAutoWidth:"off",fullScreenAlignForce:"off",fullScreenOffsetContainer:"",fullScreenOffset:"0",disableProgressBar:"on",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:!1}}),RsTypewriterAddOn(a,t)}));0!==e("#rev_slider_3").length&&(a=jQuery)(document).ready((function(){null==a("#rev_slider_3").revolution?revslider_showDoubleJqueryError("#rev_slider_3"):a("#rev_slider_3").show().revolution({sliderLayout:"fullscreen",delay:12e3,responsiveLevels:[4096,1024,778,420],gridwidth:[1170,1024,778,410],gridheight:600,hideThumbs:10,fullScreenAutoWidth:"on",fullScreenOffsetContainer:".rev-offset",navigation:{onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},arrows:{enable:!0,style:"hermes",tmp:'<div class="tp-arr-allwrapper">  <div class="tp-arr-imgholder"></div> <div class="tp-arr-titleholder">{{title}}</div> </div>',left:{h_align:"left",v_align:"center",h_offset:0,v_offset:0},right:{h_align:"right",v_align:"center",h_offset:0,v_offset:0}},bullets:{style:"",enable:!1,hide_onmobile:!1,hide_onleave:!0,hide_delay:200,hide_delay_mobile:1200,hide_under:0,hide_over:9999,direction:"horizontal",space:12,h_align:"center",v_align:"bottom",h_offset:0,v_offset:30,tmp:""}},parallax:{type:"scroll",levels:[5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85],origo:"enterpoint",speed:400,bgparallax:"on",disable_onmobile:"on"},spinner:"spinner4"})}));0!==e("#rev_slider_151_1").length&&(a=jQuery)(document).ready((function(){null==a("#rev_slider_151_1").revolution?revslider_showDoubleJqueryError("#rev_slider_151_1"):a("#rev_slider_151_1").show().revolution({sliderType:"standard",jsFileLocation:"revolution/js/",sliderLayout:"fullscreen",dottedOverlay:"none",delay:9e3,navigation:{keyboardNavigation:"off",keyboard_direction:"vertical",mouseScrollNavigation:"off",mouseScrollReverse:"default",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},arrows:{style:"uranus",enable:!0,hide_onmobile:!1,hide_over:479,hide_onleave:!1,tmp:"",left:{h_align:"left",v_align:"center",h_offset:0,v_offset:0},right:{h_align:"right",v_align:"center",h_offset:0,v_offset:0}}},responsiveLevels:[1240,1024,778,480],visibilityLevels:[1240,1024,778,480],gridwidth:[1240,1024,778,480],gridheight:[868,768,960,720],lazyType:"none",scrolleffect:{blur:"on",maxblur:"20",on_slidebg:"on",direction:"top",multiplicator:"2",multiplicator_layers:"2",tilt:"10",disable_on_mobile:"off"},parallax:{type:"scroll",origo:"slidercenter",speed:400,levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55]},shadow:0,spinner:"spinner3",stopLoop:"off",stopAfterLoops:-1,stopAtSlide:-1,shuffle:"off",autoHeight:"off",fullScreenAutoWidth:"off",fullScreenAlignForce:"off",fullScreenOffsetContainer:"",fullScreenOffset:"0",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:!1}})}));0!==e("#rev_slider_1174_1").length&&(a=jQuery)(document).ready((function(){null==a("#rev_slider_1174_1").revolution?revslider_showDoubleJqueryError("#rev_slider_1174_1"):a("#rev_slider_1174_1").show().revolution({sliderType:"hero",jsFileLocation:"revolution/js/",sliderLayout:"fullscreen",dottedOverlay:"none",delay:9e3,navigation:{},responsiveLevels:[1240,1024,778,480],visibilityLevels:[1240,1024,778,480],gridwidth:[1240,1024,778,480],gridheight:[868,768,960,720],lazyType:"none",parallax:{type:"scroll",origo:"slidercenter",speed:400,levels:[10,15,20,25,30,35,40,-10,-15,-20,-25,-30,-35,-40,-45,55],type:"scroll"},shadow:0,spinner:"off",autoHeight:"off",fullScreenAutoWidth:"off",fullScreenAlignForce:"off",fullScreenOffsetContainer:"",fullScreenOffset:"0",disableProgressBar:"on",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",disableFocusListener:!1}})}));0!==e(".horizontaltab").length&&e(".horizontaltab").easyResponsiveTabs({type:"default",width:"auto",fit:!0,tabidentify:"hor_1",activate:function(i){var o=e(this),t=e("#nested-tabInfo");e("span",t).text(o.text()),t.show()}}),0!==e(".childverticaltab").length&&e(".childverticaltab").easyResponsiveTabs({type:"vertical",width:"auto",fit:!0,tabidentify:"ver_1",activetab_bg:"#fff",inactive_bg:"#F5F5F5",active_border_color:"#c1c1c1",active_content_border_color:"#c1c1c1"}),0!==e(".verticaltab").length&&e(".verticaltab").easyResponsiveTabs({type:"vertical",width:"auto",fit:!0,closed:"accordion",tabidentify:"hor_1",activate:function(i){var o=e(this),t=e("#nested-tabInfo2");e("span",t).text(o.text()),t.show()}})})),i.on("load",(function(){e(".single-img").magnificPopup({delegate:".popimg",type:"image"}),e(".gallery").magnificPopup({delegate:".popimg",type:"image",gallery:{enabled:!0}});var o=e(".gallery").isotope({});e(".filtering").on("click","span",(function(){var i=e(this).attr("data-filter");o.isotope({filter:i})})),e(".filtering").on("click","span",(function(){e(this).addClass("active").siblings().removeClass("active")})),i.stellar()}))}(jQuery);
