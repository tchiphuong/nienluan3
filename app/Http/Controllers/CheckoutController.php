<?php


namespace App\Http\Controllers;
use Carbon\Carbon;
use Cart;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\product;
use Session;
use  Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        return view('pages.account.login_account')
            ->with('category',$cate_product)
            ->with('brand',$brand_product);
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/trang-chu');
    }
    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        return view('pages.checkout.show_checkout')
            ->with('category',$cate_product)
            ->with('brand',$brand_product);
    }

    public function save_checkout_customer(Request $request)
    {
        $datas = array();
        $datas['shipping_name'] = $request->shipping_name;
        $datas['shipping_phone'] = $request->shipping_phone;
        $datas['shipping_email'] = $request->shipping_email;
        $datas['shipping_notes'] = $request->shipping_notes;
        $datas['shipping_address'] = $request->shipping_address;

        if ($request->shipping_name==null
            ||$request->shipping_phone==null
            ||$request->shipping_email==null
            ||$request->shipping_notes==null
            ||$request->shipping_address==null){
            Session::put('message', 'Bạn phải nhập đủ thông tin!');
            return Redirect::to('/checkout');
        }else{
            $shipping_id = DB::table('tbl_shipping')->insertGetId($datas);

        Session::put('shipping_id',$shipping_id);
//        $this->order_place($request);

        $data = array();
        $data['payment_method'] = $request->payment_method;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_data['order_date']=Carbon::now();
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method']==1){
//            echo 'Chuyển khoản';
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')
                ->with('category',$cate_product)
                ->with('brand',$brand_product);
        }else{
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')
                ->with('category',$cate_product)
                ->with('brand',$brand_product);
        }
//        echo "$content";
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        echo "<pre>";
//        print_r($order_data) ;
//        echo "</pre>";
        //return Redirect::to('/payment');
            }
    }

    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.checkout.payment')
            ->with('category',$cate_product)
            ->with('brand',$brand_product);
    }

    public function sign_up(){$cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        return view('pages.account.signup_account')
            ->with('category',$cate_product)
            ->with('brand',$brand_product);
    }

    public function logout_checkout(){
        Session::forget('customer_id');
        return Redirect::to('/trang-chu');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();


        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return Redirect::to('/trang-chu');
        }else{
            Session::put('message_login','Email hoặc mật khẩu không chính xác!');
            return Redirect::to('/dang-nhap');
        }
        Session::save();

    }
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*')
            ->orderby('tbl_order.order_id','desc')->get();
        $manager_order  = view('admin.order.view_order')->with('all_order',$all_order);
        return view('admin_layout')
            ->with('admin.manage_order', $manager_order);
    }

    public function manage_order_checked(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*')
            ->orderby('tbl_order.order_id','desc')->get();
        $manager_order_checked  = view('admin.order.view_order_checked')->with('all_order',$all_order);
        return view('admin_layout')
            ->with('admin.manage_order', $manager_order_checked);
    }

    public function view_order_details($order_id){

        $this->AuthLogin();
        $all_order_details = DB::table('tbl_order_details')
            ->join('tbl_order','tbl_order_details.order_id','=','tbl_order.order_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->where('tbl_order_details.order_id', $order_id)
            ->get();
        $get_id = DB::table('tbl_order_details')
            ->limit(1)
            ->get();
        $shipping_name = DB::table('tbl_shipping')
            ->join('tbl_order','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
            ->join('tbl_order_details','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->where('tbl_order_details.order_id', $order_id)
            ->limit(1)
            ->get();
        $manager_order_details  = view('admin.order.view_order_detail')->with('all_order_details',$all_order_details)
            ->with('get_id',$get_id)->with('get_name',$shipping_name)
        ;
        return view('admin_layout')
//            ->with('admin.manage_name', $shipping_name)
            ->with('admin.manage_order', $manager_order_details)
            ;
//        echo "<pre>";
//        print_r($get_id);
//        echo "</pre>";
//        echo "test";
    }

    public function approval_order($id){
        $this->AuthLogin();
        DB::table('tbl_order')
            ->where('order_id',$id)
            ->update(['order_status'=>'Đang giao hàng']);
        Session::put('message','Đơn hàng đã được duyệt.');
        return Redirect::to('/view-order');
    }
    public function shipping_order($id){
        $this->AuthLogin();
        DB::table('tbl_order')
            ->where('order_id',$id)
            ->update(['order_status'=>'Đã giao hàng']);
        return Redirect::to('/view-order-checked');
    }

    public function delete_order($order_code){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_code)->delete();
        DB::table('tbl_order_details')->where('order_id',$order_code)->delete();
        Session::put('message','Đơn hàng đã được xóa thành công.');
        return Redirect::to('/view-order');
    }
}
