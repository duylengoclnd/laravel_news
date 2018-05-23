<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
class LoaiTinController extends Controller
{
    public function getdanhsach(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getthem(){
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request){
        // echo $request->txtCateName;
        $this->validate($request,
            [
                'txtCateName'=>'required|min:3|max:100|unique:LoaiTin,Ten',
                'theloai'=>'required'
            ],
            [
                'txtCateName.required'=>'Bạn chưa nhập tên thể loại',
                'TetxtCateNamen.min'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.max'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.unique'=>'Tên thể loại đã tồn tại',
                'theloai.unique'=>'Bạn chưa chọn thể loại',
            ]);
       $loaitin = new LoaiTin;
       $loaitin->Ten = $request->txtCateName;
       $loaitin->TenKhongDau = str_slug($request->txtCateName);
       $loaitin->idTheLoai = $request->theloai;
       $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getsua($id){
       $loaitin = LoaiTin::find($id);
       $theloai = TheLoai::all();
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
       $loaitin = LoaiTin::find($id);
        $this->validate($request,
            [
                'txtCateName'=>'required|min:3|max:100|unique:LoaiTin,Ten',
            ],
            [
                'txtCateName.required'=>'Bạn chưa nhập tên thể loại',
                'TetxtCateNamen.min'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.max'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.unique'=>'Tên thể loại đã tồn tại',
            ]);
       $loaitin->Ten = $request->txtCateName;
       $loaitin->idTheLoai = $request->theloai;
       $loaitin->TenKhongDau = str_slug($request->txtCateName);
       $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
       $loaitin = LoaiTin::find($id);
       $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công!');
    }
}
