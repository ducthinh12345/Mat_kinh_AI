<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function Resign_product(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->sale_day = $request->sale_day;
        $product->type = $request->type;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        Session::flash('success', 'Đăng sản phẩm thành công');
        // return redirect()->route('all_product');
        return $product;
    }

    public function Get_product_detail(Request $request)
    {
        $product_data = Product::where("id", $request->id)->take(1)->get();
        // return redirect()->route('product/detail');
        return $product_data;
    }

    public function Update_product_detail(Request $request)
    {
        $product_data = Product::find($request->id);
        if(!$product_data) return 400;

        ($request->name)        ? $product_data->name           = $request->name        : $product_data->name           = $product_data->name ;
        ($request->sale_day)    ? $product_data->sale_day       = $request->sale_day    : $product_data->sale_day       = $product_data->sale_day ;
        ($request->type)        ? $product_data->type           = $request->type        : $product_data->type           = $product_data->type ;
        ($request->price)       ? $product_data->price          = $request->price       : $product_data->price          = $product_data->price ;
        ($request->description) ? $product_data->description    = $request->description : $product_data->description    = $product_data->description ;
        
        $product_data->save();
        Session::flash('success', 'Bạn thay đổi thông sản phẩm thành công');
        // return redirect()->route('posts');
        return $product_data;
    }

    public function Delete_product(Request $request)
    {
        $product_data = Product::find($request->id);
        if(!$product_data) return 400;
        $product_data->status = 0;
        $product_data->save();
        Session::flash('success', 'Bạn xóa sản phẩm thành công');
        return $product_data;
    }
}
