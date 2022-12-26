<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\Comment;
use App\Models\User;
use Auth;
class PageController extends Controller
{
   function __construct(){
      $theloai=TheLoai::all();
      $slide=Slide::all();
      view()->share('theloai',$theloai);
      view()->share('slide',$slide);

      if (Auth::check()) {
         view->share('nguoidung',Auth::user());
      }
   }
   public function getTrangChu(){
      return view('pages.trangchu');
   }
   public function getLienHe(){
      return view('pages.lienhe');
   }
   public function getLoaiTin($id){
      $loaitin=LoaiTin::find($id);
      $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(5);
      return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
   }
   public function getChiTiet($id){
      $tintuc=TinTuc::find($id);
      $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
      $tinlienquan=TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
      return view('pages.chitiet',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
   }
   public function getDangNhap(){
      return view('pages.dangnhap');
   }
   public function postDangNhap(Request $request){
      $this->validate($request,[
         'txtPassword'=>'required|min:3|max:32'
      ],
      [
         'txtPassword.min'=>'Mật khẩu ít nhất 3 kí tụ'
      ]);
      if(Auth::attempt(['email' => $request->txtEmail, 'password' => $request->txtPassword]))
         return redirect('/');
      else
         return back()->with('thongbao','Sai thông tin đăng nhập');
   }
   public function getDangXuat(){
      Auth::logout();
      return redirect('/');
   }
   public function postComment(Request $request,$id){
     $comment=new Comment;
     $comment->idUser=Auth::user()->id;
     $comment->idTinTuc=$id;
     $comment->NoiDung=$request->noidung;
     $comment->save();
     return back();

   }
   public function getTimKiem(Request $req){
      $tukhoa=$req->tukhoa;
      $tintuc=TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('Tomtat','like',"%$tukhoa%")->take(30)->paginate(5);
      return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
   }
   public function getDangKy(){
      return view('pages.dangky');
   }
   public function postDangKy(Request $request){
      $this->validate($request,[
         'password'=>'required|min:3',
         'passwordAgain'=>'required|same:password'
      ],
      [
         'password.min'=>'Mật khẩu phải ít nhất 3 kí tự',
         'password.required'=>"Bạn chưa nhập password",
         'passwordAgain.same'=>"Nhập lại password chưa khớp"
      ]);

      $user=new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
      $user->level=0;
      $user->save();
      return back()->with('thongbao','Đăng kí tài khoản thành công');
   }
}
