<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $order = DB::table('tbl_order')->count();
        Session::put('quantity_product',$product);
        Session::put('quantity_category',$category);
        Session::put('quantity_customer',$customer);
        Session::put('quantity_order',$order);

        $all_order = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*')
            ->limit(4)
            ->orderby('tbl_order.order_id','desc')
            ->get();

        return view('admin.dashboard.dashboard')
            ->with('admin.quantity_product',$product)
            ->with('admin.quantity_category',$category)
            ->with('admin.quantity_customer',$customer)
            ->with('admin.quantity_customer',$order)
            ->with('all_order',$all_order)
            ;
//        dd($all_order);
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if ($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_image',$result->admin_image);
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

    public function add_admin(){
        $this->AuthLogin();
        return view('admin.admins.add_admin');
    }

    public function all_admin(){
        $this->AuthLogin();
        $all_admin = DB::table('tbl_admin')->orderby('admin_name','asc')->get();
        $manager_admin = view('admin.admins.all_admin')->with('all_admin',$all_admin);
        return view('admin_layout')->with('admin.admin',$manager_admin);
//        dd($all_admin);
    }

    function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function save_admin(Request $request){
        $this->AuthLogin();
        if ($request->admin_password == $request->admin_password2) {
            $random = $this->generateRandomString();
            $data = array();
            $data['admin_name'] = $request->admin_name;
            $data['admin_email'] = $request->admin_email;
            $data['admin_phone'] = $request->admin_phone;
            $data['admin_password'] = md5($request->admin_password);
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $get_image = $request->file('image_link_1');

            if ($get_image) {
                $new_image =  $random.'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/admin',$new_image);
                $data['admin_image'] = $new_image;
                DB::table('tbl_admin')->insert($data);
                Session::put('message', 'Tài khoản đã được thêm');
                return Redirect::to('/insert-admin');
            }
            $data['admin_image'] = 'no-image.jpg';
            DB::table('tbl_admin')->insert($data);
            Session::put('message', 'Tài khoản đã được thêm');
            return Redirect::to('/insert-admin');
        }
        else
            {
                Session::put('message', 'Mật khẩu chưa đúng');
                return Redirect::to('/insert-admin');
        }
    }
    public function delete_admin($id)
    {
        $this->AuthLogin();
        DB::table('tbl_admin')
            ->where('admin_id',$id)->delete();

        Session::put('message','Admin đã được xóa');
        return Redirect::to('/view-admin');
    }
}
