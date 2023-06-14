@extends('admin.main')
@section('content')
    <form action="/admin/lophocphan/add/store" method="post" id="quickForm" novalidate="novalidate">
        <div class="card-body">
            <div class="form-group">
                <label for="malop">Mã Lớp:</label>
                <input type="text" name="malop" class="form-control" id="malop" placeholder="Nhập mã lớp">
            </div>
            <div class="form-group">
                <label for="tenlop">Tên Lớp:</label>
                <input type="text" name="tenlop" class="form-control" id="tenlop" placeholder="Nhập tên lớp">
            </div>

            <div class="form-group">
                <label for="makhoahoc">Mã khóa học</label>
                <input type="number" name="makhoahoc" class="form-control" id="makhoahoc" placeholder="Nhập mã khóa học">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @csrf
    </form>
@endsection
