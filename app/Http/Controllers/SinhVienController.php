<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSinhVienRequest;
use App\Http\Requests\EditSinhVienRequest;
use App\Models\LopHocPhan;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use App\Http\Service\SinhVienService;
class SinhVienController extends Controller
{

    protected $sinhvienService;

    public function __construct(SinhVienService $sinhvienService){
        $this->sinhvienService = $sinhvienService;
    }
    public function index(){
        return view('admin.sinhvien.list',[
            'title'=>'Danh sách sinh viên'
        ]);
    }

    public function getList(Request $request){
        $list = array();
        if(!empty($request->searchValue)){
            switch ($request->searchValue){
                case "MSSV":
                    $list = SinhVien::where('svma','like','%'.$request->searchValue.'%')->get();
                    break;
                case "TenSV":
                    $list = SinhVien::where('svten','like','%'.$request->searchValue.'%')->get();
            }
        } else {
            $list = SinhVien::get();
        }

        if ($request->orderBy == "desc") {
            switch ($request->orderType) {
                case "MSSV":
                    $list = collect($list)->sortByDesc('MSSV')->values()->all();
                    break;
                case "TenSV":
                    $list = collect($list)->sortByDesc('TenSV')->values()->all();
                    break;
            }
        } else {
            switch ($request->orderType) {
                case "MSSV":
                    $list = collect($list)->sortBy('MSSV')->values()->all();
                    break;
                case "TenSV":
                    $list = collect($list)->sortBy('TenSV')->values()->all();
                    break;
            }
        }

        $totalPage = ceil(count($list) / $request->pageSize);
        $list = array_slice($list, ($request->currentPage - 1) * $request->pageSize, $request->pageSize);

        return json_encode(array('totalPage' => $totalPage, 'list' => $list));
    }

    public function delete(Request $request){
        $result = $this->sinhvienService->delete($request);
        if($result) {
            return response()->json([
                'error'=>'false',
                'message'=>'xóa sinh viên thành công'
            ]);
        }

        return response()->json([
            'error'=>'true'
        ]);
    }

    public function create(){
        return view('admin.sinhvien.add',[
            'title'=>'Thêm sinh viên',
            'lopquanly'=>LopHocPhan::get()
        ]);
    }

    public function store(CreateSinhVienRequest $request){
        $result = $this->sinhvienService->create($request);
        return redirect()->back();
    }

    public function edit(SinhVien $sinhvien){
        return view('admin.sinhvien.edit',[
            'title'=>'Sửa thông tin sinh viên',
            'sinhvien'=>$sinhvien,
            'lopquanly'=>LopHocPhan::get()
        ]);
    }

    public function postedit(SinhVien $sinhvien,EditSinhVienRequest $request){
        $result = $this->sinhvienService->edit($request,$sinhvien);
        return redirect()->back();
    }
}
