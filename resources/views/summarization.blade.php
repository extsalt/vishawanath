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
                        </div>
                        <div class="resp-tab-content hor_1" aria-labelledby="hor_1_tab_item-1" style="display:none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection