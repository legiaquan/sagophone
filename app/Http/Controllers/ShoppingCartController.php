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
    		'options' => ['avatar' => $product->hinhchitiet, 'color' => $product->mau->mau, 'soluonghienco' => $product->soluong]

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
        $soluong = Cart::content();
        foreach($soluong as $sl)
        {
            if($request->qty > $sl->options->soluonghienco)
            {
                return redirect('shopping/cart')->with('loisoluong','Vượt số lượng hiện có!');
            }
            else
            {
                Cart::update($request->rowId, $request->qty);
            }
        }
        
    	return redirect('shopping/cart');
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
                'phone.numeric' => 'Vui lòng nhập số!',
            
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
                $soluong = Cart::content();
                $sanphamdonhang = ChiTietSanPham::where('id',$chitietdonhang->id_chitietsanpham)->first();
                $sanphamdonhang->soluong = $sanphamdonhang->soluong - $sanpham->qty;
                $sanphamdonhang->save();
                $chitietdonhang->giamua = (float)$total;
                $chitietdonhang->save();  
            }
           
        }
        Cart::destroy();

        return redirect('shopping/paysuccess');
    }

    public function successCart()
    {
        if(Cart::content() == NULL)
            return view('errors.404');
        else
            return view('shopping.paysuccess');
    }

    public function lichsumuahang()
    {
        if(!Auth::user())
            return view('errors.404');
        else
        {
            $donhang = DonHang::where('id_thanhvien',Auth::user()->id)->orderBy('created_at','desc')->get();
            return view('shopping.lichsumuahang',['donhang' => $donhang]);
        }
    }

    public function chitietdonhang($id)
    {
        if(!Auth::user())
            return view('errors.404');
        else
        {
            $chitietdonhang = ChiTietDonHang::where('id_donhang',$id)->get();
            $tinhtrang = DonHang::where('id',$id)->select('id','tinhtrang','madh')->first();
            $thanhvien = DonHang::where('id',$id)->value('id_thanhvien');
            if(Auth::user()->id != $thanhvien)
                return view('errors.404');
            else
                return view('shopping.chitietdonhang',['chitietdonhang' => $chitietdonhang, 'tinhtrang' => $tinhtrang]);
        }
        
    }

    public function cancelOrder($id)
    {
        $donhang = DonHang::find($id);
        $donhang->tinhtrang = "cancel";
        $donhang->save();
        return redirect()->back();
    }

    public function getDanhgia($id)
    {
        $chitiet = ChiTietDonHang::find($id);
        $danhgia = ChiTietDonHang::where('id_chitietsanpham',$chitiet->id_chitietsanpham)
        ->where('star','!=','null')
        ->paginate(3);
        $sodanhgia = count(ChiTietDonHang::where('id_chitietsanpham',$chitiet->id_chitietsanpham)
        ->where('star','!=','null')->get());
        $thanhvien = DonHang::where('id',$chitiet->id_donhang)->value('id_thanhvien');
        if(Auth::user()->id != $thanhvien)
            return view('errors.404');
        else
            return view('shopping.danhgia',['chitiet' => $chitiet, 'danhgia' => $danhgia, 'sodanhgia' => $sodanhgia]);
    }
    public function postDanhgia($id, Request $request)
    {
        $danhgia = ChiTietDonHang::find($id);
        if($danhgia->star == null)
        {
            $this->validate($request,
            [
            'rating' => 'required'
            ]
        ,
            [
                'rating.required' => 'Vui lòng đánh số sao!'
            ]);
            $danhgia->nhanxet = $request->danhgia;
            $danhgia->star = $request->rating;
        }
        else
        {
            $danhgia->nhanxet = $request->danhgia;
            $danhgia->star = $request->rating;
        }    
        $danhgia->save();
        return redirect()->back();
    }

     public function updateDanhgia($id, Request $request)
     {
        $danhgia = ChiTietDonHang::find($id);
        $danhgia->nhanxet = $request->danhgia;
        if($request->rating)
            $danhgia->star = $request->rating;
        $danhgia->save();
        return redirect()->back();
     }
    
}
