<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\SanPham;

use App\ChiTietSanPham;

use App\NhomSanPham;

use App\HangDT;


class ShoppingCartController extends Controller
{
        function __construct()
    {
        $nhomsanpham = NhomSanPham::all();
        $hangdt = HangDT::all();
        view()->share('nhomsanpham',$nhomsanpham);
        view()->share('hangdt',$hangdt);

    }

    public function addProduct(Request $request,$id)
    {
    	$product = ChiTietSanPham::where('id',$id)->first();
    	if(!$product)
    		return redirect('');

    	Cart::add([
    		'id' => $id, 
    		'name' => $product->sanpham->tensp,
    		'qty' => 1, 
    		'price' => $product->gia, 
    		'options' => ['avatar' => $product->sanpham->hinhsp]]);

    	return redirect()->back();

    }

    public function getListShoppingCart()
    {
    	$products = Cart::content();
    	return view('shopping.cart',['products' => $products]);
    }

    public function deleteCart($rowId)
    { 	
 		Cart::remove($rowId);
    	return redirect()->back();
    }

    public function updateCart(Request $request)
    {
    	Cart::update($request->rowId, $request->qty);
    	return redirect('shopping/cart')->with('msg','Cập nhật thành công!');
    }
}
