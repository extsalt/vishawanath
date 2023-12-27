@extends('layouts.app')

@section('content')


<section class="" style="padding-top: 90px;">
    <div class="container-fluid">
    <div class="">
    	<div class="">
         <h6 class="text-left alert alert-danger" style="font-size: 1em;" > <i class="fa fa-times-circle"></i> Sorry! Your Payment has been cancelled...! </h6>
     </div>
     <div class="">
     	<img src="https://thumbs.gfycat.com/ImaginativeNeighboringIchneumonfly-size_restricted.gif">
     </div>
    </div>
 </div>
</section>

<style>
.footer-style9{
display: none;
}
</style>
<script type="text/javascript">
	setTimeout(function()
	{
         window.location = "/home/#pricing";
	},1200);
</script>
@endsection
