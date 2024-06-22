@extends('master')

@section('ContentArea')
<div id="page-content-area" class="h-100 container">
    <div class="bg-white border mt-2 shadow-sm">
        <div class="p-3">
            <h3>Thông tin người dùng</h3>
            <form method="POST" action="{{ route('userinfo.update', ['id' => $currUser->id]) }}" id="form-user-info-update">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="user_fullname">Họ và tên</label>
                    <input type="text" id="user_fullname" name="user_fullname" class="form-control" value="{{ $currUser->user_fullname }}">
                </div>

                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" value="{{ $currUser->user_email }}">
                </div>

                <div class="form-group">
                    <label for="user_birth">Ngày sinh</label>
                    <input type="date" id="user_birth" name="user_birth" class="form-control" value="{{ $currUser->user_birth }}">
                </div>

                <div class="form-group">
                    <label for="user_gender">Giới tính</label>
                    <select id="user_gender" name="user_gender" class="form-control">
                        <option value="0" @if ($currUser->user_gender == 0) selected @endif>Nam</option>
                        <option value="1" @if ($currUser->user_gender == 1) selected @endif>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_role">Vai trò</label>
                    <input type="text" id="user_role" name="user_role" class="form-control" value="@if ($currUser->user_role == 1) Manager @elseif ($currUser->user_role == 2) Admin @else User @endif" @if ($currUser->user_role != 2) readonly @endif>
                </div>

                <div class="form-group">
                    <label for="user_office">Văn phòng</label>
                    <input type="text" id="user_office" name="user_office" class="form-control" value="@switch($currUser->user_office) @case(1) Phòng Nhân sự (HR) @break @case(2) Phòng Tài chính - Kế toán (Finance - Accounting) @break @case(3) Phòng Kinh doanh (Sales) @break @case(4) Phòng Marketing @break @case(5) Phòng Sản xuất (Production) @break @case(6) Phòng IT (Information Technology) @break @case(7) Phòng Nghiên cứu và Phát triển (R&D) @break @case(8) Phòng Hành chính (Administration) @break @case(9) Phòng Pháp lý (Legal) @break @case(10) Phòng Chăm sóc Khách hàng (Customer Service) @break @default Phòng ban giám đốc @endswitch" @if ($currUser->user_role != 2) readonly @endif>
                </div>

                <div class="form-group">
                    <label for="user_name">Tên đăng nhập</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{ $currUser->user_name }}">
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Xác nhận mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal thêm project -->
    <div class="modal fade" id="modal-add-project" tabindex="-1" role="dialog" aria-labelledby="Thêm Project" aria-hidden="true">
        <!-- Nội dung modal thêm project -->
    </div>
</div>
@endsection

@section('private-js')
<script>
    // Script JavaScript nếu cần
</script>
@endsection
