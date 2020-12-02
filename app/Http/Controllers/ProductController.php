<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin.add_product');
    }

    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->orderby('product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $get_image = $request->file('product_image');

        if ($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Đã thêm sản phẩm thành công');
            return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Đã thêm sản phẩm thành công');
        return Redirect::to('/add-product');
    }

    public function show_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('brand_id',$product_id)
            ->update(['brand_status'=>1]);
        Session::put('message','thương hiệu đã được ẩn');
        return Redirect::to('/all-product');
    }

    public function hide_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('brand_id',$product_id)
            ->update(['brand_status'=>0]);
        Session::put('message','thương hiệu đã được hiển thị');
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $edit_product = DB::table('tbl_product')
            ->where('product_id', $product_id)
            ->get();
        $manager_product = view('admin.edit_product')
            ->with('edit_product',$edit_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('brand_id',$product_id)->delete();

        Session::put('message','thương hiệu đã được xóa');
        return Redirect::to('/all-product');
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name']=$request->product_name;
        $data['brand_desc']=$request->product_desc;

        DB::table('tbl_product')->where('brand_id',$product_id)->update($data);
        Session::put('message','Đã cập nhật mục thành công');
        return Redirect::to('/all-product');
    }
}
