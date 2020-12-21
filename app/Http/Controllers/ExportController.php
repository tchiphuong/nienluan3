<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Support\Facades\Redirect;
use PDF;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportProduct;

class ExportController extends Controller
{
    public function print_excel(){
        $random = $this->generateRandomString();
        return Excel::download(new ExportProduct, 'product_'.$random.'.xlsx');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function print_pdf()
    {
        $random = $this->generateRandomString();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->orderby('tbl_product.product_id','desc')->get();
        $data = $all_product;
//        dd($data);
        $pdf = PDF::loadView('export.list_product', ['all_product'=>$data]);
        return $pdf->download('list_products.'.$random.'.pdf');
    }

    public function print_order($id)
    {
        $random = $this->generateRandomString();
        $all_order_details = DB::table('tbl_order_details')
            ->join('tbl_order','tbl_order_details.order_id','=','tbl_order.order_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->where('tbl_order_details.order_id', $id)
            ->get();
        $data = $all_order_details;
//        dd($data);
        $pdf = PDF::loadView('export.order_detail', ['all_order'=>$data]);
        return $pdf->download('order_details'.$random.'.pdf');
    }
}
