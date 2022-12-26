<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\LoaiTin;
use App\Models\Theloai;
use App\Models\TinTuc;
use App\Models\Slide;
use App\Models\Comment;
use Illuminate\Http\Request;

use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{
    public function getAdminHome(){
        return view('admin.home.index');
    }
    public function getDanhSachTheLoai(){
        $theloai = TheLoai::orderBY('id', 'DESC')->paginate(10);
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThemTheLoai(){
        return view('admin.theloai.them');
    }
    public  function postThemTheLoai(Request $request){
        $this->validate($request,
            [
                'txtTen' => 'required|min:3|max:100'
            ],
            [
                'txtTen.required' => 'Bạn chưa nhập ',
                'txtTen.min' => 'Thể loại phải cao hơn 3 kí tự',
                'txtTen.max' => 'Thể loại phải dưới hơn 100 kí tự'
            ]);
        $theloai = new TheLoai();
        $theloai->Ten = $request->txtTen;
        $theloai->TenKhongDau = changeTitle($request->txtTen);
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao', 'Thêm thành công');

    }
    public function getSuaTheLoai($id){
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSuaTheLoai(Request $request,$id){
        $theloai = TheLoai::find($id);
        $this->validate($request,
            [
                'txtTen' => 'required|min:3|max:100'
            ],
            [
                'txtTen.required' => 'Bạn chưa nhập ',
                'txtTen.min' => 'Thể loại phải cao hơn 3 kí tự',
                'txtTen.max' => 'Thể loại phải dưới hơn 100 kí tự'
            ]);
        $theloai->Ten = $request->txtTen;
        $theloai->TenKhongDau = changeTitle($request->txtTen);
        $theloai->save();
        return redirect('admin/theloai/danhsach');
    }
    public function getXoaTheLoai(Request $request,$id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getDanhSachLoaiTin(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',compact('loaitin'));
    }
    public function getThemLoaiTin(){
        $theloai=TheLoai::orderBY('id','DESC')->get();
        return view('admin.loaitin.them',compact('theloai'));
    }
    public function postThemLoaiTin(Request $request){
        $this->validate($request,
            [
                'txtLoaiTin'=>'required|min:3|max:100',
                'txtLoaiTin'=>'required|unique:loaitin,Ten'
            ],
            [
                'txtLoaiTin.required'=>'Bạn chưa nhập Tên Loại',
                'txtLoaiTin.min'=>'Phải tối thiểu 3 kí tự',
                'txtLoaiTin.unique'=>'Tên loại bị trùng'

            ]);
        $loaitin=new LoaiTin();
        $loaitin->Ten=$request->txtLoaiTin;
        $loaitin->TenKhongDau=changeTitle($request->txtLoaiTin);
        $loaitin->idTheLoai=$request->theloai;
        $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Thêm thành công');
    }
    public function getXoaLoaiTin(Request $request,$id){
        $loaitin=LoaiTin::find($id);
        $loaitin->delete();
        return back()->with('thongbao','Xóa thành công');
    }
    public function getSuaLoaiTin($id){
        $loaitin=LoaiTin::find($id);
        $theloai=TheLoai::orderBY('id','DESC')->get();
        return view('admin.loaitin.sua',compact('loaitin','theloai'));
    }
    public function postSuaLoaiTin(Request $request,$id){
        $loaitin=LoaiTin::find($id);
        $loaitin->Ten=$request->txtLoaiTin;
        $loaitin->idTheLoai=$request->txtTheLoai;
        $loaitin->TenKhongDau=changeTitle($request->txtTen);
        $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Cập nhật thành công');

    }
    public function getDanhSachTinTuc(){
        $tintuc=TinTuc::orderBY('id','DESC')->get();
        return view('admin.tintuc.danhsach',compact('tintuc'));
    }
    public function getThemTinTuc(){
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
        return view('admin.tintuc.them',compact('theloai','loaitin'));
    }
    public function postThemTinTuc(Request $request){
        $this->validate($request,
            [
                'TieuDe'=>'required|min:3',
                'TieuDe'=>'unique:tintuc,TieuDe'
            ],
            [
                'TieuDe.unique'=>"Tên bị trùng"
            ]);
        $tintuc=new TinTuc();
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->NoiBat=$request->NoiBat;
        $tintuc->SoLuotXem=0;
        if ($request->hasFile('HinhAnh')) {
            $file=$request->file('HinhAnh');
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4).'_'.$name; 
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }else{
            $tintuc->Hinh="";
        }
        $tintuc->save();
        return redirect('admin/tintuc/danhsach');
    }
    public function getXoaTinTuc(Request $request,$id){
        $tintuc=TinTuc::find($id);
        $tintuc->delete();
        return back();
    }
    public function getSuaTinTuc($id){
        $tintuc=TinTuc::find($id);
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
        return view('admin.tintuc.sua',compact('theloai','loaitin','tintuc'));
    }
    public function postSuaTinTuc(Request $request,$id){
        $tintuc=TinTuc::find($id);
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->NoiBat=$request->NoiBat;
        $tintuc->SoLuotXem=0;
        if ($request->hasFile('HinhAnh')) {
            $file=$request->file('HinhAnh');
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4).'_'.$name; 
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh=str::random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/danhsach');
    }
    //slider
    public function getSlider(){
        $slider=Slide::orderBY('id','DESC')->get();
        return view('admin.slide.danhsach',compact('slider'));
    }
    public function getThemSlider(){
        return view('admin.slide.them');
    }
    public function postThemSlider(Request $request){
        $slider=new Slide();
        $slider->Ten=$request->Ten;
        $slider->NoiDung=$request->NoiDung;
        $slider->link=$request->link;
        if ($request->hasFile('HinhAnh')) {
            $file=$request->file('HinhAnh');
            $name=$file->getClientOriginalName();
            $Hinh = str::random(4).'_'.$name; 
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $slider->HinhAnh=$Hinh;
        }else{
            $slider->HinhAnh="";
        }
        $slider->save();
        return redirect('admin/slider/danhsach');
    }
    public function getXoaSlider($id){
        $slider=Slide::find($id);
        $slider->delete();
        return back();
    }
    public function getComment(){
        $comment=Comment::orderBY('id','DESC')->get();
        return view('admin.comment.danhsach',compact('comment'));
    }
    public function getXoaComment($id){
        $comment=Comment::find($id);
        $comment->delete();
        return back();  
    }
}
