<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;

use App\SanPham;

use App\ChiTietSanPham;


class ShoppingCartController extends Controller
{
    public function addProduct(Request $request,$id)
    {
    	$product = SanPham::join('tbchitietsanpham','tbsanpham.id','tbchitietsanpham.id_sanpham')
    	->where('id_sanpham',$id)->orderBy('gia')->get()->first();

    	if(!$product)
    		return redirect('');

    	Cart::add([
    		'id' => $id, 
    		'name' => $product->tensp,
    		'qty' => 1, 
    		'price' => $product->gia, 
    		'options' => ['avatar' => $product->hinhsp]]);

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
