@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">


 

<section class=" myaccounts"  >
    <div class="container-fluid">

    <h5 class="text-left" style="font-size: 1em; font-weight: bold;text-decoration: underline;">My Account (Service : Keypoints)</h5>
 
<?php  if($validate == "buy_need") { ?>
    <style>
        .maintable{
            display: none !important;
        }

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
          font-size: 1.5rem;
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
        .razorpay-payment-button{
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
        

        <div class="section-heading">
            <p>Currently we are not accepting payments for keypoints</p>
        </div>
<!-- start pricing -->


<?php }else{ ?>

    <p>Hi, Your Subscription ID : <b> {{ $orders->order_id  }} </b> &emsp; Subscription Date : <b>{{ @$orders->created_at }} </b> &nbsp;
<!---<?php if(@$orderscount == 1){ ?>
      <?php if(@$trails->trial_account_status == "inprogress" && @$orders->buy_account_status == "inprogress"){ ?>
      <a href="{{ url('paypalrefund_keypoints', @$orders->transaction_id) }}" class="btn btn-primary btn-sm" >Cancel Premium</a> 
      <?php } ?>
	<?php } ?> --->
       <a href="https://www.intellippt.com/#contact_us" class="btn btn-primary btn-sm">Cancel Premium</a> 
    </p>

    @if(!empty(@request()->session()->get('buynotificationmessage')))
    <div class="alert alert-success text-center">
        {{ @request()->session()->get('buynotificationmessage') }}
    </div>
    @php(session(['buynotificationmessage' => '']))

    @endif


    <div class="row  maintable">
        <div class="col-md-6">
            <div class="card card-white">
                <div class="card-heading clearfix">
                    <h6 class="pl-4 mt-3" style="font-size: 1em; font-weight: bold;text-decoration: underline;">Free Plan Info</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                         <tbody>
                             <tr>
                                <th scope="row">Start Date</th>
                                <td><?php  echo $trails->trial_account_date; ?>  </td>
                             </tr>
                            <tr>
                                <th scope="row">End Date</th>
                                <td><?php echo $trail_finish_date = date('Y-m-d H:i:s', strtotime(@$trails->trial_account_date. ' + 7 days')); ?></td>
                             </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td  style="capitalize" >
                                
                                  <?php if(@$trails->trial_account_status == "inprogress"){ ?>
                                        Active                              
                                  <?php }else{ ?>
                                       Inactive
                                  <?php } ?>

                                </td>
                             </tr>
    
                             <tr>   
                                <th scope="row">Plan Validity</th>

                                <?php if(@$trails->trial_account_status == "inprogress"){ ?>
                                  <td>
                                    <?php
                                         $date1=date_create($trail_finish_date);
                                        $date2=date_create(date('Y-m-d H:i:s'));
                                        $diff=date_diff($date1,$date2);
                                       echo $diff->format("%a") + 1;
                                        ?> Days
                                 </td>                        
                            <?php }else{ ?>
                              <td>0 Days</td>
                              
                            <?php } ?>
                                
                               
                             </tr>
                            
    
                        </tbody>
                    </table>
                </div>
            </div>

            <h6 class="pt-3 pl-3" style="font-size: 1em; font-weight: bold;text-decoration: underline;" >Features : </h6>
            <ul class="fa-ul">
              <?php if(@$orders->cost == 10){ ?>
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upload 1000 PDF Pages</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Summaries</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Copying to slides</li>
              <?php }elseif(@$orders->cost == 6){ ?>
               <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upload 500 PDF Pages</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Summaries</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Copying to slides</li>
             <?php }elseif(@$orders->cost == 4){ ?>
               <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Upload 100 PDF Pages</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Summaries</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Copying to slides</li>
             <?php } ?>
            </ul>

        </div>
    
        <div class="col-md-6">
            <div class="card card-white">
                <div class="card-heading clearfix">
                    <h6 class="pl-4 mt-3"  style="font-size: 1em; font-weight: bold;text-decoration: underline;">Premium Plan info</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                               <th scope="row">Start Date</th>
                               <td><?php  echo $orders->buy_account_date; ?></td>
                            </tr>
                           <tr>
                               <th scope="row">End Date</th>
                               <td><?php echo $buy_finish_date = date('Y-m-d H:i:s', strtotime(@$orders->buy_account_date. ' + 30 days')); ?></td>
                            </tr>
                            <tr>
                               <th scope="row">Status</th>
                               <td  style="capitalize" ><?php //echo ucfirst($trails->buy_account_status); ?>
                              
                                <?php if(@$orders->buy_account_status == "inprogress"){ ?>
                                  Active                              
                              <?php }elseif(@$orders->buy_account_status == "cancelled"){ ?>
                                  Inactive (cancelled )
                              <?php }else{ ?>
                                  Inactive
                                 <?php } ?>

                              </td>
                            </tr>
    
                            <tr>   
                               <th scope="row">Plan Validity</th>
                               <td>
                                @if(@$orders->buy_account_status == "inprogress")
                               
                               
                                 <?php
                 
                                     if(date('Y-m-d H:i:s') > $orders->buy_account_date){
                 
                                     $date1=date_create($buy_finish_date);
                                     $date2=date_create(date('Y-m-d H:i:s'));
                                     $diff=date_diff($date1,$date2);
                                     $ab = $diff->format("%a") + 1;

                                     echo $ab.' Days';
                 
                                     }else{
                                         echo '30 Days';
                                     }
                                 
                                 ?> 
                             
                             @elseif($orders->buy_account_status == "completed")
                                 0 Days
                              @else 
                                 @if(@$orders->buy_account_status == "cancelled")
                                 
                                  0 Days 
                                 @else
                                 
                                 30 Days 
                                 @endif
                             @endif
                               </td>
                            </tr>

                          
    
                       </tbody>
                    </table>
                </div>
            </div>
        </div>
      
     </div>
    

    <?php } ?>





</div>
</section>
<style>
    /* .footer-style9{
        display: none;
    } */
    </style>
@endsection
