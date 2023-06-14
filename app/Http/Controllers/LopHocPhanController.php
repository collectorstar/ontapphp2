<?php

namespace App\Http\Controllers;

use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use App\Http\Service\LopHocPhanService;
use App\Http\Requests\CreateLopHocPhanRequest;
use App\Http\Requests\EditLopHocPhanRequest;



class LopHocPhanController extends Controller
{
    protected $lophocphanService;

    public function __construct(LopHocPhanService $lophocphanService){
        $this->lophocphanService = $lophocphanService;
    }
    public function index(){
        return view('admin.lophocphan.list',[
            'title'=>'Danh sách Lớp học phần'
        ]);
    }
    public function getList(Request $request){
        $list = array();
        if(!empty($request->searchValue)){
            switch ($request->searchValue){
                case "MaLop":
                    $list = LopHocPhan::where('lqlma','like','%'.$request->searchValue.'%')->get();
                    break;
                case "TenLop":
                    $list = LopHocPhan::where('lqlten','like','%'.$request->searchValue.'%')->get();
            }
        } else {
            $list = LopHocPhan::get();
        }

        if ($request->orderBy == "desc") {
            switch ($request->orderType) {
                case "MaLop":
                    $list = collect($list)->sortByDesc('lqlma')->values()->all();
                    break;
                case "TenLop":
                    $list = collect($list)->sortByDesc('lqlten')->values()->all();
                    break;
            }
        } else {
            switch ($request->orderType) {
                case "MaLop":
                    $list = collect($list)->sortBy('lqlma')->values()->all();
                    break;
                case "TenLop":
                    $list = collect($list)->sortBy('lqlten')->values()->all();
                    break;
            }
        }

        $totalPage = ceil(count($list) / $request->pageSize);
        $list = array_slice($list, ($request->currentPage - 1) * $request->pageSize, $request->pageSize);

        return json_encode(array('totalPage' => $totalPage, 'list' => $list));
    }

    public function delete(Request $request){
        $result = $this->lophocphanService->delete($request);
        if($result) {
            return response()->json([
                'error'=>'false',
                'message'=>'xóa lớp thành công'
            ]);
        }

        return response()->json([
            'error'=>'true'
        ]);
    }

    public function create(){
        return view('admin.lophocphan.add',[
            'title'=>'Thêm lop hoc phan'
        ]);
    }

    public function store(CreateLopHocPhanRequest $request){
        $result = $this->lophocphanService->create($request);
        return redirect()->back();
    }

    public function edit(LopHocPhan $lophocphan){
        return view('admin.lophocphan.edit',[
            'title'=>'Sửa thông tin lớp',
            'lophocphan'=>$lophocphan,
        ]);
    }

    public function postedit(LopHocPhan $lophocphan,EditLopHocPhanRequest $request){
        $result = $this->lophocphanService->edit($request,$lophocphan);
        return redirect()->back();
    }


}
