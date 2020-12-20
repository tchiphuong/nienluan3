<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        $now = Carbon::now();
        return view('pages.home')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('product',$all_product)
            ->with('now',$now);
    }

    public function cart(){
        return view('pages.cart');
    }

    public function category(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','desc')->get();
        return view('pages.cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
}
