<?php

namespace App\Http\Service;

use App\Models\SinhVien;
use PHPUnit\Exception;
use DB;

class SinhVienService
{
    public function delete($request){
        $sinhven = SinhVien::where('id',$request->input('id'))->first();
        if($sinhven){
            return $sinhven->delete();
        }
        return ;
    }

    public function create($request){
        try {
            SinhVien::create([
                'svma'=>(string)$request->input('MSSV'),
                'svten'=>(string)$request->input('TenSV'),
                'svngaysinh'=>date($request->input('NgaySinh')),
                'svgioitinh'=>intval($request->input('GioiTinh')),
                'svquequan'=>(string)$request->input('QueQuan'),
                'lqlma'=>(string)$request->input('lopquanly'),
            ]);
            Session()->flash('success','Thêm mới danh mục thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }

    public function edit($request,$sinhvien){
        try {
            $sinhvien->svma =(string) $request->input('MSSV');
            $sinhvien->svten = (string)$request->input('TenSV');
            $sinhvien->svngaysinh =date($request->input('NgaySinh')) ;
            $sinhvien->svgioitinh = (int)$request->input('GioiTinh') ;
            $sinhvien->svquequan =(string) $request->input('QueQuan');
            $sinhvien->lqlma = intval($request->input('lopquanly')) ;
            $sinhvien->save();
            Session()->flash('success','Sửa thông tin danh mục thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }


}
