<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function add_brand_product(){
        return view('admin.add_brand_product');
    }

    public function all_brand_product(){
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }

    public function save_brand_product(Request $request){
        $data = array();
        $data['brand_name']=$request->brand_product_name;
        $data['brand_desc']=$request->brand_product_desc;
        $data['brand_status']=$request->brand_product_status;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Đã thêm thương hiệu thành công');
        return Redirect::to('/add-brand-product');
    }

    public function show_brand_product($brand_product_id)
    {
        DB::table('tbl_brand_product')
            ->where('brand_id',$brand_product_id)
            ->update(['brand_status'=>1]);
        Session::put('message','thương hiệu đã được ẩn');
        return Redirect::to('/all-brand-product');
    }

    public function hide_brand_product($brand_product_id)
    {
        DB::table('tbl_brand_product')
            ->where('brand_id',$brand_product_id)
            ->update(['brand_status'=>0]);
        Session::put('message','thương hiệu đã được hiển thị');
        return Redirect::to('/all-brand-product');
    }

    public function edit_brand_product($brand_product_id)
    {
        $edit_brand_product = DB::table('tbl_brand_product')
            ->where('brand_id', $brand_product_id)
            ->get();
        $manager_brand_product = view('admin.edit_brand_product')
            ->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }

    public function delete_brand_product($brand_product_id)
    {
        DB::table('tbl_brand_product')
            ->where('brand_id',$brand_product_id)->delete();

        Session::put('message','thương hiệu đã được xóa');
        return Redirect::to('/all-brand-product');
    }

    public function update_brand_product(Request $request, $brand_product_id)
    {
        $data = array();
        $data['brand_name']=$request->brand_product_name;
        $data['brand_desc']=$request->brand_product_desc;

        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Đã cập nhật mục thành công');
        return Redirect::to('/all-brand-product');
    }
}
