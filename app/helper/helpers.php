<?php

// set sidebar item active

use App\Models\GeneralSettings;
use Illuminate\Support\Facades\Session;

function setActive(array $route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return'active';
            }
        }
    }
}

// kiểm tra xem giá sản phẩm có giảm kh

function checkDiscount($product){
    $currentDate = date('Y-m-d');
    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product -> offer_end_date){
        return true;
    }
    return false;
}

// tính toán giảm giá
function calculateDiscount ($originalPrice, $discountPrice){
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return $discountPercent;
}

// check the product type
function productType(string $type)
{
    switch($type){
        case'new_arrival':
            return 'new';
            break;
        case'featured_product':
            return 'featured_product';
            break;
        case'top_product':
            return 'top_product';
            break;

        case'best_product':
            return 'Best';
            break;
        default:
            return '';
            break;
    }
}

// get total cart amount
function getCartTotal(){
    $total = 0;
    foreach(\Cart::content() as $product){
        $total += ($product->price + $product -> options -> variants_total) * $product->qty;
    }
    return $total;
}

/** get payable total amount */
function getMainCartTotal(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            $total = $subTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $total = $subTotal - $discount;
            return $total;
        }
    }else {
        return getCartTotal();
    }
}

/** get cart discount */
function getCartDiscount(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            return $coupon['discount'];
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            return $discount;
        }
    }else {
        return 0;
    }
}

/** get selected shipping fee from session */
function getShppingFee(){
    if(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    }else {
        return 0;
    }
}

/** get payable amount */
function getFinalPayableAmount(){
    return  getMainCartTotal() + getShppingFee();
}

/** lemit text */

function limitText($text, $limit = 20)
{
    return \Str::limit($text, $limit);
}

function getCurrencyIcon()
{
    $icon = GeneralSettings::first();

    return $icon->currency_icon;
}



?>
