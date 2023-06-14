<?php

namespace App\Http\Service;

use App\Models\LopHocPhan;
use App\Models\SinhVien;
use PHPUnit\Exception;
use DB;

class LopHocPhanService
{
    public function delete($request)
    {
        $lophocphan = LopHocPhan::where('id', $request->input('id'))->first();
        if ($lophocphan) {
            $lophocphan->delete();
            SinhVien::where('lqlma', $lophocphan->lqlma)->delete();
            return true;
        }

        return false;
    }

    public function create($request){
        try {
            LopHocPhan::create([
                'lqlma'=>(string)$request->input('malop'),
                'lqlten'=>(string)$request->input('tenlop'),
                'lqlkhoahoc'=>(int)$request->input('makhoahoc')
            ]);
            Session()->flash('success','Thêm mới danh mục thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }

    public function edit($request,$lophocphan){
        try {
            $lophocphan->lqlma = $request->input('malop');
            $lophocphan->lqlten = $request->input('tenlop');
            $lophocphan->lqlkhoahoc = intval($request->input('makhoahoc')) ;
            $lophocphan->save();
            Session()->flash('success','Sửa thông tin danh mục thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }


}
