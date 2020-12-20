<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        $product = DB::table('tbl_product')->count();
        $category = DB::table('tbl_category_product')->count();
        $customer = DB::table('tbl_customers')->count();
        Session::put('quantity_product',$product);
        Session::put('quantity_category',$category);
        Session::put('quantity_customer',$customer);
        return view('admin.dashboard')
            ->with('admin.quantity_product',$product)
            ->with('admin.quantity_category',$category)
            ->with('admin.quantity_customer',$customer)
            ;
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if ($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('messages',' Đăng nhập thất bại: Tài khoản hoặc mật khẩu bị sai.');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
