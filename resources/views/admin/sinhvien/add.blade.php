@extends('admin.main')
@section('content')
    <form action="/admin/sinhvien/add/store" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="MSSV">MSSV:</label>
                <input type="text" name="MSSV" class="form-control" id="MSSV" placeholder="Nhập MSSV">
            </div>
            <div class="form-group">
                <label for="TenSV">Tên Sinh Viên:</label>
                <input type="text" name="TenSV" class="form-control" id="TenSV" placeholder="Nhập tên sinh viên">
            </div>
            <div class="form-group">
                <label for="NgaySinh">Ngày Sinh:</label>
                <input type="date" name="NgaySinh" class="form-control" id="NgaySinh">
            </div>
            <div class="form-group">
                <label for="GioiTinh">Giới Tính:</label>
                <select id="GioiTinh" name="GioiTinh" class="form-control">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="QueQuan">Quê Quán</label>
                <!-- <textarea name="QueQuan" id="QueQuan" rows="10" cols="80">
                </textarea>
                <script>
                    CKEDITOR.replace( 'mota' );
                </script> -->

                <input type="text" name="QueQuan" id="QueQuan" class="form-control">
            </div>

            <div class="form-group">
                <label for="lopquanly">Lớp quản lý</label>
                <select id="lopquanly" name="lopquanly" class="form-control">
                    @foreach ($lopquanly as $lop)
                        <option value="{{$lop->lqlma}}">{{$lop->lqlten}}</option>
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
