<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = ['name', 'ref_user_id', 'type', 'is_affiliate', 'photo', 'zip', 'residency', 'city', 'country', 'address', 'phone', 'fax', 'email','password','affilate_code','verification_link','shop_name','owner_name','shop_number','shop_address','reg_number','shop_message','is_vendor','shop_details','shop_image','f_url','g_url','t_url','l_url','f_check','g_check','t_check','l_check','shipping_cost','date','mail_sent'];


    protected $hidden = [
        'password', 'remember_token'
    ];

    public function IsVendor(){
        if ($this->is_vendor == 2) {
           return true;
        }
        return false;
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

    public function socialProviders()
    {
        return $this->hasMany('App\Models\SocialProvider');
    }

    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }

    public function conversations()
    {
        return $this->hasMany('App\Models\AdminUserConversation');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    // Multi Vendor

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function senders()
    {
        return $this->hasMany('App\Models\Conversation','sent_user');
    }

    public function recievers()
    {
        return $this->hasMany('App\Models\Conversation','recieved_user');
    }

    public function notivications()
    {
        return $this->hasMany('App\Models\UserNotification','user_id');
    }

    public function subscribes()
    {
        return $this->hasMany('App\Models\UserSubscription');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\FavoriteSeller');
    }

    public function vendororders()
    {
        return $this->hasMany('App\Models\VendorOrder','user_id');
    }

    public function shippings()
    {
        return $this->hasMany('App\Models\Shipping','user_id');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Package','user_id');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report','user_id');
    }

    public function verifies()
    {
        return $this->hasMany('App\Models\Verification','user_id');
    }

    public function wishlistCount()
    {

        return \App\Models\Wishlist::where('user_id','=',$this->id)->with(['product'])->whereHas('product', function($query) {
                    $query->where('status', '=', 1);
                 })->count();
    }

    public function checkVerification()
    {
        return count($this->verifies) > 0 ? 
        (empty($this->verifies()->where('admin_warning','=','0')->orderBy('id','desc')->first()->status) ? false : ($this->verifies()->orderBy('id','desc')->first()->status == 'Pending' ? true : false)) : false;
    }

    public function checkStatus()
    {
        return count($this->verifies) > 0 ? ($this->verifies()->orderBy('id','desc')->first()->status == 'Verified' ? true : false) :false;
    }

    public function checkWarning()
    {
        return count($this->verifies) > 0 ? ( empty( $this->verifies()->where('admin_warning','=','1')->orderBy('id','desc')->first() ) ? false : (empty($this->verifies()->where('admin_warning','=','1')->orderBy('id','desc')->first()->status) ? true : false) ) : false;
    }

    public function displayWarning()
    {
        return $this->verifies()->where('admin_warning','=','1')->orderBy('id','desc')->first()->warning_reason;
    }

}