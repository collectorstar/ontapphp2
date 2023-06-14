@extends('admin.main')
@section('content')
    <form action="/admin/sinhvien/edit/{{$sinhvien->id}}" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="MSSV">MSSV:</label>
                <input readonly type="text" name="MSSV" value="{{$sinhvien->svma}}" class="form-control" id="MSSV" placeholder="Nhập MSSV">
            </div>
            <div class="form-group">
                <label for="TenSV">Tên Sinh Viên:</label>
                <input type="text" name="TenSV" value="{{$sinhvien->svten}}" class="form-control" id="TenSV" placeholder="Nhập tên sinh viên">
            </div>
            <div class="form-group">
                <label for="NgaySinh">Ngày Sinh:</label>
                <input type="date" name="NgaySinh" value="{{$sinhvien->svngaysinh}}" class="form-control" id="NgaySinh">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới Tính:</label>
                <select id="GioiTinh" name="GioiTinh" class="form-control">
                    <option value="0" {{$sinhvien->gioitinh == 0 ? 'selected' : ''}}>Nam</option>
                    <option value="1" {{$sinhvien->gioitinh == 0 ? 'selected' : ''}}>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="QueQuan">Quê Quán</label>
                <!-- <textarea name="QueQuan" id="QueQuan" rows="10" cols="80">
                </textarea>
                <script>
                    CKEDITOR.replace( 'mota' );
                </script> -->

                <input type="text" name="QueQuan" value="{{$sinhvien->svquequan}}" id="QueQuan" class="form-control">
            </div>

            <div class="form-group">
                <label for="lopquanly">Lớp quản lý</label>
                <select id="lopquanly" name="lopquanly" class="form-control">
                    @foreach ($lopquanly as $lop)
                        <option value="{{$lop->lqlma}}" {{$sinhvien->lqlma == $lop->lqlma ? 'selected' : ''}} >{{$lop->lqlten}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
