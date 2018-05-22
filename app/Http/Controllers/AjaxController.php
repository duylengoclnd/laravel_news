<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
class AjaxController extends Controller
{
    public function getloaitin($idTheLoai){
        $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
        foreach($loaitin as $loaitins){
            echo '<option value="'.$loaitins->id.'">'.$loaitins->Ten.'</option>';
        }
    }

}
