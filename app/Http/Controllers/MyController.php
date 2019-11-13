<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//su dung Cookie khai bao Response
use Illuminate\Http\Response;


class MyController extends Controller
{
	
    public function XinChao()
    {
    	echo "Day la MyController";
    }

    public function TinhTong($a,$b)
    {
    	echo "Tong $a + $b la: ".($a+$b);
    }

    public function GetURL(Request $request)
    {
    	//ten URL
    	//return $request->path();
    	//duong dan day du URL
    	//return $request->url();
    	//kiem tra url co chua chu admin/ khong
    	/*
    	if($request->is('My*'))
    		echo 'co';
    	else
    		echo 'khong';
    	*/
    	//kiem tra URL co phai phuong thuc post khong
    	if($request->isMethod('get'))
    		echo 'la get';
    	else
    		echo 'khong phai get';
    	
    }
    //trả về tham số được truyền trên request
     public function postForm(Request $request)
     {
        echo "Ban tên là: ".$request->name."</br>";
        echo "Ban tên là: ".$request->input('name')."</br>";
        if($request->age)
            echo "tuổi của bạn:".$request->age."</br>";
        else
            echo 'bạn chưa có tuổi';
     }

     public function setCookie()
     {
        echo 'set cookie';
        $respone = new Response();
        $respone->withCookie(
            'KhoaHoc',  //Ten Cookie
            'Laravel',  //value cua Cookie
            0.1           //thoi gian ton tai cookie-phut
        );
        return $respone;
     }

    public function getCookie(Request $request)
     {
        return $request->cookie('KhoaHoc');
     }

     /*
        post file
      */

    public function postFile(Request $request)
    {
        //kiểm tra có tồn tại myFikle ?
         if($request->hasFile('myFile'))
         {
            $file = $request->file('myFile');
            //lay ten file
            $filename = $file->getClientOriginalName('myFile');
            echo 'ten file la: '.$filename;
            if($file->getClientOriginalExtension('myFile')=="PNG")  //kiem tra co phai duoi file la PNG khong
            {
                echo "<br>Da lu file PNG";
                //luu file
                 $file->move(
                    'public/img',   //thu muc luu file
                    'newtenfile.pg' //ten file
                 );

            }
            else
                echo 'khong phai file .PNG';
         }
         else
         {
            echo "Chưa có file";
         }
         
    }

    /*
        tra du le thanh Json
     */
    
    public function getJson()
    {
        $array = ['KhoaHoc'=>'Laravel','Lop'=>'D15TH06'];
        return response()->json($array);
    }

    //goi view
    
    public function myView()
    {
        return view('myView');
    }

    public function Time($t)
    {
        return view('myView',['time'=>$t]); //time la data se gui qua view
    }

    public function blade($str)
    {
        $khoahoc = "laravel - khoa pham";
        if($str == "laravel")
            return view('pages.noiDung',['khoahoc'=>$khoahoc]);
        else
            return view('pages.noiDung2',['khoahoc'=>$khoahoc]);
    }

}
