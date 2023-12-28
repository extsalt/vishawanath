@extends('layouts.app')
@section('title', 'About - Intellippt')
@section('meta_desc')
<meta name="description" content="IntelliPPT's About page">
@overwrite
@section('content')
<!-- start page title section -->

<section class="bg-light-gray no-padding-bottom" style="padding-top: 12px; padding-bottom: 300px;">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 100px 0px;">
                <h2>Summarize PDF/DOCX and create slides in seconds!</h2>
            </div>
            <div class="col-12" style="margin: 50px 0px;">
                <div class="horizontaltab" style="display: block; width: 100%; margin: 0px;">
                    <ul class="resp-tabs-list hor_1">
                        <li class="resp-tab-item hor_1 resp-tab-active" aria-controls="hor_1_tab_item-0" role="tab">
                            </i> File</li>
                        <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab">Prompt</li>
                    </ul>
                    <div class="resp-tabs-container hor_1">
                        <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0"
                            style="display:block">
                            <p>Summarize PDF/DOCX and create</p>
                            <button class="butn theme" onclick="event.preventDefault(); $('#staticBackdrop').show();"
                                style="z-index: 1;">Create Slides</button>
                        </div>


                        <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1" style="display:none">

                            <textarea name="prompt" class="form-control js-text" cols="30" rows="2"
                                placeholder="Enter your prompt"></textarea>

                            <div class="form-group js-loader-2" style="display: none; margin-top: 20px;">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            <div class="form-group js-error-2-container" style="display: none; margin-top:20px;">
                                <p class="js-error-2" style="color: red"></p>
                            </div>

                            <div class="form-group js-download-2" style="display: none; margin-top:20px;">
                                <a target="_blank" id="js-download-file-2">Download PPT</a>
                            </div>
                            <button class="butn theme" style="margin:10px 0; z-index: 1;"
                                onclick="create_slides_prompt();">Create
                                Slides</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="background-color: #000000a6; !important;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2a8ae2; color:white;">
                    <p class="modal-title fs-5" id="staticBackdropLabel">Summarize File</p>
                </div>
                <div class="modal-body">
                    <form action="" class="form-inline js-file-form">
                        <div class="form-group mb-2">
                            <label for="">Choose File</label>
                            <input type="file" name="file" id="slide_file" class="form-control js-file">
                        </div>
                        <div class="form-group">
                            <label for="">Page Range</label>
                            <input type="text" name="page_range" placeholder="1, 2-4"
                                class="form-control js-page-range">
                        </div>
                        <div class="form-group js-loader-1" style="display: none">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <div class="form-group js-error-1-container" style="display: none">
                            <p class="js-error-1" style="color: red"></p>
                        </div>

                        <div class="form-group js-download-1" style="display: none">
                            <a target="_blank" id="js-download-file-1">Download PPT</a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="justify-content: space-between">
                    <button type="button" class="butn theme" data-bs-dismiss="modal" onclick="createSlides();">Create
                        Slides</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="$('#staticBackdrop').hide();">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function createSlides() {
        var formData = new FormData();
        formData.append('file', document.getElementById('slide_file').files[0]);
        formData.append('page_range', $('.js-page-range').val());
        $('.js-error-1-container').hide();
        $('.js-download-1').hide();
        $('.js-loader-1').show();
        $.ajax({
            type: "POST",
            url: "/create-slides",
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.file) {
                    $('.js-download-1').show();
                    document.getElementById('js-download-file-1').href = result.file;
                }
                if (result.message) {
                    $('.js-error-1-container').show();
                    $('.js-error-1').html(result.message);
                }
            },
            complete: function () {
                $('.js-loader-1').hide();
            }
        });
    }

    function create_slides_prompt() {
        var formData = new FormData();
        formData.append('prompt', $('.js-text').val());
        $('.js-error-2-container').hide();
        $('.js-download-2').hide();
        $('.js-loader-2').show();
        $.ajax({
            type: "POST",
            url: "/create-slides-propmt",
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.file) {
                    $('.js-download-2').show();
                    document.getElementById('js-download-file-2').href = result.file;
                }
                if (result.message) {
                    $('.js-error-2-container').show();
                    $('.js-error-2').html(result.message);
                }
            },
            complete: function () {
                $('.js-loader-2').hide();
            }
        });
    }
</script>
@endpush
@endsection