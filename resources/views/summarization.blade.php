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
                        <li class="resp-tab-item hor_1" aria-controls="hor_1_tab_item-1" role="tab">Text</li>
                    </ul>
                    <div class="resp-tabs-container hor_1">
                        <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0"
                            style="display:block">
                            <p>Summarize PDF/DOCX and create</p>
                            <button class="butn theme"
                                onclick="event.preventDefault(); $('#staticBackdrop').show();">Start here</button>
                        </div>


                        <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1" style="display:none">
                            <form action="">
                                <textarea name="prompt" class="form-control" cols="30" rows="2"
                                    placeholder="Enter your prompt"></textarea>
                                <button class="butn theme" style="margin:10px 0;">Create Slides</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2a8ae2; color:white;">
                    <p class="modal-title fs-5" id="staticBackdropLabel">Summarize File</p>
                </div>
                <div class="modal-body">
                    <form action="" class="form-inline">
                        <div class="form-group mb-2">
                            <label for="">Choose File</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Page Range</label>
                            <input type="text" name="file" placeholder="1, 2-4" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="justify-content: space-between">
                    <button type="button" class="butn theme" data-bs-dismiss="modal"
                        onclick="$('#staticBackdrop').hide();">Create Slides</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="$('#staticBackdrop').hide();">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection