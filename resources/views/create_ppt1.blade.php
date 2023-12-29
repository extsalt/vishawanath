<?php $numofai = 1; $text_char_limit = 100; $file_upload_size = 5000; $user_signed_in = true;?>
@extends('layouts.app')
@section('title', 'About - Intellippt')
@section('meta_desc')
<meta name="description" content="IntelliPPT's About page">
@overwrite
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

  #uploadStatus img,
  #muploadStatus img {
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
<!-- start page title section -->

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
            <img src="/assets/img/beta-48.png" alt="beta banner" style="position: absolute; right: -30px; top: -30px">
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
                <span style="display: block; color: blue;">&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; Browse for a
                </span><span style="color: blue">pdf / docx file</span><span style="color: blue"> for
                  summarization</span>
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
          placeholder="Intellippt summarizes your text. Start by writing or pasting something here and then press the Summarize button. You can also upload an article in PDF or DOCX format. Summarize by simplifying the text.">
        </div>
        <div class="ss"></div>
      </div>
      <div class="col-md-6 items" id="output-container">
        <div class="project-grid outputbox --dev-api-result" id="outputboxppt">
        </div>

        <div class="project-grid outputbox --dev-api-result" id="output-file">

        </div>
      </div>
    </div>

    <!-- end project section -->

    <div class="button_operations row form-row" style=" background-color: white; ">
      <div class="characters_used col-12 col-md-2" style="margin-bottom: auto;margin-top: auto;text-align: center;
          color: black;padding-left: 10px!important; padding-top: 7px;" id="characters_used"> 0/
        <?= 100 ?>
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
      <?php } else { ?>
      <?php } ?>

      @endauth
    </div>
  </div>
  <div class="row alert alert-warning d-none loadingbar" style=" color: black; ">
    <div class="col-md-12">
      <div class="d-flex justify-content-center">
        <p class="h3">Loading... </p>
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
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


  var numofai = <?= $numofai ?>;
  var content_id = 'inputboxppt';
  var max = <?= $text_char_limit ?>;
  var char_limit = <?= $text_char_limit ?>;

  var file_upload_size = <?= @$file_upload_size ?>;
  var buy_validate = '<?php echo @$buy_validate; ?>';
  var userSignedIn = true;

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
        formData.append('percentage', $('.sumarize_percentage .percent').text().split('%')[0]);
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
    if (window.__intellipptState) {
      window.__intellipptState = new Map();
    }
  }

  function isFilePresent() {
    if (window.__intellipptState) {
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
    if (window.__intellipptState) {
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
@endsection