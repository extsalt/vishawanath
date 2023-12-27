@if(env('PAYPAL_MODE') == "live")
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="myForm">
    <input type="hidden" name="business" value="{{ env('PAYPAL_LIVE_BUSINESS_EMAIL') }}">
@else
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="myForm">
    <input type="hidden" name="business" value="sb-hv52i7809867@business.example.com">
    <!---<input type="hidden" name="business" value="{{ env('PAYPAL_SANDBOX_BUSINESS_EMAIL') }}">-->
@endif
    <input type="hidden" name="custom" value="{{ Auth::id() }}">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Intellippt_keypoints">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="amount" value="4">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="return" value="{{ url('/account_keypoints') }}">
    <input type="hidden" name="cancel_return" value="{{ url('/cancel_keypoints') }}">
    <!--<input type="hidden" name="notify_url" value="https://intellippt.com/notify">-->
    <input type="hidden" name="notify_url" value="{{ env('NOTIFY_URL') }}">
</form>
<script>
    document.getElementById("myForm").submit();
</script> 
