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
        $all_product = DB::table('tbl_product')
//            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
//            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->orderby('tbl_product.product_id','desc')->get();
        $date = DB::table('tbl_product')->get();
        foreach ($date as $key => $value){
            $date_update = $value->updated_at;
        }
        $manager_product  = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
//        dd($all_product);
//        echo $date_update;
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

    public function save_product(Request $request){
        $this->AuthLogin();
        $random = $this->generateRandomString();
        $random2 = $this->generateRandomString();
        $random3 = $this->generateRandomString();
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_discount']=$request->product_discount;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $data['created_at']=Carbon::now();
        $data['updated_at'] = Carbon::now();
        $get_image = $request->file('image_link_1');
        $get_image2 = $request->file('image_link_2');
        $get_image3 = $request->file('image_link_3');

        if ($get_image and $get_image2 and $get_image3){
            $new_image =  $random.'.'.$get_image->getClientOriginalExtension();
            $new_image2 =  $random2.'.'.$get_image2->getClientOriginalExtension();
            $new_image3 =  $random3.'.'.$get_image3->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $get_image2->move('public/uploads/product',$new_image2);
            $get_image3->move('public/uploads/product',$new_image3);
            $data['product_image'] = $new_image;
            $data['product_image2'] = $new_image2;
            $data['product_image3'] = $new_image3;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Sản phẩm đã được thêm');
            return Redirect::to('/add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Sản phẩm đã được thêm');
//        return Redirect::to('/add-product');

    }

    public function show_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->update(['product_status'=>1]);
        Session::put('message','Sản phẩm đã được hiển thị');
        return Redirect::to('/all-product');
    }

    public function hide_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->update(['product_status'=>0]);
        Session::put('message','Sản phẩm đã được ẩn');
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')
            ->where('product_id',$product_id)->delete();

        Session::put('message','Sản phẩm đã được xóa');
        return Redirect::to('/all-product');
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $random = $this->generateRandomString();
        $random2 = $this->generateRandomString();
        $random3 = $this->generateRandomString();
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_discount']=$request->product_discount;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['updated_at'] = Carbon::now();
        $get_image = $request->file('image_link_1');
        $get_image2 = $request->file('image_link_2');
        $get_image3 = $request->file('image_link_3');

        if($get_image){
            $new_image =  $random.'.'.$get_image->getClientOriginalExtension();
            $new_image2 =  $random2.'.'.$get_image2->getClientOriginalExtension();
            $new_image3 =  $random3.'.'.$get_image3->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $get_image2->move('public/uploads/product',$new_image2);
            $get_image3->move('public/uploads/product',$new_image3);
            $data['product_image'] = $new_image;
            $data['product_image2'] = $new_image2;
            $data['product_image3'] = $new_image3;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Sản phẩm đã được cập nhật');
            return Redirect::to('all-product');
        }

//        echo $new_image."<br>";
//        echo $new_image2."<br>";
//        echo $new_image3."<br>";
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Sản phẩm đã được cập nhật');
        return Redirect::to('all-product');
    }
//    end admin page


    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
//            //seo
//            $meta_desc = $value->product_desc;
//            $meta_keywords = $value->product_id;
//            $meta_title = $value->product_name;
//            $url_canonical = $request->url();
//            //--seo
        }

        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_category_product.category_id',$category_id)->wherenotin('tbl_product.product_id',[$product_id])->get();

        return view('pages.product.show_details')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('details_product',$details_product)
            ->with('related_product',$related_product);
    }

    public function show_product_home(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_name','asc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_name','asc')->get();

//        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get()->paginate(6);;

//        $all_product= product::all()->where('product_status','1')->sortDesc();
//        $all_product= product::all()->where('product_status','1')->last();
        $all_product = product::where('product_status', 1)->orderby('product_id','desc')->paginate(6);
        $now = Carbon::now();
        return view('pages.product.show_product')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('product',$all_product)
            ->with('now',$now);
    }

    public function page()
    {
        $all_product= product::all()->where('product_status','1')->sortDesc();
        $all_product = product::paginate(2);
    }
}
