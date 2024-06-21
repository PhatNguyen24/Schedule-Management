@extends('master')

@section('ContentArea')
    <div id="page-content-area" class="h-100 container">
        <div class="bg-white border mt-2 shadow-sm">
            <div class="p-3">
                <h4>Thông tin người dùng</h4>
                <p><strong>Tên đăng nhập:</strong> {{ $currUser->user_name }}</p>
                <p><strong>Họ và tên:</strong> {{ $currUser->user_fullname }}</p>
                <p><strong>Email:</strong> {{ $currUser->user_email }}</p>
                <p><strong>Ngày sinh:</strong> {{ $currUser->user_birth }}</p>
                <p><strong>Giới tính:</strong> {{ $currUser->user_gender == 0 ? 'Nam' : 'Nữ' }}</p>
                <p><strong>Ảnh đại diện:</strong> {{ $currUser->user_img ? $currUser->user_img : 'Chưa có ảnh đại diện' }}</p>
                <p><strong>Văn phòng:</strong>
                    @switch($currUser->user_office)
                        @case(1)
                            Phòng Nhân sự (HR - Human Resources)
                            @break
                        @case(2)
                            Phòng Tài chính - Kế toán (Finance - Accounting)
                            @break
                        @case(3)
                            Phòng Kinh doanh (Sales)
                            @break
                        @case(4)
                            Phòng Marketing
                            @break
                        @case(5)
                            Phòng Sản xuất (Production)
                            @break
                        @case(6)
                            Phòng IT (Information Technology)
                            @break
                        @case(7)
                            Phòng Nghiên cứu và Phát triển (R&D - Research and Development)
                            @break
                        @case(8)
                            Phòng Hành chính (Administration)
                            @break
                        @case(9)
                            Phòng Pháp lý (Legal)
                            @break
                        @case(10)
                            Phòng Chăm sóc Khách hàng (Customer Service)
                            @break
                        @default
                            Không xác định
                    @endswitch
                </p>
                <p><strong>Vai trò:</strong>
                    @switch($currUser->user_role)
                        @case(1)
                            Manager
                            @break
                        @case(2)
                            Admin
                            @break
                        @default
                            User
                    @endswitch
                </p>
            </div>
        </div>

        <!-- Modal Thêm Dự Án -->
        <div class="modal fade" id="modal-add-project" tabindex="-1" role="dialog" aria-labelledby="Thêm Project" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title"><b>Tạo Dự Án Mới</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('project.store') }}" method="POST" id="fm-add-project">
                            @csrf
                            <div class="form-group">
                                <label for="inp-project-title">Tên Dự Án</label>
                                <input type="text" name="inp-project-title" id="inp-project-title" class="form-control" placeholder="" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group">
                                <label for="inp-project-desc">Mô tả</label>
                                <textarea class="form-control" name="inp-project-desc" id="inp-project-desc" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inp-project-detail-start">Ngày Bắt Đầu</label>
                                        <input type="date" class="form-control" readonly name="inp-project-start" id="inp-project-start" aria-describedby="helpId" placeholder="" required>
                                        <small id="helpId" class="form-text text-muted">Mặc định là ngày khởi tạo dự án</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inp-project-detail-end">Hạn Hoàn Thành</label>
                                        <input type="date" class="form-control" name="inp-project-end" id="inp-project-end" aria-describedby="helpId" placeholder="" required>
                                        <small id="helpId" class="form-text text-muted">Vui lòng chọn thời hạn cho dự án</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-none">
                                <label for="inp-project-detail-end">Ngân sách</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">VNĐ</span>
                                    </div>
                                    <input type="number" step="1000" spellcheck="true" class="form-control" id="inp-project-budget" name="inp-project-budget" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <input id="btn-add-project-submit" class="btn btn-success" type="submit" value="Tạo">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- Edit Modal -->
    </div>
@endsection

@section('private-js')
    <script>
        // Your custom JavaScript code here
    </script>
@endsection
