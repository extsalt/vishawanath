<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Order extends Authenticatable
{

    protected $table = "orders";
    protected $fillable = [
        'id', 'auth_id', 'order_id','trial_account_date','trial_account_days',
        'buy_account_date','buy_account_days','trial_account_status','buy_account_status',
        'trail_finish_date','buy_finish_date','cost','transaction_id','pdf_pages','max_pdf_pages','summarizer','keypoints'
    ];


    public function orderdetails()
    {
        return $this->belongsTo(User::class, 'auth_id', 'id');
    }


}
