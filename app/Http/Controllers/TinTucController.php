<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
class TinTucController extends Controller
{
    public function getdanhsach(){
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getthem(){
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        $tintuc = TinTuc::all();
        return view('admin.tintuc.them',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'loaitin'=>'required',
                'tomtat'=>'required',
                'noidung'=>'required',
                'tieude'=>'required|min:3|unique:TinTuc,TieuDe'
            ],
            [
                'loaitin.required'=>'Bạn chưa nhập tên loại tin',
                'tomtat.required'=>'Bạn chưa nhập tom tat',
                'noidung.required'=>'Bạn chưa nhập nội dung',
                'tieude.required'=>'Bạn chưa nhập tên tieu đề',
                'tieude.min'=>'Độ dài ít nhát 3 ký tự ',
                'tieude.unique'=>'Tiêu đề không được trùng nhau',
            ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->tieude;
        $tintuc->TieuDeKhongDau = str_slug($request->tieude);
        $tintuc->idLoaiTin = $request->loaitin;
        $tintuc->TomTat = $request->tomtat;
        $tintuc->NoiDung = $request->noidung;
        $tintuc->SoLuotXem = 0;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg' && $duoi !='JPG' &&  $duoi !='PNG' && $duoi !='JPEG'){
                return redirect('admin/tintuc/them')->with('thongbao','Định dạng ảnh không đúng!');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while (file_exists('upload/tintuc/'.$hinh)) {
                $hinh = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc/',$hinh);
            $tintuc->Hinh=$hinh;
            $tintuc->save();
            return redirect('admin/tintuc/danhsach')->with('thongbao','Thêm tin thành công!');
        }else{
            $request->hinhanh="";
        }
        return redirect('admin/loaitin/danhsach')->with('thongbao','Thêm thành công');
    }

    public function getsua($id){
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id){
        $tintuc = TinTuc::find($id);
        $this->validate($request,
            [
                'loaitin'=>'required',
                'tomtat'=>'required',
                'noidung'=>'required',
                'tieude'=>'required|min:3',
            ],
            [
                'loaitin.required'=>'Bạn chưa nhập tên loại tin',
                'tomtat.required'=>'Bạn chưa nhập tom tat',
                'noidung.required'=>'Bạn chưa nhập nội dung',
                'tieude.required'=>'Bạn chưa nhập tên tieu đề',
                'tieude.min'=>'Độ dài ít nhát 3 ký tự ',
                // 'tieude.unique'=>'Tiêu đề không được trùng nhau',
            ]);
        $tintuc->TieuDe = $request->tieude;
        $tintuc->TieuDeKhongDau = str_slug($request->tieude);
        $tintuc->idLoaiTin = $request->loaitin;
        $tintuc->TomTat = $request->tomtat;
        $tintuc->NoiDung = $request->noidung;
        // var_dump($tintuc->TomTat);die;
        if($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg' && $duoi !='JPG' &&  $duoi !='PNG' && $duoi !='JPEG'){
                return redirect('admin/tintuc/them')->with('thongbao','Định dạng ảnh không đúng!');
            }
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while (file_exists('upload/tintuc/'.$hinh)) {
                $hinh = str_random(4)."_".$name;
            }
            $file->move('upload/tintuc/',$hinh);
            unlink('upload/tintuc/'.$tintuc->Hinh);
            $tintuc->Hinh=$hinh;

        }

        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
       // $loaitin = LoaiTin::find($id);
       // $loaitin->delete();
       //  return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công!');
    }
}
