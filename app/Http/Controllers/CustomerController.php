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

class CustomerController extends Controller
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

    public function all_customer(){
        $this->AuthLogin();
        $all_customer = DB::table('tbl_customers')->orderby('customer_name','asc')->get();
        $manager_customer = view('admin.customer.all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('admin.customer.all_customer',$manager_customer);
    }
}
