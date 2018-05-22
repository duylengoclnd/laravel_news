<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
class TheLoaiController extends Controller
{
    public function getdanhsach(){
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getthem(){
        return view('admin.theloai.them');
    }

    public function postThem(Request $request){
        // echo $request->txtCateName;
        $this->validate($request,
            [
                'txtCateName'=>'required|min:3|max:100|unique:TheLoai,Ten'
            ],
            [
                'txtCateName.required'=>'Bạn chưa nhập tên thể loại',
                'TetxtCateNamen.min'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.max'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.unique'=>'Tên thể loại đã tồn tại',
            ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request->txtCateName;
        $theloai->TenKhongDau = str_slug($request->txtCateName);
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getsua($id){
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        $theloai = TheLoai::find($id);
        $this->validate($request,
            [
                'txtCateName'=>'required|min:3|max:100|unique:TheLoai,Ten',
            ],
            [
                'txtCateName.required'=>'Bạn chưa nhập tên thể loại',
                'TetxtCateNamen.min'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.max'=>'Độ dài nằm trong khoảng 3 ký tự đến 100 ký tự',
                'txtCateName.unique'=>'Tên thể loại đã tồn tại',
            ]);
        $theloai->Ten = $request->txtCateName;
        $theloai->TenKhongDau = str_slug($request->txtCateName);
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công!');
    }
}
