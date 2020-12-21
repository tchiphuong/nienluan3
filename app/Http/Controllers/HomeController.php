<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\product;
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

    public function search(Request $request){
        //slide
//        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

//        //seo
//        $meta_desc = "Tìm kiếm sản phẩm";
//        $meta_keywords = "Tìm kiếm sản phẩm";
//        $meta_title = "Tìm kiếm sản phẩm";
//        $url_canonical = $request->url();
//        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','desc')->get();
        $now = Carbon::now();
        $search_product = product::where('product_status', 1)->where('product_name','like','%'.$keywords.'%')->orderby('product_id','desc')->paginate(6);


        return view('pages.product.search')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('product',$search_product)
            ->with('now',$now)
            ->with('keyword',$keywords)
//            ->with('meta_desc',$meta_desc)
//            ->with('meta_keywords',$meta_keywords)
//            ->with('meta_title',$meta_title)
//            ->with('url_canonical',$url_canonical)
//            ->with('slider',$slider)
            ;

    }
}
