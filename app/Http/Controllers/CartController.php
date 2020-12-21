<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Coupon;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::setGlobalTax(0);
        $discount = rand(0,100);
        Session::put('giamgia',$discount);
        Cart::add($data);
//        DB::table('tbl_cart')->insert($data);
//        dd($data);
        return Redirect::to('/show-cart');
    }

    public function add_cart_home($product_id)
    {
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        foreach ($details_product as $key => $pro){
            $product_id = $pro->product_id;
            $product_name =  $pro->product_name;
            $product_price =  $pro->product_price;
            $product_image =  $pro->product_image;
            $product_discount = $pro->product_discount;
        }
//        echo "<pre>";
//        print_r($details_product);
//        echo "</pre>";
        Cart::setGlobalTax(0);
//        $discount = rand(0,100);
        $discount = 0;
        Session::put('giamgia',$discount);
        Cart::setGlobalDiscount($discount);
        $total_price = $product_price - $product_price * $product_discount /100;
        Cart::add(['id' => $product_id, 'name' => $product_name, 'qty' => 1, 'price' => $total_price, 'weight' => $product_price, 'options' => ['image' => $product_image]]);
        return Redirect::to('/san-pham');
    }
    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        if (Cart::content()->count()==0){
            return Redirect::to('/san-pham');
        }
        return Redirect::to('/show-cart');
    }

    public function update_to_cart($quantity,$rowId){
        Cart::update($rowId,$quantity);
        if (Cart::content()->count()==0){
            return Redirect::to('/san-pham');
        }
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $id = $request->rowId_cart;
        $qty = $request->cart_quantity;
//        echo "id: $request->rowId_cart"."<br>";
//        echo "qty: $qty";
        Cart::update($id,$qty);
        return Redirect::to('/show-cart');
    }
}
