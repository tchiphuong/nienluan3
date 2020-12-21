<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
//begin function admin
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        return view('admin.category.add_category_product');
    }

    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->orderby('category_name','asc')->get();
        $manager_category_product = view('admin.category.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.category.all_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Danh mục đã được thêm');
        return Redirect::to('/add-category-product');
    }

    public function show_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')
            ->where('category_id',$category_product_id)
            ->update(['category_status'=>1]);
        Session::put('message','Danh mục đã được hiển thị');
        return Redirect::to('/all-category-product');
    }

    public function hide_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')
            ->where('category_id',$category_product_id)
            ->update(['category_status'=>0]);
        Session::put('message','Danh mục đã được hiển ẩn');
        return Redirect::to('/all-category-product');
    }

    public function edit_category_product($category_product_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->get();
        $manager_category_product = view('admin.category.edit_category_product')
            ->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.category.edit_category_product',$manager_category_product);
    }

    public function delete_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_admin')
            ->where('admin_id',$category_product_id)->delete();

        Session::put('message','Danh mục đã được xóa');
        return Redirect::to('/all-category-product');
    }

    public function update_category_product(Request $request, $category_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Danh mục đã được cập nhật');
        return Redirect::to('/all-category-product');
    }
//    end function admin

    public function show_category_home($category_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        $category_by_id = category::join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
            ->where('tbl_product.category_id', $category_id)
            ->orderby('product_id','desc')->paginate(6);
//        $category_by_id = DB::table('tbl_product')
//            ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
//            ->where('tbl_product.category_id',$category_id)
//            ->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }
}
