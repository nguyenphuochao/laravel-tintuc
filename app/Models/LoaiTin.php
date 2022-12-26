<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table = "loaitin";
    protected $fillable = ['id', 'idTheLoai', 'Ten', 'TenKhongDau'];
    public function theloai(){
        return $this->belongsTo('App\Models\TheLoai', 'idTheLoai', 'id');
    }
    public function tintuc(){
        return $this->hasMany('App\Models\TinTuc', 'idLoaiTin', 'id');
    }
}
