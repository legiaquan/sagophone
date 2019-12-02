<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Cart;

use App\SanPham;

use App\ChiTietSanPham;

use App\NhomSanPham;

use App\HangDT;

use App\DanhSachBanner;

use App\DonHang;

use App\ChiTietDonHang;


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

        $price = $product->gia;

        $khuyenmai = DanhSachBanner::where('id_chitietsanpham',$product->id)->first();

        if($khuyenmai != null)
        {
            $price = $price * (100 - $khuyenmai->phantramkhuyenmai) / 100;
        }

    	Cart::add([
    		'id' => $id, 
    		'name' => $product->sanpham->tensp,
    		'qty' => 1, 
    		'price' => $price, 
    		'options' => ['avatar' => $product->sanpham->hinhsp, 'color' => $product->mau->mau]

        ]);

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

    public function payCart()
    {
        $products = Cart::content();

        return view('shopping.pay',['products' => $products]);
    }

    public function saveCart(Request $request)
    {
        $products = Cart::content();
        $total = str_replace(',', '', Cart::subtotal(0,3));
        $this->validate($request,
            [
                'name' => 'required|min:5',
                'address' => 'required|min:10',
                'phone' => 'required|numeric'
            ],

            [
                'name.required' => 'Bạn chưa nhập Tên người nhận!',
                'name.min' => 'Tên người nhận phải từ 5 ký tử trở lên!',
                'address.required' => 'Bạn chưa nhập Địa chỉ!',
                'address.min' => 'Địa chỉ phải từ 10 ký tử trở lên!',
                'phone.required' => 'Bạn chưa nhập Số điện thoại người nhận!',
                'address.numeric' => 'Vui lòng nhập số!',
            ]
        );
        $donhang = new DonHang;
        $donhang->madh = time().Auth::user()->username;
        $donhang->id_thanhvien = Auth::user()->id;
        $donhang->tennguoinhan = $request->name;
        $donhang->diachinguoinhan = $request->address;
        $donhang->sdtnguoinhan = $request->phone;
        $donhang->tinhtrang = 'apending';
        $donhang->ghichu = $request->note;
        $donhang->tongtien = (float)$total;
        $donhang->save();
        if($donhang->id)
        {
            foreach($products as $sanpham)
            {
                $chitietdonhang = new ChiTietDonHang;
                $chitietdonhang->id_donhang = $donhang->id;
                $chitietdonhang->id_chitietsanpham = $sanpham->id;
                $chitietdonhang->soluong = $sanpham->qty;
                $chitietdonhang->giamua = (float)$total;
                $chitietdonhang->save();  
            }
           
        }
        Cart::destroy();

        return redirect('paysuccess')->with('thongbao','Thanh Toán Thành Công!');
    }

    public function successCart()
    {
        return view('shopping.paysuccess');
    }

    public function lichsumuahang()
    {
        $donhang = DonHang::where('id_thanhvien',Auth::user()->id)->get();
        return view('shopping.lichsumuahang',['donhang' => $donhang]);
    }

    public function chitietdonhang($id)
    {
        $chitietdonhang = ChiTietDonHang::find($id);
        return view('shopping.chitietdonhang',['chitietdonhang' => $chitietdonhang]);
    }
}
