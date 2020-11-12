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
    public function add_product(){
        return view('admin.add_product');
    }

    public function all_product(){
        $all_product = DB::table('tbl_product')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request){
        $data = array();
        $data['brand_name']=$request->product_name;
        $data['brand_desc']=$request->product_desc;
        $data['brand_status']=$request->product_status;

        DB::table('tbl_product')->insert($data);
        Session::put('message','Đã thêm thương hiệu thành công');
        return Redirect::to('/add-brand-product');
    }

    public function show_product($product_id)
    {
        DB::table('tbl_product')
            ->where('brand_id',$product_id)
            ->update(['brand_status'=>1]);
        Session::put('message','thương hiệu đã được ẩn');
        return Redirect::to('/all-brand-product');
    }

    public function hide_product($product_id)
    {
        DB::table('tbl_product')
            ->where('brand_id',$product_id)
            ->update(['brand_status'=>0]);
        Session::put('message','thương hiệu đã được hiển thị');
        return Redirect::to('/all-brand-product');
    }

    public function edit_product($product_id)
    {
        $edit_product = DB::table('tbl_product')
            ->where('brand_id', $product_id)
            ->get();
        $manager_product = view('admin.edit_product')
            ->with('edit_product',$edit_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function delete_product($product_id)
    {
        DB::table('tbl_product')
            ->where('brand_id',$product_id)->delete();

        Session::put('message','thương hiệu đã được xóa');
        return Redirect::to('/all-brand-product');
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['brand_name']=$request->product_name;
        $data['brand_desc']=$request->product_desc;

        DB::table('tbl_product')->where('brand_id',$product_id)->update($data);
        Session::put('message','Đã cập nhật mục thành công');
        return Redirect::to('/all-brand-product');
    }
}
