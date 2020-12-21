<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
    $admin_id = Session::get('admin_id');
    if ($admin_id){
        return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
}
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.brand.add_brand_product');
    }

    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand_product')->orderby('brand_name','asc')->get();
        $manager_brand_product = view('admin.brand.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.brand.all_brand_product',$manager_brand_product);
    }

    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['brand_name']=$request->brand_product_name;
        $data['brand_desc']=$request->brand_product_desc;
        $data['brand_status']=$request->brand_product_status;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thương hiệu đã được thêm');
        return Redirect::to('/add-brand-product');
    }

    public function show_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand_product')
            ->where('brand_id',$brand_product_id)
            ->update(['brand_status'=>1]);
        Session::put('message','Thương hiệu đã được hiển thị');
        return Redirect::to('/all-brand-product');
    }

    public function hide_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand_product')
            ->where('brand_id',$brand_product_id)
            ->update(['brand_status'=>0]);
        Session::put('message','Thương hiệu đã được hiển ẩn');
        return Redirect::to('/all-brand-product');
    }

    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand_product')
            ->where('brand_id', $brand_product_id)
            ->get();
        $manager_brand_product = view('admin.brand.edit_brand_product')
            ->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.brand.edit_brand_product',$manager_brand_product);
    }

    public function delete_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand_product')
            ->where('brand_id',$brand_product_id)->delete();

        Session::put('message','Thương hiệu đã được xóa');
        return Redirect::to('/all-brand-product');
    }

    public function update_brand_product(Request $request, $brand_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name']=$request->brand_product_name;
        $data['brand_desc']=$request->brand_product_desc;

        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Thương hiệu đã được cập nhật');
        return Redirect::to('/all-brand-product');
    }
    public function show_brand_home($brand_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();

        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();

        $brand_by_id = product::join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
            ->where('tbl_product.brand_id', $brand_id)
            ->orderby('product_id','desc')->paginate(6);
        return view('pages.brand.show_brand')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('brand_by_id',$brand_by_id)
            ->with('brand_name',$brand_name);
    }
}
